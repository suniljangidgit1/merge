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

Finnova.define('crm:views/record/row-actions/tasks', 'views/record/row-actions/relationship-no-unlink', function (Dep) {

    return Dep.extend({

        getActionList: function () {
            var list = [{
                action: 'quickView',
                label: 'View',
                data: {
                    id: this.model.id
                },
                link: '#' + this.model.name + '/view/' + this.model.id
            }];

            fetch_data(this.model.id);     
            function fetch_data(task_id)
            {
                var task_id=task_id;
                var first = window.location.pathname;
                first.indexOf(2);
                first.toLowerCase();
                first = first.split("/")[2];

                if(first=='portal')
                {
                    $.ajax({
                        url: "../../client/src/views/record/row-actions/edit_hide_show1.php",
                        type: "get", 
                        async: false,
                        data: { task_id: task_id, },
                        success: function(result)
                        {
                            assign_val(result);
                        }
                    });
                }
                else
                {
                    $.ajax({
                        url: "../../client/src/views/record/row-actions/edit_hide_show1.php",
                        type: "get", 
                        async: false,
                        data: { task_id: task_id, },
                        success: function(result)
                        {
                            assign_val(result);
                        }
                    });
                }
            }

            function assign_val(result)
            {
               sessionStorage.removeItem("result_val"); 
               sessionStorage.setItem("result_val",result);
            }

            if(sessionStorage.length != 0) 
            {
                var result_val1=sessionStorage.getItem("result_val");
            }
         
            if(result_val1==1)
            {
                if(this.options.acl.edit) {
                    list.push({
                        action: 'quickEdit',
                        label: 'Edit',
                        data: {
                            id: this.model.id
                        },
                        link: '#' + this.model.name + '/edit/' + this.model.id
                    });
                }
            };


            if (!~['Completed', 'Canceled','Closed'].indexOf(this.model.get('status'))) {
                list.push({
                    action: 'Complete',
                        html: this.translate('Complete', 'labels', 'Task'),
                        data: {
                            id: this.model.id
                        }
                    });
                }
                    
            if (this.options.acl.delete) {
                list.push({
                    action: 'removeRelated',
                    label: 'Remove',
                    data: {
                        id: this.model.id
                    }
                });
            }
            return list;
        }
    });
});
