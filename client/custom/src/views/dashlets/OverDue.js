define('custom:views/dashlets/OverDue', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'OverDue',
        template: 'custom:dashlets/OverDue',
    })
});