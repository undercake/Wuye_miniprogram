// pages/account/account.js
var app = getApp();
Page({

    /**
     * 页面的初始数据
     */
    data: {
        isLogin: false,
        loading: false,
        loginFail:false,
        userData:'',
        hd:true
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        if (!this.data.isLogin) {
            app.show_notice('自动登录中...');
            this.bindGetUserInfo();
        }
    },

    bindGetUserInfo: function() {
        app.UserLogin(this);
        this.setData({
            loading: true
        });
    },

    datachange: function(e) {
        wx.hideToast();
        if(e == 'null'){
            this.setData({loading: false,loginFail:true});
            app.show_notice('登录失败');
            return;
        }
        console.log(e);
        this.setData({
            isLogin:true,
            userData: e
        });
        app.show_notice('登录成功');
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
        wx.stopPullDownRefresh();
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
});
