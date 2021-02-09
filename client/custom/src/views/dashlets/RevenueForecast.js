define('custom:views/dashlets/RevenueForecast', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'RevenueForecast',
        template: 'custom:dashlets/RevenueForecast',
    })
});