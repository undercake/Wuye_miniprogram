// pages/news/news.js
let app = getApp();
Page({

    data: {
        datalist: {
            'title': '',
            'id': '',
            'image': '',
            'content': '',
        },
        isLoading: false,
        loadingColor: '#ececec',
        loadcount: 0,
        bottom: false
    },

    /** 生命周期函数--监听页面加载 */
    onLoad: function(options) {
        this.loadData();
    },

    loadData: function(back = true) {
        if (back) {
            wx.showToast({
                title: '加载中...',
                icon: 'loading',
                duration: 2000000
            });
        } else {
            if (this.data.isLoading) return;
            this.setData({
                isLoading: true
            });
            if (this.data.bottom) return;
        }
        let that = this;
        app.request(that, app.globalData.baseURI + 'news' + (back ? '' : '?count=' + that.data.loadcount));
    },

    backData: function(e) {
        console.log(e);
        if (e == 'null') {
            this.setData({
                isload: false
            });
            wx.hideToast();
            return;
        }

        let data = e.data.content;
        let that = this;

        // 触底加载事件
        if (this.data.isLoading) {
            data = data.concat(this.data.datalist, data);
        }

        this.setData({
            datalist: data,
            isLoading: false,
            bottom: e.data.bottom
        });

        this.setData({
            loadcount: that.data.loadcount + 1
        });

        wx.hideToast();
        wx.stopPullDownRefresh();

        console.log(e);
    },

    /*** 生命周期函数--监听页面初次渲染完成 */
    onReady: function() {

    },

    /*** 生命周期函数--监听页面显示 */
    onShow: function() {

    },

    /*** 生命周期函数--监听页面隐藏 */
    onHide: function() {

    },

    /*** 生命周期函数--监听页面卸载 */
    onUnload: function() {

    },

    /*** 页面相关事件处理函数--监听用户下拉动作 */
    onPullDownRefresh: function() {
        this.loadData();
    },

    /*** 页面上拉触底事件的处理函数 */
    onReachBottom: function(e) {
        this.loadData(false);
    },

    /*** 用户点击右上角分享 */
    onShareAppMessage: function() {

    }
});
