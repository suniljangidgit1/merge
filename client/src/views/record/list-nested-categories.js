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

define('views/record/list-nested-categories', 'view', function (Dep) {

    return Dep.extend({

        template: 'record/list-nested-categories',

        events: {
            'click .action': function (e) {
                var $el = $(e.currentTarget);
                var action = $el.data('action');
                var method = 'action' + Finnova.Utils.upperCaseFirst(action);
                if (typeof this[method] == 'function') {
                    var data = $el.data();
                    this[method](data, e);
                    e.preventDefault();
                }
            },
        },

        data: function () {
            var data = {};

            if (!this.isLoading) {
                data.list = this.getDataList();
            }
            data.scope = this.collection.name;
            data.isLoading = this.isLoading;

            return data;
        },

        getDataList: function () {
            var list = [];
            this.collection.forEach(function (model) {
                var o = {
                    id: model.id,
                    name: model.get('name'),
                    recordCount: model.get('recordCount'),
                    isEmpty: model.get('isEmpty')
                };
                list.push(o);
            }, this);
            return list;
        },

        setup: function () {
            this.listenTo(this.collection, 'sync', function () {
                this.reRender();
            }, this);
        },

        actionShowMore: function () {
            this.$el.find('.category-item.show-more').addClass('hidden');

            this.collection.fetch({
                remove: false,
                more: true
            });
        }

    });
});
