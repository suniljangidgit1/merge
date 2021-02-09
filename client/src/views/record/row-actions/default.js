/************************************************************************
 * This file is part of FinnovaCRM.
 *
 * FinnovaCRM - Open Source CRM application.
 * Copyright (C) 2014-2018 Yuri Kuznetsov, Taras Machyshyn, Oleksiy Avramenko
 * Website: http://www.FinnovaCRM.com
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

Finnova.define('views/record/row-actions/default', 'view', function (Dep) {

    return Dep.extend({

        template: 'record/row-actions/default',

        setup: function () {
            this.options.acl = this.options.acl || {};
        },

        afterRender: function () {
            var $dd = this.$el.find('button[data-toggle="dropdown"]').parent();

            var isChecked = false;
            $dd.on('show.bs.dropdown', function () {
                var $el = this.$el.closest('.list-row');
                isChecked = false;
                if ($el.hasClass('active')) {
                    isChecked = true;
                }
                $el.addClass('active');
            }.bind(this));
            $dd.on('hide.bs.dropdown', function () {
                if (!isChecked) {
                    this.$el.closest('.list-row').removeClass('active');
                }
            }.bind(this));
        },

        getActionList: function () {
            var afterhash = window.location.hash;
            if (afterhash == '#EmailReminder') {
                var list = [{}];
            } else {
                if (afterhash == "#SMSReminder") {
                    var list = [{}];
                } else {
                    if(afterhash == "#Estimate" && afterhash == "#Invoice"){
                        var list = [{
                            action: 'view',
                            label: 'View',
                            data: {
                                id: this.model.id
                            },
                            link: '#' + this.model.name + '/view/' + this.model.id
                        }];
                    }
                    else {
                        var list = [{}];
                    }
                }
            }
           

            if (afterhash == "#SMSReminder" ) {
                var list = [{}];
            }
            else if (afterhash == "#MyCampaigns" ) {
                var list = [{}];
            } else if (afterhash == '#ImportResult') {
                var list = [{}];
            }else {
                if (afterhash == "#EmailReminder") {
                    var list = [{}];
                } else {
                    if (afterhash == "#SentEmailReminder") {
                        var list = [{
                            action: 'viewEmailData',
                            label: 'View',
                            data: {
                                id: this.model.id
                            }
                        }];
                    }
                    else if (afterhash == "#SendSMSData") {
                        var list = [{
                            action: 'viewSMSData',
                            label: 'View',
                            data: {
                                id: this.model.id
                            }
                        }];
                    }
                    else if (afterhash == "#ContactList") {
                        var list = [{
                            action: 'viewContactList',
                            label: 'Edit',
                            data: {
                                id: this.model.id
                            }
                        }];
                    }
                    else if (afterhash == "#SentMessages") {
                        var list = [{
                            action: 'viewSentMessages',
                            label: 'View',
                            data: {
                                id: this.model.id
                            }
                        }];
                    }else if( afterhash == "#ExportResult"){
                        // 21-05-2020 : Sunil Jangid - Custom export
                        var list = [{}];
                    }else{
                        // if(afterhash == "#Estimate" && afterhash == "#Invoice"){
                        if(afterhash != "#Estimate" && afterhash != "#Invoice"){
                            var list = [{
                                action: 'view',
                                label: 'View',
                                data: {
                                    id: this.model.id
                                },
                                link: '#' + this.model.name + '/view/' + this.model.id
                            }];
                        }
                        else {
                            var list = [{}];
                        }
                    }
                }
            }
            
            // 18-05-2020 : Sunil Jangid - Custom export
            
            if (afterhash == "#ExportResult") {
                
                var tempArr = $.parseJSON(JSON.stringify(this.model));
                
                if( tempArr["isExported"] == "Completed" ){
                    
                    list.push({
                        action: 'download',
                        label: 'Download',
                        data: {
                            id: this.model.id
                        },
                        // link: '#' + this.model.name + '/view/' + this.model.id
                    });
                }
            }

            // 18-05-2020 : Sunil Jangid - Custom export

            if (afterhash == '#EmailReminder') {

                if (this.options.acl.edit) {
                    list.push({
                        action: 'EmailReminderEdit',
                        label: 'Edit',
                        data: {
                            id: this.model.id
                        },
                        //link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }

            } else if (afterhash == "#SMSReminder") {
                if (this.options.acl.edit) {
                    list.push({
                        action: 'SMSReminderEdit',
                        label: 'Edit',
                        data: {
                            id: this.model.id
                        },
                        //link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }
            }

            else if (afterhash == "#ContactList") {
                if (this.options.acl.edit) {
                    list.push({
                        action: 'ContactListEdit',
                        label: 'Rename',
                        data: {
                            id: this.model.id
                        },
                        //link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }

            }else if (afterhash == "#MyCampaigns") {
                if (this.options.acl.edit) {
                    list.push({
                        action: 'myCampaignsEdit',
                        label: 'Edit',
                        data: {
                            id: this.model.id
                        },
                        //link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }

            }else if (afterhash == "#ContentTemplate") {
                var list = [{}];
                if (this.options.acl.edit) {
                    list.push({
                        action: 'ContentTemplateEdit',
                        label: 'Edit',
                        data: {
                            id: this.model.id
                        },
                        //link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }

            }else if (afterhash == "#ImportResult") {
                // list = list.concat([{
                //         action: 'ImportResultdownload',
                //         label: 'Download'
                //     }]);
                var list = [{}];
            }

        else if( afterhash == "#ExportResult" || afterhash == "#ClosedTask" ){
                // 21-05-2020 : Sunil Jangid - Custom export
                // var list = [{}];
            } else {
                var modelName = this.model.name;
                if (this.options.acl.edit && modelName !='SentEmailReminder' && modelName !='SendSMSData' && modelName !='SentMessages' && modelName !='Estimate' && modelName !='Invoice' && modelName !='Payments') {
                    list.push({
                        action: 'edit',
                        label: 'Edit',
                        data: {
                            id: this.model.id
                        },
                        link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }
            }
            if (this.options.acl.delete) {
                list.push({
                    action: 'quickRemove',
                    label: 'Remove',
                    data: {
                        id: this.model.id
                    }
                });
            }
            var afterhash = window.location.hash;
            if (afterhash == '#EmailReminder') {
                list.push({
                    action: 'Active',
                    label: 'Activate',
                    data: {
                        id: this.model.id
                    }
                });

                list.push({
                    action: 'InActive',
                    label: 'Deactivate',
                    data: {
                        id: this.model.id
                    }
                });

                //  list.push({
                //     action: 'RemoveEmailRecord',
                //     label: 'Remove',
                //     data: {
                //         id: this.model.id
                //     }
                // });
            }

            var afterhash = window.location.hash;
            if (afterhash == '#SMSReminder') {
                list.push({
                    action: 'SMSActive',
                    label: 'Activate',
                    data: {
                        id: this.model.id
                    }
                });

                list.push({
                    action: 'SMSInActive',
                    label: 'Deactivate',
                    data: {
                        id: this.model.id
                    }
                });
            }


            var folder_name = window.location.pathname;
            folder_name.indexOf(1);
            folder_name.toLowerCase();
            folder_name = folder_name.split("/")[1];

            var domain_name = window.location.hostname;


            var first = window.location.pathname;
            first.indexOf(1);
            first.toLowerCase();
            first = first.split("/")[1];
            if (first == 'portal') {
                var afterhash = window.location.hash;

                if (afterhash == '#Estimate') {

                    // list = list.concat([{
                    //     action: 'PDF',
                    //     label: 'View/PDF',
                    //     link: 'http://' + domain_name + '/' + folder_name + '/pdf/estimate.php?id=' + this.model.id,

                    //     data: {
                    //         id: this.model.id
                    //     },
                    // }]);

                    list = list.concat([{
                        action: 'view_attachments',
                        label: 'View Attachments',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'view_comments',
                        label: 'View Comments',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'View_estimate',
                        label: 'View Estimate',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    var estimate_id = this.model.id;
                    $.ajax({
                        url: "../../../../client/src/views/record/row-actions/check_accepted.php?estimate_id=" + estimate_id,
                        type: "get",
                        async: false,
                        success: function (result) {
                            assign_val21(result);

                        }

                    });

                    function assign_val21(result) {
                        sessionStorage.removeItem("result_val21");
                        sessionStorage.setItem("result_val21", result);
                    }

                    if (sessionStorage.length != 0) {
                        // alert("in 0");
                        var result_val21 = sessionStorage.getItem("result_val21");
                    }

                    if (result_val21 == 1)
                    {
                        // alert("in 1");
                        list = list.concat([{
                            action: 'Accept',
                            label: 'Accept',

                            data: {
                                id: this.model.id
                            },
                        }]);
                    }

                    $.ajax({
                        url: "../../../../client/src/views/record/row-actions/check_declined.php?estimate_id=" + estimate_id,
                        type: "get",
                        async: false,
                        success: function (result) {

                            assign_val22(result);

                        }

                    });

                    function assign_val22(result) {
                        sessionStorage.removeItem("result_val22");
                        sessionStorage.setItem("result_val22", result);
                    }

                    if (sessionStorage.length != 0) {
                        var result_val22 = sessionStorage.getItem("result_val22");
                    }

                    if (result_val22 == 1)
                    {
                        list = list.concat([{
                            action: 'Reject',
                            label: 'Reject',

                            data: {
                                id: this.model.id
                            },
                        }]);
                    }


                }else {
                    var list = [{
                            action: 'view',
                            label: 'View',
                            data: {
                                id: this.model.id
                            },
                            link: '#' + this.model.name + '/view/' + this.model.id
                        }];
                }

            } else {
                var afterhash = window.location.hash;

                if (afterhash == '#Estimate') {

                    list = list.concat([{
                        action: 'PDF',
                        label: 'View/PDF',
                        link: 'https://' + domain_name + '/' + folder_name + '/pdf/estimate.php?id=' + this.model.id,

                        data: {
                            id: this.model.id
                        },
                    }]);

                    var estimate_id = this.model.id;

                    // $.ajax({
                    //     url: "../../client/src/views/record/row-actions/check_accepted.php?estimate_id="+estimate_id,
                    //     type: "get", 
                    //     async: false,
                    //     success: function(result)
                    //     {

                    //         assign_val21(result);

                    //     }

                    //     });

                    // function assign_val21(result)
                    // {
                    //    sessionStorage.removeItem("result_val21"); 
                    //    sessionStorage.setItem("result_val21",result);


                    // }

                    // if (sessionStorage.length != 0) 
                    // {
                    // var result_val21=sessionStorage.getItem("result_val21");
                    // }


                    // if(result_val21==1)

                    //        {


                    // list = list.concat([
                    //                     {
                    //                         action: 'Accept',
                    //                         label: 'Accept',

                    //                         data: {
                    //                             id: this.model.id
                    //                         },
                    //                     }
                    //                 ]);
                    // }

                    // $.ajax({
                    //     url: "../../client/src/views/record/row-actions/check_declined.php?estimate_id="+estimate_id,
                    //     type: "get", 
                    //     async: false,
                    //     success: function(result)
                    //     {

                    //         assign_val22(result);

                    //     }

                    //     });

                    // function assign_val22(result)
                    // {
                    //    sessionStorage.removeItem("result_val22"); 
                    //    sessionStorage.setItem("result_val22",result);


                    // }

                    // if (sessionStorage.length != 0) 
                    // {
                    // var result_val22=sessionStorage.getItem("result_val22");
                    // }


                    // if(result_val22==1)

                    //        {

                    // list = list.concat([
                    //                     {
                    //                         action: 'Decline',
                    //                         label: 'Decline',

                    //                         data: {
                    //                             id: this.model.id
                    //                         },
                    //                     }
                    //                 ]);
                    // }


                    $.ajax({
                        url: "../../../../client/src/views/record/row-actions/check_accepted.php?estimate_id=" + estimate_id,
                        type: "get",
                        async: false,
                        success: function (result) {
                            assign_val22(result);
                        }
                    });

                    function assign_val22(result) {
                        sessionStorage.removeItem("result_val22");
                        sessionStorage.setItem("result_val22", result);
                    }

                    if (sessionStorage.length != 0) {
                        var result_val22 = sessionStorage.getItem("result_val22");
                    }
                    
                    if (result_val22 == 1) {
                        list = list.concat([{
                            action: 'Edit_estimate',
                            label: 'Edit Estimate',

                            data: {
                                id: this.model.id
                            },
                        }]);
                    }

                    if (result_val22 == 0)
                    {
                        list = list.concat([{
                            action: 'Convert',
                            label: 'Convert to Invoice',
                            data: {
                                id: this.model.id,
                            },
                        }]);
                    }

                    list = list.concat([{
                        action: 'view_attachments',
                        label: 'View Attachments',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'view_comments',
                        label: 'View Comments',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'email_estimate',
                        label: 'E-mail Estimate',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'Remove_Estimate',
                        label: 'Remove Estimate',

                        data: {
                            id: this.model.id
                        },
                    }]);
                }
            }


            //invoice row action buttons

            // fetch_invoice_data(this.model.id);     
            // function fetch_invoice_data(task_id)
            // {
            // var task_id=task_id;

            // var first = window.location.pathname;
            // first.indexOf(2);
            // first.toLowerCase();
            // first = first.split("/")[2]; 

            // if(first=='portal')
            // {
            //     $.ajax({
            //     url: "../../../../client/src/views/record/row-actions/check_entity_invoice.php",
            //     type: "get", 
            //     async: false,
            //     success: function(result)
            //     {

            //         assign_val(result);

            //     }

            //     });
            // }
            // else
            // {

            //      $.ajax({
            //     url: "../../client/src/views/record/row-actions/check_entity_invoice.php",
            //     type: "get", 
            //     async: false,
            //     success: function(result)
            //     {

            //         assign_val(result);

            //     }

            //     });
            // }
            // }

            // function assign_val(result)
            // {
            //    sessionStorage.removeItem("result_val"); 
            //    sessionStorage.setItem("result_val",result);


            // }

            // if (sessionStorage.length != 0) 
            // {
            // var result_val2=sessionStorage.getItem("result_val");
            // }

            // if(result_val2==2)

            //        {

            // var first = window.location.pathname;
            // first.indexOf(2);
            // first.toLowerCase();
            // first = first.split("/")[2];

             var first = window.location.pathname;
            first.indexOf(1);
            first.toLowerCase();
            first = first.split("/")[1];

            if (first == 'portal') {
                var afterhash = window.location.hash;
                if (afterhash == '#Invoice') {
                    /*list = list.concat([{
                        action: 'PDF',
                        label: 'View/PDF',
                        link: 'http://' + domain_name + '/' + folder_name + '/pdf/invoice.php?id=' + this.model.id,

                        data: {
                            id: this.model.id
                        },
                    }]);*/


                    list = list.concat([{
                        action: 'Pay',
                        label: 'Pay Now',

                        data: {
                            id: this.model.id
                        },
                    }]);
                    list = list.concat([{
                        action: 'view_attachments_invoice',
                        label: 'View Attachments',
                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'View_payments',
                        label: 'Payment Summary',

                        data: {
                            id: this.model.id
                        },
                    }]);

                      list = list.concat([{
                        action: 'View_invoice',
                        label: 'View Invoice',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'View_invoice_comment',
                        label: 'View Comment',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    var invoice_id = this.model.id;
                    $.ajax({
                        url: "../../../../client/src/views/record/row-actions/invoice_check_accepted.php?invoice_id=" + invoice_id,
                        type: "get",
                        async: false,
                        success: function (result) {
                            assign_val21(result);

                        }

                    });

                    function assign_val21(result) {
                        sessionStorage.removeItem("result_val21");
                        sessionStorage.setItem("result_val21", result);
                    }

                    if (sessionStorage.length != 0) {
                        // alert("in 0");
                        var result_val21 = sessionStorage.getItem("result_val21");
                    }

                    if (result_val21 == 1)
                    {
                        // alert("in 1");
                        list = list.concat([{
                            action: 'Accept_invoice',
                            label: 'Accept',

                            data: {
                                id: this.model.id
                            },
                        }]);
                    }
                   

                     $.ajax({
                        url: "../../../../client/src/views/record/row-actions/invoice_check_reject.php?invoice_id=" + invoice_id,
                        type: "get",
                        async: false,
                        success: function (result) {

                            assign_val22(result);

                        }

                    });

                    function assign_val22(result) {
                        sessionStorage.removeItem("result_val22");
                        sessionStorage.setItem("result_val22", result);
                    }

                    if (sessionStorage.length != 0) {
                        var result_val22 = sessionStorage.getItem("result_val22");
                    }

                    if (result_val22 == 1)
                    {
                         list = list.concat([{
                            action: 'Reject_invoice',
                            label: 'Reject',

                            data: {
                                id: this.model.id
                            },
                        }]);
                    }

                }
            } else {
                var afterhash = window.location.hash;
                if (afterhash == '#Invoice') {

                    list = list.concat([{
                        action: 'PDF',
                        label: 'View/PDF',
                        link: 'https://' + domain_name + '/' + folder_name + '/pdf/invoice.php?id=' + this.model.id,
                        data: {
                            id: this.model.id
                        },
                    }]);


                    list = list.concat([{
                        action: 'view_attachments_invoice',
                        label: 'View Attachments',
                        data: {
                            id: this.model.id
                        },
                    }]);

                    // list = list.concat([
                    //                     {
                    //                         action: 'Pay',
                    //                         label: 'Pay Now',

                    //                         data: {
                    //                             id: this.model.id
                    //                         },
                    //                     }
                    //                 ]);


                    list = list.concat([{
                        action: 'Edit_invoice',
                        label: 'Edit Invoice',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    var inv_id = this.model.id;
                    $.ajax({
                        url: "../../../../client/src/views/record/row-actions/check_invoice_payment_status.php?inv_id=" + inv_id,
                        type: "get",
                        async: false,
                        success: function (result) {
                            assign_val222(result);

                        }

                    });

                    function assign_val222(result) {
                        sessionStorage.removeItem("result_val222");
                        sessionStorage.setItem("result_val222", result);
                    }

                    if (sessionStorage.length != 0) {
                        var result_val222 = sessionStorage.getItem("result_val222");
                    }

                    if (result_val222 == 1)
                    {
                        list = list.concat([{
                            action: 'Record_payment ',
                            label: 'Record Payment ',

                            data: {
                                id: this.model.id
                            },
                        }]);
                    }   
                    list = list.concat([{
                        action: 'View_payments',
                        label: 'Payment Summary',

                        data: {
                            id: this.model.id
                        },
                    }]);
                     list = list.concat([{
                        action: 'email_invoice',
                        label: 'E-mail Invoice',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'View_invoice_comment',
                        label: 'View Comment',

                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'Remove_Invoice',
                        label: 'Remove',

                        data: {
                            id: this.model.id
                        },
                    }]);
                }
            }


            //payments row action buttons


            // fetch_payment_data(this.model.id);     
            // function fetch_payment_data(task_id)
            // {
            // var task_id=task_id;

            // var first = window.location.pathname;
            // first.indexOf(2);
            // first.toLowerCase();
            // first = first.split("/")[2]; 

            // if(first=='portal')
            // {
            //     $.ajax({
            //     url: "../../../../client/src/views/record/row-actions/check_entity_payments.php",
            //     type: "get", 
            //     async: false,
            //     success: function(result)
            //     {

            //         assign_val(result);

            //     }

            //     });
            // }
            // else
            // {

            //      $.ajax({
            //     url: "../../client/src/views/record/row-actions/check_entity_payments.php",
            //     type: "get", 
            //     async: false,
            //     success: function(result)
            //     {

            //         assign_val(result);

            //     }

            //     });
            // }
            // }

            // function assign_val(result)
            // {
            //    sessionStorage.removeItem("result_val"); 
            //    sessionStorage.setItem("result_val",result);


            // }

            // if (sessionStorage.length != 0) 
            // {
            // var result_val3=sessionStorage.getItem("result_val");
            // }

            // if(result_val3==4)

            //        {

            var first_pay = window.location.pathname;
            first_pay.indexOf(2);
            first_pay.toLowerCase();
            first_pay = first_pay.split("/")[2];

            if (first_pay == 'portal') {


            } else {
                var afterhash = window.location.hash;
                if (afterhash == '#Payments') {
                    list = list.concat([{
                        action: 'Edit_payment',
                        label: 'Edit Payment',


                        data: {
                            id: this.model.id
                        },
                    }]);

                    list = list.concat([{
                        action: 'Remove_Payment',
                        label: 'Remove',

                        data: {
                            id: this.model.id
                        },
                    }]);


                }

            }

            var first = window.location.pathname;
            first.indexOf(2);
            first.toLowerCase();
            first = first.split("/")[2];

            if (first == 'portal') {
                
            } else {
                var afterhash = window.location.hash;
                if(afterhash == '#BillingEntity'){
                    var list = [{}];
                }
                if (afterhash == '#BillingEntity') {

                    /*list = list.concat([{
                        action: 'View_billing_entity',
                        label: 'View',

                        data: {
                            id: this.model.id
                        },
                    }]);*/
                    list = list.concat([{
                        action: 'Edit_billingentity',
                        label: 'Edit',

                        data: {
                            id: this.model.id
                        },
                    }]);
                    list = list.concat([{
                        action: 'Remove_billing_entity',
                        label: 'Remove',

                        data: {
                            id: this.model.id
                        },
                    }]);
                }
            }

            //remove empty list from dropdown
            if(afterhash == '#ImportResult' || afterhash == '#MyCampaigns' || afterhash == '#SMSReminder' || afterhash == '#EmailReminder' || afterhash == '#ExportResult'  || afterhash == '#ContentTemplate'){
               list = list.slice(1, 5);
            }

            if(afterhash == '#BillingEntity' || afterhash == '#Estimate' || afterhash == '#Invoice' || afterhash == '#Payments'){
                list = list.slice(1);
            }
            return list;
        },

        data: function () {
            return {
                acl: this.options.acl,
                actionList: this.getActionList(),
                scope: this.model.name

            };
        }
    });

});