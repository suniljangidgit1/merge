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

define('views/dashboard-template/modals/deploy-to-users', ['views/modal', 'model'], function (Dep, Model) {

    return Dep.extend({

        className: 'dialog dialog-record',

        templateContent: '<div class="record">{{{record}}}</div>',

        setup: function () {
            this.buttonList = [
                {
                    name: 'deploy',
                    html: this.translate('Deploy for Users', 'labels', 'DashboardTemplate'),
                    style: 'danger',
                },
                {
                    name: 'cancel',
                    label: 'Cancel',
                },
            ];

            this.headerHtml = this.getHelper().escapeString(this.model.get('name'));

            this.formModel = new Model();
            this.formModel.name = 'None';

            this.formModel.setDefs({
                fields: {
                    'users': {
                        type: 'linkMultiple',
                        view: 'views/fields/users',
                        entity: 'User',
                        required: true
                    },
                    'append': {
                        type: 'bool'
                    },
                }
            });

            this.createView('record', 'views/record/edit-for-modal', {
                scope: 'None',
                model: this.formModel,
                el: this.getSelector() + ' .record',
                detailLayout: [
                    {
                        rows: [
                            [
                                {
                                    name: 'users',
                                    labelText: this.translate('users', 'links'),
                                },
                                {
                                    name: 'append',
                                    labelText: this.translate('append', 'fields', 'DashboardTemplate'),
                                }
                            ]
                        ]
                    }
                ],
            });
        },

        actionDeploy: function () {
            if (this.getView('record').processFetch()) {
                Finnova.Ajax.postRequest('DashboardTemplate/action/deployToUsers', {
                    id: this.model.id,
                    userIdList: this.formModel.get('usersIds'),
                    append: this.formModel.get('append'),
                }).then(function () {
                    Finnova.Ui.success(this.translate('Done'));
                    this.close();
                }.bind(this));
            }
        },
    });
});