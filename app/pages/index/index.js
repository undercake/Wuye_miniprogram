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
        console.log('loading');
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        let that = this;
        app.request(that, app.globalData.baseURI + 'index');
    },

    backData: function(e) {

        console.log(e);

        if (e == 'null') {
            wx.hideToast();
            this.setData({loadfail:'block'});
            wx.showToast({
                title: '数据跑火星去了，请稍候再试',
                icon: 'none',
                duration: 4100
            });
            return;
        }

        let data = e.data;
        this.setData({
            remote_json: data,
            isload: true
        });

        wx.hideToast();
        wx.stopPullDownRefresh();

        console.log(e);
    },
    //事件处理函数
    toptap: function(e) {
        console.log(e);
        let type = e.currentTarget.dataset.type;
        let data = e.currentTarget.dataset.d;
        switch (type) {
            case 'news':
                wx.navigateTo({
                    url: '/pages/news/detail?page=' + data
                });
                break;
            case 'rent':
                wx.navigateTo({
                    url: '/pages/rent/detail?localid=' + data
                });
                break;
            case 'around':
                wx.navigateTo({
                    url: '/pages/around/detail?&detail=' + data
                });
                break;
            case 'faq':
                wx.navigateTo({
                    url: '/pages/faq/detail?from=faq&detail=' + data
                });
                break;
        }
        console.log(type, data);
    },

    onPullDownRefresh: function() {
        this.loadData();
    },
});
