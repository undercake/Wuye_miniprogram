// pages/around/around.js
var app = getApp();
Page({

    /**
     * 页面的初始数据
     */
    data: {
        appData: app.globalData,
        selected: 0,
        scrollViewHeight: 200,
        show_List: {},
        lastTime: 0,
        lastSelect: 0,
        isload: false,
        loadfail: 'none',
        location:{}
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        app.getLocation_(this);
    },


    getData: function(data = {}) {
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        data.page = 'around';
        data.get = 'page';
        let that = this;
        app.request(that, app.globalData.baseURI , 'GET', data);
    },

    backData: function(e) {
        console.log(e);
        wx.stopPullDownRefresh();

        if (e == 'null' || typeof(e.data) != 'object') {
            this.setData({
                loadfail: 'block'
            });
            return;
        }

        this.setData({
            selected_data: {},
            isload: true
        });
        wx.hideToast();

        let that = this;
        // let data = [{
        //     'title': '全部',
        //     'contant': []
        // }];
        // e.data.data.forEach(
        //     (em, i) => {
        //         data[0].contant = data[0].contant.concat(em.contant);
        //     }
        // );

        // console.log(e.data.data);
        // data = data.concat(e.data.data);
        // console.log(data);

        this.setData({
            show_List: e.data.data
        });
        // that.setdistance();
        this.datachange();
    },

    /**
     * 生命周期函数--监听页面初次渲染完成
     */
    onReady: function() {
        let maxHeight;
        wx.getSystemInfo({
            success(res) {
                maxHeight = res.windowHeight;
            }
        });
        let height = maxHeight;
        // 然后取出navbar和header的高度
        // 根据文档，先创建一个SelectorQuery对象实例
        let query = wx.createSelectorQuery().in(this);
        // 然后逐个取出navbar和header的节点信息
        // 选择器的语法与jQuery语法相同

        query.select('#map').boundingClientRect();
        query.select('#cont_title').boundingClientRect();

        // 执行上面所指定的请求，结果会按照顺序存放于一个数组中，在callback的第一个参数中返回
        let that = this;
        query.exec((res) => {
            let rate = res[0].height / 300;
            height = maxHeight - res[1].bottom - 20 * rate;
            console.log(res);
            that.setData({
                scrollViewHeight: height
            });
        });


    },

    scrolltolower: function(e) {
        console.log(e);
    },

    changeItem: function(e) {
        let lst = this.data.lastSelect;
        if (this.data.lastTime != 0 && Math.abs(this.data.lastTime - e.timeStamp) < 301) {
            this.setData({
                selected: lst
            });
            return;
        }
        console.log(e);
        if (e.type == 'tap') {
            this.setData({
                selected: e.currentTarget.dataset.idx,
                lst: e.currentTarget.dataset.idx
            });
        } else if (e.type == 'change') {
            this.setData({
                selected: e.detail.current,
                lst: e.detail.current,
                lastTime: e.timeStamp
            });
        }
    },

    datachange: function(e) {
        console.log(e);
        console.log(app.globalData.userLocation);
        this.getData({"longitude":e.longitude,"latitude":e.latitude});
        var mapCtx = wx.createMapContext('map');
        mapCtx.moveToLocation();
    },


    getDistance: function(lat1, lng1, lat2, lng2) {
        lat1 = lat1 || 0;
        lng1 = lng1 || 0;
        lat2 = lat2 || 0;
        lng2 = lng2 || 0;

        var rad1 = lat1 * Math.PI / 180.0;
        var rad2 = lat2 * Math.PI / 180.0;
        var a = rad1 - rad2;
        var b = lng1 * Math.PI / 180.0 - lng2 * Math.PI / 180.0;

        var r = 6378137; //地球半径
        var distance = r * 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(a / 2), 2) + Math.cos(rad1) * Math.cos(rad2) * Math.pow(Math.sin(b / 2), 2)));


        this.setData({
            distence: distance
        });
    },
    setdistance: function() {
        let that = this;
        let data = [];
        app.globalData.UserLocation = {
            'longitude': that.data.local.longitude,
            'latitude': that.data.local.latitude,
            'status': true
        };
        let local = (that.data.local.latitude == 0 && that.data.local.longitude == 0);
        that.data.selected_data.forEach(function(element, index) {
            that.getDistance(that.data.local.latitude, that.data.local.longitude, element.location.latitude, element.location.longitude);
            let long = parseInt(that.data.distence);
            data[index] = element;
            data[index].distance.num = local ? '未知' : (long > 1000 ? (long / 1000).toFixed(1) : long);
            data[index].distance.unit = local ? '距离' : ((long >= 1000) ? 'km' : 'm');
        });
        this.setData({
            show_Data: data,
            selected_data: data
        });
        console.log(that.data.show_Data);
    },

    sortByDistance: function() {},

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
    fresh: function() {
        wx.startPullDownRefresh();
    },

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
});
