define('custom:views/dashlets/NewLeads', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'NewLeads',
        template: 'custom:dashlets/NewLeads',
    })
});