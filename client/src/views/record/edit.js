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

define('views/record/edit', 'views/record/detail', function (Dep) {

    return Dep.extend({

        template: 'record/edit',

        type: 'edit',

        name: 'edit',

        fieldsMode: 'edit',

        mode: 'edit',

        buttonList: [
            {
                name: 'save',
                label: 'Save',
                style: 'primary',
            },
            {
                name: 'cancel',
                label: 'Cancel',
            }
        ],

        dropdownItemList: [],

        sideView: 'views/record/edit-side',

        bottomView: 'views/record/edit-bottom',

        duplicateAction: false,

        actionSave: function () {
            var hash=window.location.hash;
            hash.indexOf(0);
            hash.toLowerCase();
            hash = hash.split("/")[2];

            var afterhash=window.location.hash;

            afterhash.indexOf(0);
            afterhash.toLowerCase();
            afterhash1 = afterhash.split("/")[0];
            
            var flag = true;

            // Add user restrictions as per plan
            var isProcced   = "true";
            var url         = window.location.href;
            var user_url    = url.split('/');

            if( ( user_url[3] == "#User" || user_url[3] == "#PortalUser" ) && user_url[4] == "create" ) {

                $.ajax({
                    url         : "../../../../task_cron/domainRestriction.php",
                    type        : "get",
                    dataType    : "json",
                    data        : { restriction : "domain" },
                    async       : false,
                    cache       : false,
                    success     : function( reponse ) {
                        
                        // console.log(" reponse => "+reponse.status);
                        if( reponse.status == "false" ) {
                            $.alert({
                                title: 'Alert!',
                                content: reponse.msg,
                                type: 'dark',
                                typeAnimated: true,
                            });
                            isProcced   = "false";
                        }else{
                            // alert(reponse.msg);
                            // isProcced   = "true";
                        }
                    },
                });
                    
            }

            if( isProcced == "false" ){
                // console.log(" failed!!");
                // this.cancel();
            }else{
                // console.log(" Success!! Insert records.");

                if(afterhash == '#Account/create')
                {   
                    if($("#have_gst_num").val() == 'Yes')
                    {
                        if($("select[data-name='howmanygstdetails']").val() == 'None'){
                            $("div[data-name='howmanygstdetails']").addClass('has-error');
                            $("select[data-name='howmanygstdetails']").focus();
                            flag = false;
                        }
                    }
                    $("select[data-name='howmanygstdetails']").on("change", function(){
                        if($(this).val() != 'None'){
                            $("div[data-name='howmanygstdetails']").removeClass('has-error');
                        }
                        else {
                            $("#last_child_panel").hide();
                        }
                    });
                    var len = $("input[name='gstno[]']").length;
                    //if(len!=0){
                    if($("select[data-name='howmanygstdetails']").val() != 'None')
                    {
                        if($("input[name='name']").val() == "")
                        {
                            $("input[name='name']").css('border-color', '#ad4846');
                            $("input[name='name']").focus();

                            //$("input[data-name='name']").focus();
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
                        else if($("input[name='name']").val() != "")
                        {   
                            var zipRegex = /^\d{6}$/;
                            
                            for(var i=0;i<len;i++)
                            {
                                if($("#gstno"+i).val() == "")
                                {
                                    $("#gstno"+i).css('border-color', '#ad4846');
                                    $("#gstno"+i).focus();

                                    $("#gstno"+i).attr('data-toggle', 'popover-gstno'+i);
                                    $('[data-toggle="popover-gstno'+i+'"]').popover({
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

                                    flag = false;
                                }
                                else if($("#gstno"+i).val() != "")
                                {
                                    if($("#acc_gstAddressStreet"+i).val() == ""){
                                        $("#acc_gstAddressStreet"+i).css('border-color', '#ad4846');
                                        $("#acc_gstAddressStreet"+i).focus();

                                        $("#acc_gstAddressStreet"+i).attr('data-toggle', 'popover-acc_gstAddressStreet'+i);
                                        $('[data-toggle="popover-acc_gstAddressStreet'+i+'"]').popover({
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

                                        flag = false;
                                    }
                                    else if($("#acc_gstcity"+i).val() == ""){
                                        $("#acc_gstcity"+i).css('border-color', '#ad4846');
                                        $("#acc_gstcity"+i).focus();

                                        $("#acc_gstcity"+i).attr('data-toggle', 'popover-acc_gstcity'+i);
                                        $('[data-toggle="popover-acc_gstcity'+i+'"]').popover({
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

                                        flag = false;
                                    }
                                    else if($("#acc_gstpostalcode"+i).val() == ""){
                                        $("#acc_gstpostalcode"+i).css('border-color', '#ad4846');
                                        $("#acc_gstpostalcode"+i).focus();

                                        $("#acc_gstpostalcode"+i).attr('data-toggle', 'popover-acc_gstpostalcode'+i);
                                        $('[data-toggle="popover-acc_gstpostalcode'+i+'"]').popover({
                                            delay: {
                                                "show": 500,
                                                "hide": 100
                                            },
                                            content: 'Please enter postal code',
                                            placement: 'bottom'
                                        }).popover('show').on('shown.bs.popover', function () {
                                            setTimeout(function (a) {
                                                a.popover('hide');
                                            }, 3000, $(this));
                                        });

                                        flag = false;
                                    }
                                    else if(!zipRegex.test($("#acc_gstpostalcode"+i).val())) {
                                        $("#acc_gstpostalcode"+i).css('border-color', '#ad4846');
                                        $("#acc_gstpostalcode"+i).focus();

                                        $("#acc_gstpostalcode"+i).attr('data-toggle', 'popover-acc_gstpostalcode'+i);
                                        $('[data-toggle="popover-acc_gstpostalcode'+i+'"]').popover({
                                            delay: {
                                                "show": 500,
                                                "hide": 100
                                            },
                                            content: 'Please enter valid postal code',
                                            placement: 'bottom'
                                        }).popover('show').on('shown.bs.popover', function () {
                                            setTimeout(function (a) {
                                                a.popover('hide');
                                            }, 3000, $(this));
                                        });

                                        flag = false;
                                    }
                                }
                            }
                        }
                    //}
                    }
                    if(flag == false)
                    {
                        return false;
                    }
                    /*else {
                       this.save(); 
                    }*/
                }else if(hash && afterhash1=='#Account')
                {   
                    var len1 = $("input[name='gstno_edit[]']").length;
                    if($("input[name='name']").val() == "")
                    {
                        $("input[name='name']").css('border-color', '#ad4846');
                        $("input[name='name']").focus();

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
                        var zipRegex = /^\d{6}$/;
                        
                        for(var i=0;i<len1;i++)
                        {
                            if($("#gstnoedit"+i).val() == "")
                            {
                                $("#gstnoedit"+i).css('border-color', '#ad4846');
                                $("#gstnoedit"+i).focus();

                                $("#gstnoedit"+i).attr('data-toggle', 'popover-gstno'+i);
                                $('[data-toggle="popover-gstno'+i+'"]').popover({
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

                                flag = false;
                            }
                            else if($("#gstnoedit"+i).val() != "")
                            {
                                if($("#acc_gstAddressStreetEdit"+i).val() == ""){
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

                                    flag = false;
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

                                    flag = false;
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

                                    flag = false;
                                }
                                else if(!zipRegex.test($("#acc_gstpostalcodeedit"+i).val())) {
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

                                    flag = false;
                                }
                            }
                        }
                    }
                    
                    if(flag == false)
                    {
                        return false;
                    }
                    /*else {
                       this.save(); 
                    }*/
                }

                this.save();
            }
        },

        actionCancel: function () {
            this.cancel();
        },

        cancel: function () {
            if (this.isChanged) {
                this.resetModelChanges();
            }
            this.setIsNotChanged();
            this.exit('cancel');
        },

        setupBeforeFinal: function () {
            if (this.model.isNew()) {
                this.populateDefaults();
            }
            Dep.prototype.setupBeforeFinal.call(this);
        },

        setupActionItems: function () {
            Dep.prototype.setupActionItems.call(this);

            if (this.saveAndContinueEditingAction) {
                this.dropdownItemList.push({
                    name: 'saveAndContinueEditing',
                    label: 'Save & Continue Editing',
                });
            }
        },

    });
});
