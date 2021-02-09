
define('custom:views/dashlets/MyUserEntities', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'MyUserEntities',
        template: 'custom:dashlets/MyUserEntities',
    })
});