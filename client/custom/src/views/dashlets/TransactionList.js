define('custom:views/dashlets/TransactionList', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'TransactionList',
        template: 'custom:dashlets/TransactionList',
    })
});