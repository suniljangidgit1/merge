
define('custom:views/dashlets/MyUserBranches', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'MyUserBranches',
        template: 'custom:dashlets/MyUserBranches',
    })
});