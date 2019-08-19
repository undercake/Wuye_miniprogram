// pages/pay/pay.js
let app = getApp();
Page({

    /**
     * 页面的初始数据
     */
    data: {
        page: 'pay',
        sum: {
            pay: 0,
            checked: false
        },
        ischeck: {},
        payData: {},
        remote_json: {}
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        console.log(options);
        this.getData();
    },


    getData: function(data = {}) {
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        data.page = 'pay';
        data.get = 'page';
        let that = this;
        app.request(that, app.globalData.baseURI, 'GET', data);
    },

    backData: function(e) {

        wx.stopPullDownRefresh();
        console.log(e, typeof(e.data));
        if (e == 'err' || e == 'null' || typeof(e.data) != 'object') {
            this.setData({
                loadfail: 'block'
            });
            return;
        }
        wx.hideToast();

        let data = e.data;
        this.setData({
            payData: data,
            isload: true
        });

        this.checkdata();
        console.log(e);
    },

    hasValue: function(obj, val) {
        let rtn = false;
        obj.forEach(
            (v, a) => {
                console.log(v, a, obj, val);
                if (v == val) {
                    rtn = true;
                }
            }
        );
        return rtn;
    },

    allChange: function(e) {
        su = this.data.sum;
        pay = this.data.payData;
        console.log(pay.list, typeof(pay), pay);
        if (su.checked) {
            su.checked = false;
            su.pay = 0;

            for (let key in pay) {
                pay[key].forEach(
                    (e, i) => {
                        pay[key][i].checked = false;
                    }
                );
            }
        } else {
            su.pay = 0;
            su.checked = true;
            for (let key in pay) {
                pay[key].forEach(
                    (e, i) => {
                        console.log(e, i);
                        su.pay += e.charge * 100;
                        pay[key][i].checked = true;
                    }
                );
                console.log(key);
            }

            su.pay /= 100;

        }
        this.setData({
            sum: su
        });
    },

    checkboxChange: function(e) {
        console.log(e);
        let that = this;
        let values = e.detail.value;
        let tmp = [
            []
        ];
        let s = this.data.sum;
        let pay = this.data.payData;

        values.forEach((obj, idx) => {
            let val = obj.split('_');
            tmp[idx] = val;
        });

        console.log(tmp);

        for (let key in pay) {
            pay[key].forEach(
                (e, i) => {
                    pay[key][i].checked = false;
                }
            );
        }

        s.pay = 0;
        if (values.length > 0) {
            tmp.forEach(
                (e, i) => {
                    pay[e[0]][e[1]].checked = true;
                    s.pay += pay[e[0]][e[1]].charge * 100;
                }
            );
            s.pay /= 100;
        }

        let allcheck = true;
        for (let key in pay) {
            pay[key].forEach(
                (e, i) => {
                    if (!e.checked) {
                        allcheck = false;
                        return false;
                    }
                }
            );
        }

        console.log("ok");

        s.checked = allcheck;

        that.setData({
            sum: s,
            payData: pay
        });

    },

    checkdata: function() {
        let s = this.data.sum;
        let pay = this.data.payData;

        s.pay = 0;
        console.log(pay);
        for (let key in pay) {
            pay[key].forEach(
                e => {
                    if (e.checked) {
                        s.pay += e.charge * 100;
                    }
                }
            );
        }
        s.pay /= 100;
        this.setData({
            sum: s
        });
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
});
