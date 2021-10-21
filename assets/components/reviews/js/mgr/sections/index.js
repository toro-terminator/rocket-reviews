Ext.onReady(function () {
    MODx.load({ xtype: "reviews-page-home" });
});
Reviews.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [
            {
                xtype: "reviews-panel-home",
                renderTo: "reviews-panel-home-div",
            },
        ],
    });
    Reviews.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(Reviews.page.Home, MODx.Component);
Ext.reg("reviews-page-home", Reviews.page.Home);
