// 引入Promise
var Promise = require('./promise.js');
//获取服务器地址


//默认请求
function sendRequest(url, mtd, params = {}) {

    let promisevariable = new Promise(function(resolve, reject) {
        let getcookie = wx.getStorageSync('cookie')
        let cookie = getcookie == '' ? {} : {
            'Cookie': getcookie.name + '=' + getcookie.value
        };

        try {
            wx.request({
                url: url,
                data: params,
                method: mtd,
                header: cookie,
                success: function(result) {
                    var status = result.statusCode;
                    if (status == 200) {
                        try {
                            if (!(typeof(result.cookies[0]) == 'undefined')) {
                                wx.setStorage({
                                    key: 'cookie',
                                    data: {
                                        'name': result.cookies[0].name,
                                        'value': result.cookies[0].value
                                    }
                                })
                            }
                        } catch (e) {
                            console.log(e);
                        }

                        resolve(result);
                        return;
                    } else {
                        var sta = result.statusCode;
                        resolve('null');
                        wx.showToast({
                            title: '网络错误:页面数据请求失败:status:' + sta,
                            icon: 'none',
                            duration: 4100
                        });
                        return;
                    }

                    resolve(result);
                },
                fail: (res) => {
                    var sta = res.errMsg;
                    resolve('null');
                    wx.showToast({
                        title: '网络错误:页面数据请求失败:' + sta,
                        icon: 'none',
                        duration: 4100
                    });
                    return;
                }
            });

        } catch (e) {
            console.log(e);
            wx.showToast({
                title: '网络错误:页面数据请求失败:' + sta,
                icon: 'none',
                duration: 4100
            });
            resolve('null');
        }

    });
    return promisevariable;
}



//暴露公共访问接口
module.exports = {
    sendRequest: sendRequest, //公布公共请求接口
}
