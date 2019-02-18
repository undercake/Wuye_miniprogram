// pages/news/detail.js
Page({

    /**
     * 页面的初始数据
     */
    data: {
        isload: false,
        loadfail: 'none',
        id:-1
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        try {
        if (options.detail <= -1 ) return;
        this.setData({id:options.detail});
        this.loadData();
        } catch (e) {
            console.log(e);
        }
    },


    loadData: function() {
        console.log('loading');
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        let that = this;
        app.request(that, app.globalData.baseURI + 'index' , 'GET' ,{id:that.data.id});
    },

    backData: function(e) {

        console.log(e);

        if (e == 'null') {
            wx.hideToast();
            this.setData({
                loadfail: 'block'
            });
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

    /**
     * 生命周期函数--监听页面初次渲染完成
     */
    onReady: function() {

    },

    /**
     * 生命周期函数--监听页面显示
     */
    onShow: function() {

    },

    /**
     * 生命周期函数--监听页面隐藏
     */
    onHide: function() {

    },

    /**
     * 生命周期函数--监听页面卸载
     */
    onUnload: function() {

    },

    /**
     * 页面相关事件处理函数--监听用户下拉动作
     */
    onPullDownRefresh: function() {
        this.getData();
    },

    /**
     * 页面上拉触底事件的处理函数
     */
    onReachBottom: function() {

    },

    /**
     * 用户点击右上角分享
     */
    onShareAppMessage: function() {

    }
})
