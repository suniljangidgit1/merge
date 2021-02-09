define('custom:views/dashlets/ClosingMonth', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'ClosingMonth',
        template: 'custom:dashlets/ClosingMonth',
    })
});