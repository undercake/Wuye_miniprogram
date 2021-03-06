//app.js
const rqst = require('utils/request.js');

App({
    globalData: {
        baseURI: 'https://proj.dlz149.me/wuye/',
        isLogin: false,
        loginData: {},
        buttonColor: "#05509d",
        mainThemeColor: '',
        UserLocation: {
            'longitude': 116.403909,
            'latitude': 39.914492,
            'speed': 0,
            'accuracy': 0,
            'altitude': 0,
            'horizontalAccuracy': 0,
            'status': false
        },
    },

    onLaunch: function(e) {
        // console.log(e);
    },

    request: function(page, e, mtd = 'GET', data = {}) {
        let that = this;
        rqst.sendRequest(e, mtd, data).then(v => {
            page.backData(v);
            wx.hideToast();
            // console.log(v);
            try {
                wx.setNavigationBarColor({
                    frontColor: v.data.mainThemeColor.front,
                    backgroundColor: v.data.mainThemeColor.back,
                    animation: {
                        duration: 400,
                        timingFunc: 'easeIn'
                    }
                });
                that.setColor(v.data.mainThemeColor);
            } catch (e) {
                console.log(e);
            }

        }).catch(error => {console.log(error);});

    },

    setColor: function(e) {
        this.globalData.mainThemeColor = e;
    },

    backData: function(e) {
        this.globalData.rtn = e;
        console.log(this.globalData);
    },

    getlocal: function(page) {
        var that = this;
        wx.getLocation({
            type: 'wgs84',
            success(res) {
                page.datachange(res);
                that.globalData.userLocation = {
                    'longitude': res.longitude,
                    'latitude': res.latitude,
                    'speed': res.speed,
                    'accuracy': res.accuracy,
                    'altitude': res.altitude,
                    'horizontalAccuracy': res.horizontalAccuracy,
                    'status': true
                };
                console.log(res);
            },
            fail(){
                page.datachange("fail");
            }
        });
    },

    getLocation_: function(page) {
        let that = this;
        wx.getSetting({
            success(res) {
                if (res.authSetting['scope.userLocation']) {
                    that.getlocal(page);
                } else {
                    wx.authorize({
                        scope: 'scope.userLocation',
                        success: function() {
                            that.getlocal(page);
                        },
                        fail: function() {
                            that.show_notice('无法获取你的位置信息');
                        }
                    });
                }
            },
            fail(res) {
                page.datachange("fail");
            },
        });
    },

    show_notice: function(e) {
        rqst.notice(e);
    },

    UserLogin: function(page) {
        let that = this;
        wx.getSetting({
            success(res) {
                if (res.authSetting['scope.userInfo']) {
                    that.getinfo(page);
                } else {
                    that.show_notice('登录失败');
                    page.datachange('null');
                }
            },
            fail(res) {},
        });
    },
    getinfo: function(page) {
        let that = this;
        wx.login({
            success: (res) => {
                that.globalData.loginData = res;
                if (res.errMsg == "login:ok") {
                    wx.getUserInfo({
                        success: e => {
                            console.log(e);
                            page.datachange(e);
                        },
                        fail: (e) => {
                            that.show_notice('登录失败');
                            page.datachange('null');
                        },
                    });
                } else {
                    that.show_notice('登录失败');
                    page.datachange('null');
                }
            },
            fail: (e) => {
                that.show_notice('登录失败');
                page.datachange('null');
            },
        });
    }
});
