define('custom:views/dashlets/SalesPipelineGraph', 'views/dashlets/abstract/base',  function (Dep) {

    return Dep.extend({
        name: 'SalesPipelineGraph',
        template: 'custom:dashlets/SalesPipelineGraph',
    })
});