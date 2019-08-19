//index.js
//获取应用实例
const app = getApp();

Page({
    data: {
        hasUserInfo: false,
        remote_json: {},
        pageData: '',
        isload: false,
        loadfail: 'none',
    },

    onLoad: function() {
        this.loadData();
    },

    loadData: function() {
        // console.log('loading');
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        let that = this;
        app.request(that, app.globalData.baseURI ,'GET', {'page':'index','get':'page'});
    },

    backData: function(e) {
        wx.stopPullDownRefresh();

        if (e == 'null' || typeof(e.data) != 'object') {
            this.setData({loadfail:'block'});
            return;
        }
        wx.hideToast();

        let data = e.data;
        this.setData({
            remote_json: data,
            isload: true
        });
        // console.log(e);
    },
    //事件处理函数
    toptap: function(e) {
        console.log(e);
        wx.navigateTo({
            url: '/pages/' + e.currentTarget.dataset.type + '/detail?page=' + e.currentTarget.dataset.d
        });
    },

    onPullDownRefresh: function() {
        this.loadData();
    },
});
