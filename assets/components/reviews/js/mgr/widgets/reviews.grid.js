Reviews.grid.Reviews = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'reviews-grid-reviews'
        ,url: Reviews.config.connectorUrl
        ,baseParams: { action: 'mgr/review/getList' }
        ,save_action: 'mgr/review/updateFromGrid'
        ,fields: ['id','name','email','description','rating','resource_id','status']
        ,paging: true
        ,autosave: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'name'
        ,columns: [
          {
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
          },{
              header: _('reviews.name')
              ,dataIndex: 'name'
              ,sortable: true
              ,width: 100
              ,editor: { xtype: 'textfield' }
          },{
              header: _('reviews.description')
              ,dataIndex: 'description'
              ,sortable: false
              ,width: 350
              ,editor: { xtype: 'textfield' }
          },{
              header: _('reviews.rating')
              ,dataIndex: 'rating'
              ,sortable: true
              ,width: 50
              ,editor: { xtype: 'reviews-combo-rating', renderer: true  }
          },{
              header: _('reviews.resource_id')
              ,dataIndex: 'resource_id'
              ,sortable: false
              ,width: 50
              ,editor: { xtype: 'numberfield' }
          },{
              header: _('reviews.status')
              ,dataIndex: 'status'
              ,sortable: true
              ,width: 50
              ,editor: { xtype: 'reviews-combo-status', renderer: true  }
          }
        ]
        ,tbar: [{
            text: _('reviews.review_create')
            ,handler: { xtype: 'reviews-window-review-create' ,blankValues: true }
        },'->',{
            xtype: 'textfield'
            ,id: 'reviews-search-filter'
            ,emptyText: _('reviews.search...')
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        }]
    });
    Reviews.grid.Reviews.superclass.constructor.call(this,config)
};

Reviews.combo.Rating = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        store: new Ext.data.ArrayStore({
            id: 0
            ,fields: ['rating','label']
            ,data: [
                ['1','1']
                ,['2','2']
                ,['3','3']
                ,['4','4']
                ,['5','5']
            ]
        })
        ,mode: 'local'
        ,displayField: 'label'
        ,valueField: 'rating'
    });
    Reviews.combo.Rating.superclass.constructor.call(this,config);
};
Ext.extend(Reviews.combo.Rating,MODx.combo.ComboBox);
Ext.reg('reviews-combo-rating',Reviews.combo.Rating);

Reviews.combo.Status = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        store: new Ext.data.ArrayStore({
            id: 0
            ,fields: ['status','label']
            ,data: [
                ['1','Public']
                ,['0','Hidden']
            ]
        })
        ,mode: 'local'
        ,displayField: 'label'
        ,valueField: 'status'
    });
    Reviews.combo.Status.superclass.constructor.call(this,config);
};
Ext.extend(Reviews.combo.Status,MODx.combo.ComboBox);
Ext.reg('reviews-combo-status',Reviews.combo.Status);

Ext.extend(Reviews.grid.Reviews,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,getMenu: function() {
        return [{
            text: _('reviews.review_update')
            ,handler: this.updateReview
        },'-',{
            text: _('reviews.review_remove')
            ,handler: this.removeReview
        }];
    }
    ,updateReview: function(btn,e) {
        if (!this.updateReviewWindow) {
            this.updateReviewWindow = MODx.load({
                xtype: 'reviews-window-review-update'
                ,record: this.menu.record
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
        this.updateReviewWindow.setValues(this.menu.record);
        this.updateReviewWindow.show(e.target);
    }

    ,removeReview: function() {
        MODx.msg.confirm({
            title: _('reviews.review_remove')
            ,text: _('reviews.review_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/review/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    }
});
Ext.reg('reviews-grid-reviews',Reviews.grid.Reviews);


Reviews.window.CreateReview = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('reviews.review_create')
        ,url: Reviews.config.connectorUrl
        ,baseParams: {
            action: 'mgr/review/create'
        }
        ,fields: [
          {
            xtype: 'textfield'
            ,fieldLabel: _('reviews.name')
            ,name: 'name'
            ,anchor: '100%'
          },{
            xtype: 'textfield'
            ,fieldLabel: _('reviews.email')
            ,name: 'email'
            ,anchor: '100%'
          },{
              xtype: 'textarea'
              ,fieldLabel: _('reviews.description')
              ,name: 'description'
              ,anchor: '100%'
          },{
              xtype: 'reviews-combo-rating'
              ,fieldLabel: _('reviews.rating')
              ,name: 'rating'
              ,hiddenName: 'rating'
              ,anchor: '100%'
          },{
              xtype: 'numberfield'
              ,fieldLabel: _('reviews.resource_id')
              ,name: 'resource_id'
              ,anchor: '100%'
              ,value: 1
          },{
              xtype: 'reviews-combo-status'
              ,fieldLabel: _('reviews.status')
              ,name: 'status'
              ,hiddenName: 'status'
              ,anchor: '100%'
          }
       ]
    });
    Reviews.window.CreateReview.superclass.constructor.call(this,config);
};
Ext.extend(Reviews.window.CreateReview,MODx.Window);
Ext.reg('reviews-window-review-create',Reviews.window.CreateReview);


Reviews.window.UpdateReview = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('reviews.review_update')
        ,url: Reviews.config.connectorUrl
        ,baseParams: {
            action: 'mgr/review/update'
        }
        ,fields: [
          {
            xtype: 'hidden'
            ,name: 'id'
          },{
              xtype: 'textfield'
              ,fieldLabel: _('reviews.name')
              ,name: 'name'
              ,anchor: '100%'
          },{
            xtype: 'textfield'
            ,fieldLabel: _('reviews.email')
            ,name: 'email'
            ,anchor: '100%'
          },{
              xtype: 'textarea'
              ,fieldLabel: _('reviews.description')
              ,name: 'description'
              ,anchor: '100%'
          },{
              xtype: 'reviews-combo-rating'
              ,fieldLabel: _('reviews.rating')
              ,name: 'rating'
              ,hiddenName: 'rating'
              ,anchor: '100%'
          },{
              xtype: 'numberfield'
              ,fieldLabel: _('reviews.resource_id')
              ,name: 'resource_id'
              ,anchor: '100%'
          },{
              xtype: 'reviews-combo-status'
              ,fieldLabel: _('reviews.status')
              ,name: 'status'
              ,hiddenName: 'status'
              ,anchor: '100%'
          }
        ]
    });
    Reviews.window.UpdateReview.superclass.constructor.call(this,config);
};
Ext.extend(Reviews.window.UpdateReview,MODx.Window);
Ext.reg('reviews-window-review-update',Reviews.window.UpdateReview);
