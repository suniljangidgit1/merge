define('custom:views/dashlets/calls', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'calls',
        template: 'custom:dashlets/calls',
    })
});