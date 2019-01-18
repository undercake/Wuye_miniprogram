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
        show_List: [{
                'title': '全部',
                'contant': [{
                        'price': 200,
                        'type':0,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                ]
            },
            {
                'title': '酒店',
                'type':1,
                'contant': [{
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                ]
            },
            {
                'title': '美食',
                'type':2,
                'contant': [{
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                ]
            },
            {
                'title': '娱乐',
                'type':3,
                'contant': [{
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                ]
            },
            {
                'title': '服务',
                'type':4,
                'contant': [{
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                    {
                        'price': 200,
                        'pic': 'http://192.168.31.158:8888/miniapp/wuye/1.png',
                        'title': '某酒店',
                        'id':0,
                        'position': {
                            'longitude': 0,
                            'latitude': 0,
                            'distance': 0
                        },
                    },
                ]
            },
        ],
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        app.getLocation_(this);

    },

    /**
     * 生命周期函数--监听页面初次渲染完成
     */
    onReady: function() {
        let maxHeight
        wx.getSystemInfo({
            success(res) {
                maxHeight = res.windowHeight
                // console.log(res.model)
                // console.log(res.pixelRatio)
                // console.log(res.windowWidth)
                // console.log(res.language)
                // console.log(res.version)
                // console.log(res.platform)
            }
        })
        let height = maxHeight;
        // 然后取出navbar和header的高度
        // 根据文档，先创建一个SelectorQuery对象实例
        let query = wx.createSelectorQuery().in(this);
        // 然后逐个取出navbar和header的节点信息
        // 选择器的语法与jQuery语法相同

        query.select('#map').boundingClientRect();
        query.select('#cont_title').boundingClientRect();

        // 执行上面所指定的请求，结果会按照顺序存放于一个数组中，在callback的第一个参数中返回
        let that = this
        query.exec((res) => {
            let rate = res[0].height / 400
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
        console.log(e);
        if (e.type == 'tap') {
            this.setData({
                selected: e.currentTarget.dataset.idx
            });
        } else if (e.type == 'change') {
            this.setData({
                selected: e.detail.current
            });
        }
    },

    datachange: function() {
        var mapCtx = wx.createMapContext('map');
        mapCtx.moveToLocation();
        // console.log(getApp());
        // let a = getApp();
        // let that = this
        // console.log(a);
        // setTimeout(()=>that.setData({appData:a.globalData}),3000);
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
