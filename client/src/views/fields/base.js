/************************************************************************
 * This file is part of FinnovaCRM.
 *
 * FinnovaCRM - Open Source CRM application.
 * Copyright (C) 2014-2019 Yuri Kuznetsov, Taras Machyshyn, Oleksiy Avramenko
 * Website: https://www.fincrm.net
 *
 * FinnovaCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * FinnovaCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with FinnovaCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "FinnovaCRM" word.
 ************************************************************************/

Finnova.define('views/fields/base', 'view', function (Dep) {

    return Dep.extend({

        type: 'base',

        listTemplate: 'fields/base/list',

        listLinkTemplate: 'fields/base/list-link',

        detailTemplate: 'fields/base/detail',

        editTemplate: 'fields/base/edit',

        searchTemplate: 'fields/base/search',

        validations: ['required'],

        name: null,

        defs: null,

        params: null,

        mode: null,

        searchParams: null,

        _timeout: null,

        inlineEditDisabled: false,

        disabled: false,

        readOnly: false,

        attributeList: null,

        initialAttributes: null,

        VALIDATION_POPOVER_TIMEOUT: 3000,

        isRequired: function () {
            return this.params.required;
        },

        /**
         * Get cell element. Works only after rendered.
         * {jQuery}
         */
        getCellElement: function () {
            return this.$el.parent();
        },

        isInlineEditMode: function () {
            return !!this._isInlineEditMode;
        },

        setDisabled: function (locked) {
            this.disabled = true;
            if (locked) {
                this.disabledLocked = true;
            }
        },

        setNotDisabled: function () {
            if (this.disabledLocked) return;
            this.disabled = false;
        },

        setRequired: function () {
            this.params.required = true;

            if (this.mode === 'edit') {
                if (this.isRendered()) {
                    this.showRequiredSign();
                } else {
                    this.once('after:render', function () {
                        this.showRequiredSign();
                    }, this);
                }
            }
        },

        setNotRequired: function () {
            this.params.required = false;
            this.getCellElement().removeClass('has-error');

            if (this.mode === 'edit') {
                if (this.isRendered()) {
                    this.hideRequiredSign();
                } else {
                    this.once('after:render', function () {
                        this.hideRequiredSign();
                    }, this);
                }
            }
        },

        setReadOnly: function (locked) {
            if (this.readOnlyLocked) return;
            this.readOnly = true;
            if (locked) {
                this.readOnlyLocked = true;
            }
            if (this.mode == 'edit') {
                if (this.isInlineEditMode()) {
                    this.inlineEditClose();
                    return;
                }
                this.setMode('detail');
                if (this.isRendered()) {
                    this.reRender();
                }
            }
        },

        setNotReadOnly: function () {
            if (this.readOnlyLocked) return;
            this.readOnly = false;
        },

        /**
         * Get label element. Works only after rendered.
         * {jQuery}
         */
        getLabelElement: function () {
            if (!this.$label || !this.$label.length) {
                this.$label = this.$el.parent().children('label');
            }
            return this.$label;
        },

        /**
         * Hide field and label. Works only after rendered.
         */
        hide: function () {
            this.$el.addClass('hidden');
            var $cell = this.getCellElement();
            $cell.children('label').addClass('hidden');
            $cell.addClass('hidden-cell');
        },

        /**
         * Show field and label. Works only after rendered.
         */
        show: function () {
            this.$el.removeClass('hidden');
            var $cell = this.getCellElement();
            $cell.children('label').removeClass('hidden');
            $cell.removeClass('hidden-cell');
        },

        data: function () {
            var data = {
                scope: this.model.name,
                name: this.name,
                defs: this.defs,
                params: this.params,
                value: this.getValueForDisplay()
            };
            if (this.mode === 'search') {
                data.searchParams = this.searchParams;
                data.searchData = this.searchData;
                data.searchValues = this.getSearchValues();
                data.searchType = this.getSearchType();
                data.searchTypeList = this.getSearchTypeList();
            }

            return data;
        },

        getValueForDisplay: function () {
            return this.model.get(this.name);
        },

        isReadMode: function () {
            return this.mode === 'list' || this.mode === 'detail' || this.mode === 'listLink';
        },

        isListMode: function () {
            return this.mode === 'list' || this.mode === 'listLink';
        },

        isDetailMode: function () {
            return this.mode === 'detail';
        },

        isEditMode: function () {
            return this.mode === 'edit';
        },

        isSearchMode: function () {
            return this.mode === 'search';
        },


        setMode: function (mode) {
            this.mode = mode;
            var property = mode + 'Template';
            if (!(property in this)) {
                this[property] = 'fields/' + Finnova.Utils.camelCaseToHyphen(this.type) + '/' + this.mode;
            }
            this.template = this[property];

            var contentProperty = mode + 'TemplateContent';

            if (!this._template) {
                this._templateCompiled = null;
                if (contentProperty in this) {
                    this.compiledTemplatesCache = this.compiledTemplatesCache || {};
                    this._templateCompiled =
                    this.compiledTemplatesCache[contentProperty] =
                        this.compiledTemplatesCache[contentProperty] || this._templator.compileTemplate(this[contentProperty]);
                }
            }
        },

        init: function () {
            if (this.events) {
                this.events = _.clone(this.events);
            } else {
                this.events = {};
            }

            this.defs = this.options.defs || {};
            this.name = this.options.name || this.defs.name;
            this.params = this.options.params || this.defs.params || {};

            this.fieldType = this.model.getFieldParam(this.name, 'type') || this.type;

            this.getFieldManager().getParamList(this.type).forEach(function (d) {
                var name = d.name;
                if (!(name in this.params)) {
                    this.params[name] = this.model.getFieldParam(this.name, name);
                    if (typeof this.params[name] === 'undefined') {
                        this.params[name] = null;
                    }
                }
            }, this);

            var additionaParamList = ['inlineEditDisabled'];

            additionaParamList.forEach(function (item) {
                this.params[item] = this.model.getFieldParam(this.name, item) || null;
            }, this);

            this.mode = this.options.mode || this.mode;

            this.readOnly = this.readOnly || this.params.readOnly || this.model.getFieldParam(this.name, 'readOnly') || this.model.getFieldParam(this.name, 'clientReadOnly');
            this.readOnlyLocked = this.options.readOnlyLocked || this.readOnly;
            this.inlineEditDisabled = this.options.inlineEditDisabled || this.params.inlineEditDisabled || this.inlineEditDisabled;
            this.readOnly = this.readOnlyLocked || this.options.readOnly || false;

            this.tooltip = this.options.tooltip || this.params.tooltip || this.model.getFieldParam(this.name, 'tooltip') || this.tooltip;

            if (this.options.readOnlyDisabled) {
                this.readOnly = false;
            }

            this.disabledLocked = this.options.disabledLocked || false;
            this.disabled = this.disabledLocked || this.options.disabled || this.disabled;

            if (this.mode == 'edit' && this.readOnly) {
                this.mode = 'detail';
            }

            this.setMode(this.mode || 'detail');

            if (this.mode == 'search') {
                this.searchParams = _.clone(this.options.searchParams || {});
                this.searchData = {};
                this.setupSearch();
            }

            this.on('invalid', function () {
                var $cell = this.getCellElement();
                $cell.addClass('has-error');
                this.$el.one('click', function () {
                    $cell.removeClass('has-error');
                });
                this.once('render', function () {
                    $cell.removeClass('has-error');
                });
            }, this);

            this.on('after:render', function () {
                if (this.mode === 'edit') {
                    if (this.hasRequiredMarker()) {
                        this.showRequiredSign();
                    } else {
                        this.hideRequiredSign();
                    }
                } else {
                    if (this.hasRequiredMarker()) {
                        this.hideRequiredSign();
                    }
                }

            }, this);

            if ((this.isDetailMode() || this.isEditMode()) && this.tooltip) {
                this.initTooltip();
            }

            if (this.mode == 'detail') {
                if (!this.inlineEditDisabled) {
                    this.listenToOnce(this, 'after:render', this.initInlineEdit, this);
                }
            }

            if (this.mode != 'search') {
                this.attributeList = this.getAttributeList();

                this.listenTo(this.model, 'change', function (model, options) {
                    if (this.isRendered() || this.isBeingRendered()) {
                        if (options.ui) {
                            return;
                        }

                        var changed = false;
                        this.attributeList.forEach(function (attribute) {
                            if (model.hasChanged(attribute)) {
                                changed = true;
                            }
                        });

                        if (changed && !options.skipReRender) {
                            this.reRender();
                        }
                    }
                }.bind(this));

                this.listenTo(this, 'change', function () {
                    var attributes = this.fetch();
                    this.model.set(attributes, {ui: true});
                });
            }
        },

        initTooltip: function () {
            var $a;
            this.once('after:render', function () {
                $a = $('<a href="javascript:" class="text-muted field-info"><span class="fas fa-info-circle"></span></a>');
                var $label = this.getLabelElement();
                $label.append(' ');
                this.getLabelElement().append($a);

                var tooltipText = this.options.tooltipText || this.tooltipText;

                if (!tooltipText && typeof this.tooltip === 'string') {
                    tooltipText = this.translate(this.tooltip, 'tooltips', this.model.name);
                }

                tooltipText = tooltipText || this.translate(this.name, 'tooltips', this.model.name) || '';
                tooltipText = this.getHelper().transfromMarkdownText(tooltipText).toString();

                $a.popover({
                    placement: 'bottom',
                    container: 'body',
                    html: true,
                    content: tooltipText,
                }).on('shown.bs.popover', function () {
                    $('body').off('click.popover-' + this.id);
                    $('body').on('click.popover-' + this.id , function (e) {
                        if ($(e.target).closest('.popover-content').get(0)) return;
                        if ($.contains($a.get(0), e.target)) return;
                        $('body').off('click.popover-' + this.id);
                        $a.popover('hide');
                    }.bind(this));
                }.bind(this));

                $a.on('click', function () {
                    $(this).popover('toggle');
                });
            }, this);

            this.on('remove', function () {
                if ($a) {
                    $a.popover('destroy')
                }
                $('body').off('click.popover-' + this.id);
            }, this);
        },

        showRequiredSign: function () {
            var $label = this.getLabelElement();
            var $sign = $label.find('span.required-sign');

            if ($label.length && !$sign.length) {
                $text = $label.find('span.label-text');
                $('<span class="required-sign"> *</span>').insertAfter($text);
                $sign = $label.find('span.required-sign');
            }
            $sign.show();
        },

        hideRequiredSign: function () {
            var $label = this.getLabelElement();
            var $sign = $label.find('span.required-sign');
            $sign.hide();
        },

        getSearchParamsData: function () {
            return this.searchParams.data || {};
        },

        getSearchValues: function () {
            return this.getSearchParamsData().values || {};
        },

        getSearchType: function () {
            return this.getSearchParamsData().type || this.searchParams.type;
        },

        getSearchTypeList: function () {
            return this.searchTypeList;
        },

        initInlineEdit: function () {
            var $cell = this.getCellElement();
            var $editLink = $('<a href="javascript:" class="pull-right inline-edit-link hidden"><span class="fas fa-pencil-alt fa-sm"></span></a>');

            if ($cell.length == 0) {
                this.listenToOnce(this, 'after:render', this.initInlineEdit, this);
                return;
            }

            $cell.prepend($editLink);

            $editLink.on('click', function () {
                var afterhash=window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];

                var hash=window.location.hash;
                hash.indexOf(0);
                hash.toLowerCase();
                hash = hash.split("/")[2];

                if(hash && afterhash=='#Account')
                {
                    if($("div[data-name='doyouhavegstnum'] .field").find('span').text() == 'Yes' && $("#totalGSTCnt").val() == 'None')
                    {
                        $("select[data-name='howmanygstdetails'] option").removeAttr('selected'); 
                        $("select[data-name='howmanygstdetails'] option[value='1']").attr("selected", "selected");
                        $("select[data-name='howmanygstdetails']").val(1);
                        //$("div[data-name='howmanygstdetails']").show();
                        $("#last_child_panel_edit").show();
                    }
                    else
                    {   
                        /*if($("#totalGSTCnt").val() == '0' && !$("#totalRec").val())
                        {   
                            $("div[data-name='howmanygstdetails']").hide();
                            $("#last_child_panel_edit").hide();
                            $("#totalGSTCntChanged").val(0);
                        }*/
                        if($("#totalRec").val() && $("#totalRec").val() > $("input[name='gstno_edit[]']").length)
                        {   
                            var tot_fld_len = $("#totalGSTCntChanged").val();
                            
                            $("select[data-name='howmanygstdetails'] option").prop('selected', false); 
                            $("select[data-name='howmanygstdetails'] option").prop('disabled', false); 
                            $("select[data-name='howmanygstdetails'] option[value='"+tot_fld_len+"']").prop("selected", true);
                            
                            $("select[data-name='howmanygstdetails'] option").filter(function() {
                                return parseInt($(this).val()) <= parseInt($("#totalGSTCntChanged").val());
                            }).prop('disabled', true);

                            $("select[data-name='howmanygstdetails']").val(tot_fld_len);
                        }
                        else if($("#yeshasrec").val() && $("div[data-name='doyouhavegstnum']").find('a.inline-cancel-link').length != 0)
                        {   
                            $("select[data-name='doyouhavegstnum'] option").prop('selected', false); 
                            $("select[data-name='doyouhavegstnum'] option[value='No']").prop("selected", true);
                            
                            $("select[data-name='doyouhavegstnum']").find('span').text('No');
                        }
                    }
                }
                this.inlineEdit();
            }.bind(this));

            $cell.on('mouseenter', function (e) {
                e.stopPropagation();
                if (this.disabled || this.readOnly) {
                    return;
                }
                if (this.mode == 'detail') {
                    $editLink.removeClass('hidden');
                }
            }.bind(this)).on('mouseleave', function (e) {
                e.stopPropagation();
                if (this.mode == 'detail') {
                    $editLink.addClass('hidden');
                }
            }.bind(this));
        },

        initElement: function () {
            this.$element = this.$el.find('[data-name="' + this.name + '"]');
            if (!this.$element.length) {
                this.$element = this.$el.find('[name="' + this.name + '"]');
            }
            if (!this.$element.length) {
                this.$element = this.$el.find('.main-element');
            }
            if (this.mode == 'edit') {
                this.$element.on('change', function () {
                    this.trigger('change');
                }.bind(this));
            }
        },

        afterRender: function () {
            if (this.mode == 'edit' || this.mode == 'search') {
                this.initElement();
            }
        },

        setup: function () {},

        setupSearch: function () {},

        getAttributeList: function () {
            return this.getFieldManager().getAttributes(this.fieldType, this.name);
        },

        inlineEditSave: function () {
            var data = this.fetch();

            var self = this;
            var model = this.model;
            var prev = this.initialAttributes;

            model.set(data, {silent: true});
            data = model.attributes;

            var attrs = false;
            for (var attr in data) {
                if (_.isEqual(prev[attr], data[attr])) {
                    continue;
                }
                (attrs || (attrs = {}))[attr] =    data[attr];
            }

            // Script starts to update GST details information
            var afterhash=window.location.hash;
            afterhash.indexOf(0);
            afterhash.toLowerCase();
            afterhash = afterhash.split("/")[0];
            if(afterhash == '#Account')
            {
                // console.log(attrs);return false;
                if(attrs['doyouhavegstnum'] === 'No')
                {   
                    var hash=window.location.hash;
                    hash.indexOf(0);
                    hash.toLowerCase();
                    hash = hash.split("/")[2];

                    $.ajax({
                        type    : "POST",
                        url     : "../../client/res/templates/financial_changes/account_details_inlineupdate.php?account_id="+hash,
                        dataType  : "json",
                        processData : false,
                        contentType : false,
                        async: false,
                        data:{'havegstnum': '1'},
                        success: function(data){

                        }
                    });
                }

                var totalgst_edit = '';
                if(parseInt($("#totalGSTCnt").val()) == parseInt($("#totalGSTCntChanged").val()))
                {
                    totalgst_edit = $("#totalGSTCnt").val();
                }
                else {
                    totalgst_edit = $("#totalGSTCntChanged").val(); 
                }

                $("#account_gst_num_edit").val(totalgst_edit);

                var updateBtn = 0;
                var tot_len = $("input[name='gstno_edit[]']").length;
                var hidfld_val = $("#totalGSTCnt").val();
                var no_of_gst_clicked = $("#no_of_gst_clicked").val();
                
                if(no_of_gst_clicked==1 && (tot_len >= hidfld_val || hidfld_val == 'None'))
                {
                    updateBtn = 1;
                }
                // alert("updateBtn : "+updateBtn+" === tot_len : "+tot_len+" === hidfld_val: "+hidfld_val+" === no_of_gst_clicked : "+no_of_gst_clicked);return false;
                // return false;
                var flag_edit = true;
                if(updateBtn===1)
                {
                    if($("input[data-name='name']").val() == "")
                    {   
                        $("input[data-name='name']").css('border-color', '#ad4846');

                        $("input[data-name='name']").focus();
                        $("input[data-name='name']").attr('data-toggle', 'popover-name');
                        $('[data-toggle="popover-name"]').popover({
                            delay: {
                                "show": 500,
                                "hide": 100
                            },
                            content: 'Name required',
                            placement: 'bottom'
                        }).popover('show').on('shown.bs.popover', function () {
                            setTimeout(function (a) {
                                a.popover('hide');
                            }, 3000, $(this));
                        });

                        flag = false;
                    }
                    else
                    {  
                        var len_edit = $("input[name='gstno_edit[]']").length;
                        
                        for(var i=0;i<len_edit;i++)
                        {
                            var zipRegex = /^\d{6}$/;
                            
                            if($("#gstnoedit"+i).val() == "")
                            { 
                                $("#gstnoedit"+i).css('border-color', '#ad4846');
                                $("#gstnoedit"+i).focus();

                                $("#gstnoedit"+i).attr('data-toggle', 'popover-gstnoedit'+i);
                                $('[data-toggle="popover-gstnoedit'+i+'"]').popover({
                                    delay: {
                                        "show": 500,
                                        "hide": 100
                                    },
                                    content: 'Please enter GST number.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                        a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag_edit = false;
                            }
                            else if($("#acc_gstAddressStreetEdit"+i).val() == ""){
                                $("#acc_gstAddressStreetEdit"+i).css('border-color', '#ad4846');
                                $("#acc_gstAddressStreetEdit"+i).focus();

                                $("#acc_gstAddressStreetEdit"+i).attr('data-toggle', 'popover-acc_gstAddressStreetEdit'+i);
                                $('[data-toggle="popover-acc_gstAddressStreetEdit'+i+'"]').popover({
                                    delay: {
                                      "show": 500,
                                      "hide": 100
                                    },
                                    content: 'Please enter street.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                      a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag_edit = false;
                            }
                            else if($("#acc_gstcityedit"+i).val() == ""){
                                $("#acc_gstcityedit"+i).css('border-color', '#ad4846');
                                $("#acc_gstcityedit"+i).focus();

                                $("#acc_gstcityedit"+i).attr('data-toggle', 'popover-acc_gstcityedit'+i);
                                $('[data-toggle="popover-acc_gstcityedit'+i+'"]').popover({
                                    delay: {
                                      "show": 500,
                                      "hide": 100
                                    },
                                    content: 'Please enter city.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                      a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag_edit = false;
                            }
                            else if($("#acc_gststateedit"+i).val() == ""){
                                $("#acc_gststateedit"+i).css('border-color', '#ad4846');
                                $("#acc_gststateedit"+i).focus();

                                $("#acc_gststateedit"+i).attr('data-toggle', 'popover-acc_gststateedit'+i);
                                $('[data-toggle="popover-acc_gststateedit'+i+'"]').popover({
                                    delay: {
                                      "show": 500,
                                      "hide": 100
                                    },
                                    content: 'Please enter state.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                      a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag_edit = false;
                            }
                            else if($("#acc_gstpostalcodeedit"+i).val() == ""){
                                $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                                $("#acc_gstpostalcodeedit"+i).focus();

                                $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                                $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                                    delay: {
                                      "show": 500,
                                      "hide": 100
                                    },
                                    content: 'Please enter postal code.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                      a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag_edit = false;
                            }
                            else if($("#acc_gstpostalcodeedit"+i).val().length < 6) {
                                $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                                $("#acc_gstpostalcodeedit"+i).focus();

                                $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                                $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                                    delay: {
                                      "show": 500,
                                      "hide": 100
                                    },
                                    content: 'Please enter valid postal code.',
                                    placement: 'bottom'
                                }).popover('show').on('shown.bs.popover', function () {
                                    setTimeout(function (a) {
                                      a.popover('hide');
                                    }, 3000, $(this));
                                });

                                flag_edit = false;
                            }


                            $("input[data-name='name']").keyup(function(){
                                if($(this).length == 0){
                                    $("#name").val('');
                                }
                                $(this).removeAttr('style');
                            });

                            $("#gstnoedit"+i).keyup(function(){
                                $(this).removeAttr('style');
                            });

                            $("#acc_gstAddressStreetEdit"+i).keyup(function(){
                                $(this).removeAttr('style');
                            });

                            $("#acc_gstcityedit"+i).keyup(function(){
                                $(this).removeAttr('style');
                            });

                            $("#acc_gststateedit"+i).keyup(function(){
                                if($(this).val() == ""){
                                    $(this).css('border-color', '#ad4846');
                                    flag_edit = false;
                                }
                                else {
                                    $(this).removeAttr('style');
                                }
                            });

                            $("#acc_gstpostalcodeedit"+i).keyup(function(){
                                $(this).removeAttr('style');
                            });
                        }
                    }
                }
                
                if(flag_edit == false)
                {
                    return false;
                }
                else
                {   
                    // if(updateBtn===1)
                    // {      
                        $("#account_gst_num_edit").prop("disabled", false);
                        $("#account_gst_num_edit").val(totalgst_edit);
                        $("#account_gst_num_edit").prop("disabled", false);

                        var formdata = $('form');
                        form = new FormData(formdata[0]);

                        /*if(parseInt(attrs['howmanygstdetails'])){
                            form.append('number_of_gst', parseInt(attrs['howmanygstdetails'])); 
                        }*/
                        // alert("totalGSTCnt: "+$("#totalGSTCnt").val()+" === totalGSTCntChanged: "+$("#totalGSTCntChanged").val()+" === howmanygstdetails: "+attrs['howmanygstdetails']);

                        if(parseInt($("#totalGSTCnt").val()) === parseInt($("#totalGSTCntChanged").val())){
                            // alert("If case of base.js");
                            if(parseInt(attrs['howmanygstdetails'])){
                                form.append('number_of_gst', parseInt(attrs['howmanygstdetails'])); 
                            }
                            else{
                                form.append('number_of_gst', 1);
                            }
                        }
                        else {
                            var howMany_gst = parseInt($("select[data-name='howmanygstdetails']").val());
                            // alert("Else case of base.js");
                            // var howMany_gst = parseInt($("#gethowmanygstfld").val());
                            form.append('number_of_gst', howMany_gst); 
                        }

                        if(attrs['howmanygstdetails'] == 'undefined'){
                            form.append('number_of_gst', 1);
                        }
                        // alert("If case of base.js "+attrs['howmanygstdetails']);
                        // return false;

                        if($("div[data-name='doyouhavegstnum'] .field").find('span').text()=='Yes')
                        {
                            form.append('have_gst', $("div[data-name='doyouhavegstnum'] .field").find('span').text());
                        }

                        if($("select[data-name='doyouhavegstnum']").val() === 'Yes')
                        {
                            form.append('have_gst', $("select[data-name='doyouhavegstnum']").val());
                        }

                        $("input[name='gstno_edit_id[]']").each(function() {
                          form.append('gstno_edit_id[]', $(this).val()); 
                        });
                        $("input[name='gstno_edit[]']").each(function() {
                          form.append('gstno_edit[]', $(this).val()); 
                        });
                        $("textarea[name='acc_gstAddressStreet_edit[]']").each(function() {
                          form.append('acc_gstAddressStreet_edit[]', $(this).val()); 
                        });
                        $("input[name='acc_gstAddressCity_edit[]']").each(function() {
                          form.append('acc_gstAddressCity_edit[]', $(this).val()); 
                        });
                        $("input[name='acc_gstAddressState_edit[]']").each(function() {
                          form.append('acc_gstAddressState_edit[]', $(this).val()); 
                        });
                        $("input[name='acc_gstAddressPostalCode_edit[]']").each(function() {
                          form.append('acc_gstAddressPostalCode_edit[]', $(this).val()); 
                        });

                        /*for (var value of form.values()) {
                            console.log(value); 
                        }
                        return false;*/

                        $.ajax({
                            type    : "POST",
                            url     : "../../client/res/templates/financial_changes/account_gst_fields.php",
                            dataType  : "json",
                            processData : false,
                            contentType : false,
                            async: false,
                            data:form,
                            success: function(data){
                                if(data)
                                {
                                    for(var i=0; i < data.length; i++){
                                        if(data[i]['acc_gst_no'] != $("#gstnoedit"+i).val()){
                                            set_flag = 'false';
                                        }
                                        if(data[i]['acc_gst_street'] != $("#acc_gstAddressStreetEdit"+i).val()){
                                            set_flag = 'false';
                                        }
                                        if(data[i]['acc_gst_city'] != $("#acc_gstcityedit"+i).val()){
                                            set_flag = 'false';
                                        }
                                        if(data[i]['acc_gst_state'] != $("#acc_gststateedit"+i).val()){
                                            set_flag = 'false';
                                        }
                                        if(data[i]['acc_gst_postalcode'] != $("#acc_gstpostalcodeedit"+i).val()){
                                            set_flag = 'false';
                                        }
                                    }
                                }
                                else
                                {
                                    data = [];
                                    var len = $("input[name='gstno_edit[]']").length;
                                    for(var m=0;m<len;m++)
                                    {
                                        data.push({
                                            'acc_gst_no' : $("#gstnoedit"+m).val(),
                                            'acc_gst_street' : $("#acc_gstAddressStreetEdit"+m).val(),
                                            'acc_gst_city' : $("#acc_gstcityedit"+m).val(),
                                            'acc_gst_state' : $("#acc_gststateedit"+m).val(),
                                            'acc_gst_postalcode' : $("#acc_gstpostalcodeedit"+m).val()
                                        });
                                    }
                                    
                                    for(var s=0;s<data.length;s++)
                                    {
                                        if(data[s]['acc_gst_no'] != ""){
                                            set_flag = 'false';
                                        }
                                        if(data[s]['acc_gst_street'] != ""){
                                            set_flag = 'false';
                                        }
                                        if(data[s]['acc_gst_city'] != ""){
                                            set_flag = 'false';
                                        }
                                        if(data[s]['acc_gst_state'] != ""){
                                            set_flag = 'false';
                                        }
                                        if(data[s]['acc_gst_postalcode'] != ""){
                                            set_flag = 'false';
                                        }
                                    }
                                }
                                
                                for(var attr in data)
                                {
                                    if (_.isEqual(prev[attr], data[attr])) {
                                        continue;
                                    }
                                    (attrs || (attrs = {}))[attr] =  data[attr];
                                }

                            }
                        });
                    // }
                }
            }
            
            // Script ends to update GST details information
            if (!attrs) {
                this.inlineEditClose();
                return;
            }

            if (this.validate()) {
                this.notify('Not valid', 'error');
                model.set(prev, {silent: true});
                return;
            }
            
            this.notify('Saving...');
            model.save(attrs, {
                success: function () {
                    self.trigger('after:save');
                    model.trigger('after:save');
                    self.notify('Saved', 'success');
                    
                    if(afterhash == '#Account')
                    {   
                        var hash=window.location.hash;
                        hash.indexOf(0);
                        hash.toLowerCase();
                        hash = hash.split("/")[2];
                        
                        // Script to get the number of records from database starts here
                        var total_gst_in_db = 0;
                        $.ajax({
                            url: "../../client/res/templates/financial_changes/account_gst_fields_get.php?account_id="+hash,
                            type: "POST",
                            processData : false,
                            contentType : false, 
                            dataType: 'json',
                            async: false,
                            success: function(result)
                            {
                                if(result)
                                {   
                                    total_gst_in_db = result.length;
                                }
                            }
                        });

                        // console.log(attrs);
                        // alert("total_gst_in_db: "+total_gst_in_db+" == send_gst_number: "+attrs['howmanygstdetails']);
                        // return false;
                        // Script to get the number of records from database ends here

                        if(attrs['doyouhavegstnum'] === 'Yes')
                        {
                            $("div[data-name='howmanygstdetails']").show();
                            $("#last_child_panel_edit").show();
                            $("#gethowmanygstfld").val(attrs['howmanygst']);
                            $("#havegst_fld").val(attrs['doyouhavegstnum']);
                            // $("#totalGSTCnt").val(attrs['howmanygst']);
                            how_many_gst(2);
                        }
                        else if(attrs['doyouhavegstnum'] == 'No')
                        {
                            $("div[data-name='howmanygstdetails']").hide();
                            $("#last_child_panel_edit").hide();
                            $("#gethowmanygstfld").val(1);
                            $("#havegst_fld").val('No');
                            // $("#totalGSTCnt").val(0);
                            $("#last_child_panel_edit").remove();
                            $("#numofgst_edit .gst").remove();
                        }

                        if(attrs['howmanygstdetails'])
                        {   
                            $("div[data-name='howmanygstdetails'] .field").find('span').text(attrs['howmanygstdetails']);
                            $("#gethowmanygstfld").val(attrs['howmanygstdetails']);

                            if(attrs['howmanygstdetails'] > total_gst_in_db){
                                if(total_gst_in_db){
                                    var newNum = parseInt(attrs['howmanygstdetails']) - parseInt(total_gst_in_db);
                                }
                                else {
                                    var newNum = parseInt(attrs['howmanygstdetails']) - 1;
                                }
                                
                                if(total_gst_in_db)
                                {
                                    $("#totalGSTCnt").val(total_gst_in_db);
                                }
                                else {
                                    var total_num_in_db = 0;
                                    $.ajax({
                                        url: "../../client/res/templates/financial_changes/account_details_get.php?account_id="+hash,
                                        type: "POST",
                                        processData : false,
                                        contentType : false, 
                                        dataType: 'json',
                                        async: false,
                                        success: function(result)
                                        {
                                            if(result)
                                            {   
                                                total_num_in_db = result.no_of_gst;
                                            }
                                        }
                                    });
                                    $("#totalGSTCnt").val(total_num_in_db);

                                    // $("#totalGSTCntChanged").val(attrs['howmanygstdetails']);
                                }
                                how_many_gst(attrs['howmanygstdetails']);
                                // account_onload_function();
                            }
                        }

                        /*var hash=window.location.hash;
                        hash.indexOf(2);
                        hash.toLowerCase();
                        hash = hash.split("/")[2];

                        if(hash)
                        {
                            if($("div[data-name='doyouhavegstnum'] .field").find('span').text() == 'Yes')
                            {
                               $("div[data-name='howmanygstdetails'] .field").find('span').text($("#totalRec").val()); 
                            }
                        }*/
                        //var total_url = window.location.hash;
                        //$("#last_child_panel_edit").load(total_url + ' #numofgst_edit');
                    }
                    // window.location.href = "http://fincrm.crm.com/#Account/view/5f9fe03f8b1489217";
                },
                error: function () {
                    self.notify('Error occured', 'error');
                    model.set(prev, {silent: true});
                    self.render()
                },
                patch: true
            });
            this.inlineEditClose(true);
        },

        removeInlineEditLinks: function () {
            var $cell = this.getCellElement();
            $cell.find('.inline-save-link').remove();
            $cell.find('.inline-cancel-link').remove();
            $cell.find('.inline-edit-link').addClass('hidden');
        },

        addInlineEditLinks: function () {
            var $cell = this.getCellElement();
            var $saveLink = $('<a href="javascript:" class="pull-right inline-save-link">' + this.translate('Update') + '</a>');
            var $cancelLink = $('<a href="javascript:" class="pull-right inline-cancel-link">' + this.translate('Cancel') + '</a>');
            $cell.prepend($saveLink);
            $cell.prepend($cancelLink);

            // Script starts for account edit page with GST fields
            var afterhash=window.location.hash;
            afterhash.indexOf(0);
            afterhash.toLowerCase();
            afterhash = afterhash.split("/")[0];
            if(afterhash == '#Account')
            {  
                if($("div[data-name='doyouhavegstnum']:first a.inline-cancel-link").text()=='Cancel'){
                    $("div[data-name='doyouhavegstnum']:first a.inline-cancel-link").attr('onclick', 'cancelHaveGST()');
                    $("div[data-name='doyouhavegstnum']:first a.inline-cancel-link").attr('id', 'havegstcancel');
                }
                /*if($("div[data-name='doyouhavegstnum']").find("a:eq(1)").text()=='Update'){
                    $("div[data-name='doyouhavegstnum']").find("a:eq(1)").attr('onclick', 'checkGSTCount()');
                    //$("div[data-name='doyouhavegstnum']").find("a:eq(1)").attr('id', 'doyouhavegst');
                }*/

                if($("div[data-name='howmanygstdetails']:first a.inline-cancel-link").text()=='Cancel'){
                    $("div[data-name='howmanygstdetails']:first a.inline-cancel-link").attr('onclick', 'cancelEditAccount()');
                }
                /*if($("div[data-name='howmanygstdetails']").find("a:eq(1)").text()=='Update'){
                    //$("div[data-name='howmanygstdetails']").find("a:eq(1)").attr('onclick', 'acc_editvalidateGST(1)');
                    $("div[data-name='howmanygstdetails']").find("a:eq(1)").attr('id', 'numofgstcnt');
                    //$("div[data-name='howmanygstdetails']").find("a:eq(1)").attr('id', 'howmanygst');
                }*/
            }
            // Script ends for account edit page with GST fields

            $cell.find('.inline-edit-link').addClass('hidden');
            var updateBtn = 0;

            $saveLink.click(function () {

                /*if($("#doyouhavegst").data('clicked', true))
                {
                    alert("doyouhavegst is clicked");return false;
                }
                if($("#howmanygst").data('clicked', true))
                {
                    alert("howmanygst is clicked");return false;
                }*/

                this.inlineEditSave();

                /*if(afterhash == '#Account')
                {
                    var tot_len = $("input[name='gstno_edit[]']").length;
                    var hidfld_val = $("#totalGSTCnt").val();
                    var no_of_gst_clicked = $("#no_of_gst_clicked").val();
                    //alert(no_of_gst_clicked);return false;
                    
                    if(no_of_gst_clicked==1 && (tot_len > hidfld_val || hidfld_val == 'None'))
                    {
                        updateBtn = 1;
                    }
                    
                    var have_gst = $("select[data-name='doyouhavegstnum']").val();

                    var have_gst_span_text = $("div[data-name='doyouhavegstnum'] .field").find('span').text();

                    if((have_gst == 'Yes' || have_gst_span_text == 'Yes'))
                    {     
                        if($("div[data-name='howmanygstdetails'] .field").find('span').text() == 'None')
                        {   
                            $(".err").css('color', '#ad4846');
                            $("div[data-name='howmanygstdetails']").focus();
                            this.inlineEditSave();
                        }
                        else if($("div[data-name='howmanygstdetails'] .field").find('span').text() != 'None') 
                        {   
                            if(updateBtn===1)
                            {
                                var how_many_gst = $("select[data-name='howmanygstdetails']").val();
                                if(how_many_gst != 'None')
                                {   
                                    var len_edit = $("input[name='gstno_edit[]']").length;
                                    var zipRegex = /^\d{6}$/;
                                    var flag_edit = true;

                                    for(var i=0;i<len_edit;i++)
                                    {
                                        if($("#gstnoedit"+i).val() == "")
                                        {
                                            $("#gstnoedit"+i).css('border-color', '#ad4846');
                                            $("#gstnoedit"+i).focus();

                                            $("#gstnoedit"+i).attr('data-toggle', 'popover-gstnoedit'+i);
                                            $('[data-toggle="popover-gstnoedit'+i+'"]').popover({
                                                delay: {
                                                    "show": 500,
                                                    "hide": 100
                                                },
                                                content: 'GST number is required',
                                                placement: 'bottom'
                                            }).popover('show').on('shown.bs.popover', function () {
                                                setTimeout(function (a) {
                                                    a.popover('hide');
                                                }, 2000, $(this));
                                            });

                                            flag_edit = false;
                                        }
                                        else if($("#acc_gstAddressStreetEdit"+i).val() == ""){
                                            $("#acc_gstAddressStreetEdit"+i).css('border-color', '#ad4846');
                                            $("#acc_gstAddressStreetEdit"+i).focus();

                                            $("#acc_gstAddressStreetEdit"+i).attr('data-toggle', 'popover-acc_gstAddressStreetEdit'+i);
                                            $('[data-toggle="popover-acc_gstAddressStreetEdit'+i+'"]').popover({
                                              delay: {
                                                  "show": 500,
                                                  "hide": 100
                                              },
                                              content: 'Street is required',
                                              placement: 'bottom'
                                            }).popover('show').on('shown.bs.popover', function () {
                                              setTimeout(function (a) {
                                                  a.popover('hide');
                                              }, 2000, $(this));
                                            });

                                            flag_edit = false;
                                        }
                                        else if($("#acc_gstcityedit"+i).val() == ""){
                                            $("#acc_gstcityedit"+i).css('border-color', '#ad4846');
                                            $("#acc_gstcityedit"+i).focus();

                                            $("#acc_gstcityedit"+i).attr('data-toggle', 'popover-acc_gstcityedit'+i);
                                            $('[data-toggle="popover-acc_gstcityedit'+i+'"]').popover({
                                              delay: {
                                                  "show": 500,
                                                  "hide": 100
                                              },
                                              content: 'City is required',
                                              placement: 'bottom'
                                            }).popover('show').on('shown.bs.popover', function () {
                                              setTimeout(function (a) {
                                                  a.popover('hide');
                                              }, 2000, $(this));
                                            });

                                            flag_edit = false;
                                        }
                                        else if($("#acc_gststateedit"+i).val() == ""){
                                            $("#acc_gststateedit"+i).css('border-color', '#ad4846');
                                            $("#acc_gststateedit"+i).focus();

                                            $("#acc_gststateedit"+i).attr('data-toggle', 'popover-acc_gststateedit'+i);
                                            $('[data-toggle="popover-acc_gststateedit'+i+'"]').popover({
                                              delay: {
                                                  "show": 500,
                                                  "hide": 100
                                              },
                                              content: 'State is required',
                                              placement: 'bottom'
                                            }).popover('show').on('shown.bs.popover', function () {
                                              setTimeout(function (a) {
                                                  a.popover('hide');
                                              }, 2000, $(this));
                                            });

                                            flag_edit = false;
                                        }
                                        else if($("#acc_gstpostalcodeedit"+i).val() == ""){
                                            $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                                            $("#acc_gstpostalcodeedit"+i).focus();

                                            $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                                            $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                                              delay: {
                                                  "show": 500,
                                                  "hide": 100
                                              },
                                              content: 'Postal code is required',
                                              placement: 'bottom'
                                            }).popover('show').on('shown.bs.popover', function () {
                                              setTimeout(function (a) {
                                                  a.popover('hide');
                                              }, 2000, $(this));
                                            });

                                            flag_edit = false;
                                        }
                                        else if($("#acc_gstpostalcodeedit"+i).val().length < 6) {
                                            $("#acc_gstpostalcodeedit"+i).css('border-color', '#ad4846');
                                            $("#acc_gstpostalcodeedit"+i).focus();

                                            $("#acc_gstpostalcodeedit"+i).attr('data-toggle', 'popover-acc_gstpostalcodeedit'+i);
                                            $('[data-toggle="popover-acc_gstpostalcodeedit'+i+'"]').popover({
                                              delay: {
                                                  "show": 500,
                                                  "hide": 100
                                              },
                                              content: 'Valid postal code is required',
                                              placement: 'bottom'
                                            }).popover('show').on('shown.bs.popover', function () {
                                              setTimeout(function (a) {
                                                  a.popover('hide');
                                              }, 2000, $(this));
                                            });

                                            flag_edit = false;
                                        }


                                        $("#gstnoedit"+i).keyup(function(){
                                            $(this).removeAttr('style');
                                        });

                                        $("#acc_gstAddressStreetEdit"+i).keyup(function(){
                                            $(this).removeAttr('style');
                                        });

                                        $("#acc_gstcityedit"+i).keyup(function(){
                                            $(this).removeAttr('style');
                                        });

                                        $("#acc_gststateedit"+i).keyup(function(){
                                            if($(this).val() == ""){
                                                $(this).css('border-color', '#ad4846');
                                                flag_edit = false;
                                            }
                                            else {
                                                $(this).removeAttr('style');
                                            }
                                        });

                                        $("#acc_gstpostalcodeedit"+i).keyup(function(){
                                            $(this).removeAttr('style');
                                        });
                                    }

                                    if(flag_edit == false){
                                        return false;
                                    }
                                    else {
                                        this.inlineEditSave();
                                    }
                                }
                            }
                            else {
                                if(have_gst == 'Yes')
                                {   
                                    $("#no_of_gst_clicked").val(1);
                                    $("#changedHaveGST").val('Yes');
                                }
                                this.inlineEditSave();
                            }
                        }
                        else 
                        { 
                            this.inlineEditSave();
                        }
                    }
                    else {
                        $("#changedHaveGST").val('No');
                        this.inlineEditSave();
                    }
                }
                else
                { 
                    this.inlineEditSave();
                }*/

            }.bind(this));
            $cancelLink.click(function () {
                this.inlineEditClose();
            }.bind(this));
        },

        setIsInlineEditMode: function (value) {
            this._isInlineEditMode = value;
        },

        inlineEditClose: function (dontReset) {
            this.trigger('inline-edit-off');
            this._isInlineEditMode = false;

            if (this.mode != 'edit') {
                return;
            }

            this.setMode('detail');
            this.once('after:render', function () {

                var afterhash=window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];

                var hash=window.location.hash;
                hash.indexOf(0);
                hash.toLowerCase();
                hash = hash.split("/")[2];

                if(hash && afterhash=='#Account')
                {
                    if($("#havegstcancel").data('clicked', true))
                    {
                        if($("#totalRec_new").val() == 0 && $("#havegst_fld").val() == 'No')
                        {
                            $("select[data-name='doyouhavegstnum'] option").removeAttr('selected'); 
                            $("select[data-name='doyouhavegstnum'] option").removeAttr('disabled'); 
                            $("select[data-name='doyouhavegstnum'] option[value='No']").attr("selected", "selected");
                            $("div[data-name='doyouhavegstnum'] .field").find('span').text('No');
                            $("select[data-name='doyouhavegstnum']").val('No');
                        }
                    }
                }

                this.removeInlineEditLinks();
            }, this);

            if (!dontReset) {
                this.model.set(this.initialAttributes);
            }

            this.reRender(true);
        },

        inlineEdit: function () {
            var self = this;

            this.trigger('edit', this);
            this.setMode('edit');

            this.initialAttributes = this.model.getClonedAttributes();

            this.once('after:render', function () {

                var afterhash=window.location.hash;
                afterhash.indexOf(0);
                afterhash.toLowerCase();
                afterhash = afterhash.split("/")[0];

                var hash=window.location.hash;
                hash.indexOf(0);
                hash.toLowerCase();
                hash = hash.split("/")[2];

                if(hash && afterhash=='#Account')
                {
                    if($("#totalRec").val() && $("#totalRec").val() > $("input[name='gstno_edit[]']").length)
                    {    
                        var tot_fld_len = $("#totalGSTCntChanged").val();
                        
                        $("select[data-name='howmanygstdetails'] option").prop('selected', false); 
                        $("select[data-name='howmanygstdetails'] option").prop('disabled', false); 
                        
                        $("select[data-name='howmanygstdetails'] option[value='"+tot_fld_len+"']").prop("selected", true);
                        
                        $("select[data-name='howmanygstdetails'] option").filter(function() {
                            return parseInt($(this).val()) <= parseInt($("#totalGSTCntChanged").val());
                        }).prop('disabled', true);

                        $("select[data-name='howmanygstdetails']").val(tot_fld_len);
                    }
                    else if($("input[name='gstno_edit[]']").length == 0)
                    {   
                        $("select[data-name='doyouhavegstnum'] option").prop('selected', false); 
                        $("select[data-name='doyouhavegstnum'] option").prop('disabled', false); 
                        
                        $("select[data-name='doyouhavegstnum'] option[value='No']").prop("selected", true);

                        $("div[data-name='doyouhavegstnum'] .field").find('span').text('No');
                        
                        $("select[data-name='doyouhavegstnum']").val('No');
                    }
                }

                this.addInlineEditLinks();
            }, this);

            this._isInlineEditMode = true;

            this.reRender(true);

            this.trigger('inline-edit-on');
        },

        showValidationMessage: function (message, target) {
            var $el;

            target = target || this.validationElementSelector || '.main-element';

            if (typeof target === 'string' || target instanceof String) {
                $el = this.$el.find(target);
            } else {
                $el = $(target);
            }

            if (!$el.length && this.$element) {
                $el = this.$element;
            }
            $el.popover({
                placement: 'bottom',
                container: 'body',
                content: message,
                trigger: 'manual'
            }).popover('show');

            var isDestroyed = false;

            $el.closest('.field').one('mousedown click', function () {
                if (isDestroyed) return;
                $el.popover('destroy');
                isDestroyed = true;
            });

            this.once('render remove', function () {
                if (isDestroyed) return;
                if ($el) {
                    $el.popover('destroy');
                    isDestroyed = true;
                }
            });

            if (this._timeout) {
                clearTimeout(this._timeout);
            }

            this._timeout = setTimeout(function () {
                if (isDestroyed) return;
                $el.popover('destroy');
                isDestroyed = true;
            }, this.VALIDATION_POPOVER_TIMEOUT);
        },

        validate: function () {
            for (var i in this.validations) {
                var method = 'validate' + Finnova.Utils.upperCaseFirst(this.validations[i]);
                if (this[method].call(this)) {
                    this.trigger('invalid');
                    return true;
                }
            }
            return false;
        },

        getLabelText: function () {
            return this.options.labelText || this.translate(this.name, 'fields', this.model.name);
        },

        validateRequired: function () {
            if (this.isRequired()) {
                if (this.model.get(this.name) === '' || this.model.get(this.name) === null) {
                    var msg = this.translate('fieldIsRequired', 'messages').replace('{field}', this.getLabelText());
                    this.showValidationMessage(msg);
                    return true;
                }
            }
        },

        hasRequiredMarker: function () {
            return this.isRequired();
        },

        fetchToModel: function () {
            this.model.set(this.fetch(), {silent: true});
        },

        fetch: function () {
            var data = {};
            data[this.name] = this.$element.val();
            return data;
        },

        fetchSearch: function () {
            var value = this.$element.val().toString().trim();
            if (value) {
                var data = {
                    type: 'equals',
                    value: value
                };
                return data;
            }
            return false;
        },

        fetchSearchType: function () {
            return this.$el.find('select.search-type').val();
        },

    });
});
