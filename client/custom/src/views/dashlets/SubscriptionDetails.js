define('custom:views/dashlets/SubscriptionDetails', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'SubscriptionDetails',
        template: 'custom:dashlets/SubscriptionDetails',
    })
});