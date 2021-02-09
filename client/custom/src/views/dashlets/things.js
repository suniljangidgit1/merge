define('custom:views/dashlets/things', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'things',
        template: 'custom:dashlets/things',
    })
});