define('custom:views/dashlets/addWindow', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'addWindow',
        template: 'custom:dashlets/addWindow',
    })
});