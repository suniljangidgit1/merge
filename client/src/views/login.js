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

define('views/login', 'view', function (Dep) {

    return Dep.extend({

        template: 'login',

        views: {
            footer: {
                el: 'body > footer',
                view: 'views/site/footer'
            },
        },

        events: {
            'submit #login-form': function (e) {
                this.login();
                return false;
            },
            'click a[data-action="passwordChangeRequest"]': function (e) {
                this.showPasswordChangeRequest();
            }
        },

        data: function () {
            return {
                logoSrc: this.getLogoSrc(),
                showForgotPassword: this.getConfig().get('passwordRecoveryEnabled'),
            };
        },

        getLogoSrc: function () {
            var companyLogoId = this.getConfig().get('companyLogoId');
            if (!companyLogoId) {
                return this.getBasePath() + ('client/img/logo.png');
            }
            return this.getBasePath() + '?entryPoint=LogoImage&id='+companyLogoId;
        },

        login: function () {

            var userName = $('#field-userName').val();
            var trimmedUserName = userName.trim();
            var currentDomain = window.location.hostname;
            if (trimmedUserName !== userName) {
                $('#field-userName').val(trimmedUserName);
                userName = trimmedUserName;
            }
            var domain_status ="";
            $.ajax({
                type    : "GET",
                url     : "../../../../client/src/views/domain_status/check_domain_status.php",
                dataType  : "json",
                data    : {currentDomain:currentDomain,userName:userName},
                async: false,
                success: function(data)
                {   
                    domain_status = data.domain_status;
                    if(domain_status == 'Blocked'){
                        if(data.is_admin == 1){
                            $.alert({
                            title: 'Alert!',
                            content: 'Oops! Your subscription has expired. Please renew your subscription to continue uninterrupted usage.',
                            type: 'dark',
                            typeAnimated: true,
                            closeIcon: true,
                            buttons: {
                                UPGRADE: function () {
                                    var methodName = 'getUpgradeUrl';
                                    var currentDomain = window.location.hostname;
                                    $.ajax({
                                    type    : "GET",
                                    url     : "../../../../client/res/templates/site/check_validity/check_domain_validity.php",
                                    dataType  : "json",
                                    data    : {methodName:methodName,currentDomain:currentDomain},
                                    success: function(data){ 
                                        if(data.requestType == 'free'){
                                            $(location).attr("href",data.url);
                                        }else{
                                            $(location).attr("href",data.paid_user_url);
                                        }
                                    },
                                    });
                                },
                                
                            }
                  
                            });
                        }else{

                            $.alert({
                            title: 'Alert!',
                            content: 'Oops! Your subscription has expired. Please contact your admin.',
                            type: 'dark',
                            typeAnimated: true,
                            });

                        }
                    }
                    
                },
                 
            });

            if(domain_status == 'Blocked'){

                return false;
            }

            var password = $('#field-password').val();

            var $submit = this.$el.find('#btn-login');

            if (userName == '') {

                this.isPopoverDestroyed = false;
                var $el = $("#field-userName");

                var message = this.getLanguage().translate('userCantBeEmpty', 'messages', 'User');

                $el.popover({
                    placement: 'bottom',
                    container: 'body',
                    content: message,
                    trigger: 'manual',
                }).popover('show');

                var $cell = $el.closest('.form-group');
                $cell.addClass('has-error');
                $el.one('mousedown click', function () {
                    $cell.removeClass('has-error');
                    if (this.isPopoverDestroyed) return;
                    $el.popover('destroy');
                    this.isPopoverDestroyed = true;
                }.bind(this));
                return;
            }

            $submit.addClass('disabled').attr('disabled', 'disabled');

            Finnova.Ui.notify(this.translate('pleaseWait', 'messages'));

            Finnova.Ajax.getRequest('App/user', null, {
                login: true,
                headers: {
                    'Authorization': 'Basic ' + Base64.encode(userName  + ':' + password),
                    'Finnova-Authorization': Base64.encode(userName + ':' + password),
                    'Finnova-Authorization-By-Token': false,
                    'Finnova-Authorization-Create-Token-Secret': true,
                },
            }).then(
                function (data) {
                    this.notify(false);
                    this.trigger('login', userName, data);
                }.bind(this)
            ).fail(
                function (xhr) {
                    $submit.removeClass('disabled').removeAttr('disabled');
                    if (xhr.status == 401) {
                        var data = xhr.responseJSON || {};
                        var statusReason = xhr.getResponseHeader('X-Status-Reason');

                        if (statusReason === 'second-step-required') {
                            xhr.errorIsHandled = true;
                            this.onSecondStepRequired(userName, password, data);
                            return;
                        }

                        this.onWrongCredentials();
                    }
                }.bind(this)
            );
        },

        onSecondStepRequired: function (userName, password, data) {
            var view = data.view || 'views/login-second-step';

            this.trigger('redirect', view, userName, password, data);
        },

        onWrongCredentials: function () {
            var cell = $('#login .form-group');
            cell.addClass('has-error');
            this.$el.one('mousedown click', function () {
                cell.removeClass('has-error');
            });
            Finnova.Ui.error(this.translate('wrongUsernamePasword', 'messages', 'User'));
        },

        showPasswordChangeRequest: function () {
            Finnova.Ui.notify(this.translate('pleaseWait', 'messages'));
            this.createView('passwordChangeRequest', 'views/modals/password-change-request', {
                url: window.location.href
            }, function (view) {
                view.render();
                Finnova.Ui.notify(false);
            });
        }
    });
});