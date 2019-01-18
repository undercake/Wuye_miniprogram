//app.js
App({
    onLaunch: function() {

    },
    globalData: {
        baseURI: 'http://192.168.31.158:8888/miniapp/wuye/',
        isLogin: false,
        loginData:{},
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
    getlocal: function(page) {
        var that = this;
        wx.getLocation({
            type: 'wgs84',
            success(res) {
                that.globalData.userLocation = {
                    'longitude': res.longitude,
                    'latitude': res.latitude,
                    'speed': res.speed,
                    'accuracy': res.accuracy,
                    'altitude': res.altitude,
                    'horizontalAccuracy': res.horizontalAccuracy,
                    'status': true
                }
                console.log(res);
            },
            complete() {
                that.pushData(page);
            }
        })
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
                            wx.showModal({
                                title: '获取地理位置',
                                content: '无法获取你的位置信息',
                                showCancel: false,
                                success() {}
                            });
                        }
                    })
                }
            },
            fail(res) {console.log(res);},
        });
    },

    show_notice: function(e){
        wx.showModal({
            title:'提示',
            content:e,
            showCancel:false
        });
    },

    UserLogin:function(page){
        let that = this;
        wx.getSetting({
            success (res){
                if (res.authSetting['scope.userInfo']) {
                    that.getinfo(page);
                }else{
                    wx.showModal({
                        title:'提示',
                        content:'登录失败',
                        showCancel:false,
                        success(){
                            if (res.confirm) {
                                that.getinfo(page);
                            }
                        }
                    });
                }
            },
            fail(res){
            },
        });
    },
    pushData:function(page){
        console.time();
        setTimeout(function () {page.datachange();console.timeEnd();}, 300);
    },
    getinfo: function(page){
       let that = this;
        wx.login({
            success: (res) => {
                that.globalData.loginData = res;
                if (res.errMsg == "login:ok") {
                    wx.getUserInfo({
                        success:e => {
                            that.globalData.loginData = e;
                            that.globalData.isLogin = true;
                            console.log(e);
                            that.pushData(page);
                        },
                        fail:(e)=>{that.show_notice('登录失败')},
                    });
                }else {
                    that.show_notice('登录失败');
                }
            },

            fail: (e) => that.show_notice('登录失败'),
            }
        )
    }
})
