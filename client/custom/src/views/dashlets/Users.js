define('custom:views/dashlets/Users', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'Users',
        template: 'custom:dashlets/Users',
    })
});