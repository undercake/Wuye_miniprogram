// var cityData = require('../../utils/city.js');
//，,
var app = getApp();
Page({
    data: {
        appData: app,
        qyopen: false,
        content_open: false,
        isfull: false,
        loadfail: 'none',
        location: "地区",
        sort_type: {
            'current': "排序",
            'selected': 0,
            'all': {
                '离我最近': 0,
                '价格从低到高': 1,
                '价格从高到低': 2
            }
        },
        rent_type: {
            'current': "整租",
            'selected': 0,
            'all': {
                '合租': 0,
                '整租': 1,
                '不限': 2
            }
        },
        price: {
            'current': "价格",
            'all': {
                '1000以下': 0,
                '1000-2000': 1,
                '2000-3000': 2,
                '3000-4000': 3,
                '4000+': 4
            }
        },
        room_count: {
            'current': "一居室",
            'selected': 1,
            'all': {
                '二居室': 2,
                '三居室': 3,
                '四居室及以上': 4
            }
        },
        selec_type: '',
        local: {
            'latitude': 0,
            'longitude': 0,
            'res': {}
        },
        fullData: {},
        selected_data: {},
        show_Data: {},
        content: [],
        cityleft: {
            "天津市": {
                "天津市": {
                    "和平区": 0,
                    "河东区": 1,
                    "河西区": 2,
                    "南开区": 3,
                    "河北区": 4,
                    "红桥区": 5,
                    "塘沽区": 6
                }
            }
        },
        citycenter: {},
        cityright: {},
        select1: '',
        select2: '',
        shownavindex: 0,
        distence: 0
    },
    onLoad: function() {
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });

        let that = this;

        this.getAuth();
    },

    getData: function(data = {}) {
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        let that = this;
        app.request(that, app.globalData.baseURI + 'rent', 'GET', data);
    },

    backData: function(e) {

        if (e == 'null') {
            this.setData({
                isload: false
            });
            wx.hideToast();
            return;
        }

        this.setData({
            selected_data: {}
        });

        let that = this;
        let data = e.data;
        console.log(data);

        this.setData({
            fullData: e.data
        });
        wx.hideToast();
        this.setData({
            selected_data: that.data.fullData.cont
        });

        that.setdistance();
        wx.stopPullDownRefresh();
    },

    _blur: function() {
        this.showList(0);
    },

    getAuth: function() {
        let that = this;
        wx.getSetting({
            success(res) {
                if (res.authSetting['scope.userLocation']) {
                    that.getlocal();
                } else {
                    wx.authorize({
                        scope: 'scope.userLocation',
                        success: function() {
                            that.getlocal();
                        },
                        fail: function() {
                            wx.hideToast();
                            wx.showModal({
                                title: '获取地理位置',
                                content: '需要获取位置信息才能计算房源位置！',
                                showCancel: false,
                                success() {
                                    that.setData({
                                        selected_data: that.data.selected_data
                                    });
                                }
                            });
                        }
                    });
                }
            },
            fail(res) {},
        });
    },

    showList: function(e) {
        let idx = typeof(e) == 'object' ? e.currentTarget.dataset.nav : e;
        let that = this;
        let correct = (that.data.shownavindex == idx);
        console.log(correct, idx, e, typeof(e), typeof(e) == 'object');
        this.setData({
            qyopen: (idx == 5 && !that.data.qyopen && !correct) ? true : false,
            content_open: (correct || idx == 0 || idx == 5 || idx >= 10) ? false : true,
            isfull: (idx == 0 || correct) ? false : true,
            shownavindex: correct ? 0 : idx
        });
        switch (idx) {
            case '1':
            case 1:
                that.setData({
                    content: that.data.rent_type.all,
                    selec_type: 'rent_type'
                });
                break;
            case '2':
            case 2:
                that.setData({
                    content: that.data.sort_type.all,
                    selec_type: 'sort_type'
                });
                break;
            case '3':
            case 3:
                that.setData({
                    content: that.data.price.all,
                    selec_type: 'price'
                });
                break;
            case '4':
            case 4:
                that.setData({
                    content: that.data.room_count.all,
                    selec_type: 'room_count'
                });
                break;
            default:
                that.setData({
                    content: [],
                    selec_type: ''
                });
        }

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
    searchBox: function(e) {
        console.log(e.detail.value);
    },
    Esort: function(e) {
        console.log(e);
        /*
        var that = this;
        console.time('改进后冒泡排序耗时');
        var arr = that.data.selected_data;
        var i = arr.length - 1;  //初始时,最后位置保持不变
        while ( i > 0) {
            var pos = 0; //每趟开始时,无记录交换
            for (var j = 0; j < i; j++)
                if (arr[j]. > arr[j + 1]) {
                    pos = j; //记录交换的位置
                    var tmp = arr[j];
                    arr[j] = arr[j + 1];
                    arr[j + 1 ]=tmp;
                }
            i = pos; //为下一趟排序作准备
         }
         console.timeEnd('改进后冒泡排序耗时');
         return arr;
         */
    },
    setE: function(idx, coun, e = 0) {
        var tmp = this.data.sort_type;
        tmp.sort_type = idx;
            this.setData({
                sort_type: tmp,
            });
        tmp = this.data.sort_type;
        tmp.sort_type = coun;
        this.setData({
            sort_type: tmp
        });
        this.showList(0);
        if (e != 0) {
            this.Esort(coun);
        }
    },
    selectLocation: function(e) {
        console.log(this);
        let that = this;
        let tmp;
        switch (e.currentTarget.dataset.tpy) {

            case 'sort_type':
                tmp = this.data.sort_type;
                tmp.current = e.currentTarget.dataset.idx;
                this.setData({
                    sort_type: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun, 1);
                break;
            case 'rent_type':
                tmp = this.data.rent_type;
                console.log(tmp);
                tmp.current = e.currentTarget.dataset.idx;
                console.log(tmp);
                this.setData({
                    rent_type: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun);
                break;
            case 'price':
                tmp = this.data.price;
                tmp.current = e.currentTarget.dataset.idx;
                this.setData({
                    price: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun);
                break;
            case 'room_count':
                tmp = this.data.room_count;
                tmp.current = e.currentTarget.dataset.idx;
                this.setData({
                    room_count: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun);
                break;
            case 'left':
                this.setData({
                    cityright: {},
                    citycenter: that.data.cityleft[e.currentTarget.dataset.city],
                    select1: e.target.dataset.city,
                    select2: ''
                });
                break;
            case 'center':
                this.setData({
                    cityright: that.data.citycenter[e.currentTarget.dataset.city],
                    select2: e.target.dataset.city
                });
                break;
            case 'right':
                this.setData({
                    location: e.currentTarget.dataset.city
                });
                this.showList(0);
                break;
        }

    },
    getlocal: function() {
        var that = this;

        wx.getLocation({
            type: 'wgs84',
            success(res) {
                that.setData({
                    local: res
                });
            },
            complete() {
                wx.hideToast();
                that.getData();
            }
        });

    },

    goTop: function(e) {
        this.setData({
            scrollTop: 0
        });
    },
    onPullDownRefresh: function() {
        this.getData();
    },
});
