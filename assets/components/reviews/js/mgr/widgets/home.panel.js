Reviews.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        border: false,
        baseCls: "modx-formpanel",
        cls: "container",
        items: [
            {
                html: "<h2>" + _("reviews.management") + "</h2>",
                border: false,
                cls: "modx-page-header",
            },
            {
                xtype: "modx-tabs",
                defaults: { border: false, autoHeight: true },
                border: true,
                items: [
                    {
                        title: _("reviews"),
                        defaults: { autoHeight: true },
                        items: [
                            {
                              html:"<p>"+_("reviews.management_desc")+"</p>",
                              border: false,
                            },{
                              xtype: 'reviews-grid-reviews',
                              cls: "main-wrapper",
                              preventRender: true,
                          },
                        ]
                    },
                ],
                // only to redo the grid layout after the content is rendered
                // to fix overflow components' panels, especially when scroll bar is shown up
                listeners: {
                    afterrender: function (tabPanel) {
                        tabPanel.doLayout();
                    },
                },
            },
        ],
    });
    Reviews.panel.Home.superclass.constructor.call(this, config);
};


Ext.extend(Reviews.panel.Home, MODx.Panel);
Ext.reg("reviews-panel-home", Reviews.panel.Home);
