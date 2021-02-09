define('custom:views/dashlets/LeadsKanban', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'LeadsKanban',
        template: 'custom:dashlets/LeadsKanban',
    })
});