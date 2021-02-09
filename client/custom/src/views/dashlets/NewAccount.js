
define('custom:views/dashlets/NewAccount', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'NewAccount',
        template: 'custom:dashlets/NewAccount',
    })
});