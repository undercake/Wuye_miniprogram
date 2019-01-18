// pages/pay/pay.js
Page({

    /**
     * 页面的初始数据
     */
    data: {
        page: 'pay',
        SumPay: 0,
        ischeck: {},
        checkData: {
            "2018": [{
                    "name": "12\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 12
                },
                {
                    "name": "11\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 11
                },
                {
                    "name": "10\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 10
                },
                {
                    "name": "9\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 9
                },
                {
                    "name": "8\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": true,
                    'chargeId': 8
                },
                {
                    "name": "7\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 7
                },
                {
                    "name": "6\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 6
                },
                {
                    "name": "5\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": true,
                    'chargeId': 5
                },
                {
                    "name": "4\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 4
                },
                {
                    "name": "3\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 3
                },
                {
                    "name": "2\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 2
                },
                {
                    "name": "1\u6708\u8d26\u5355",
                    "charge": 1202.3,
                    "checked": false,
                    'chargeId': 1
                }
            ],
            "2017": [{
                "name": "12\u6708\u8d26\u5355",
                "charge": 1202.3,
                "checked": false,
                'chargeId': 13
            }]
        },

    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        console.log(options);
    },

    hasValue: function(obj, val) {
        let rtn = false
        obj.forEach(
            (v, a) => {
                console.log(v, a, obj, val);
                if (v == val) {
                    rtn = true
                }
            }
        );
        return rtn;
    },

    checkboxChange: function(e) {
        console.log(e);
        let that = this;
        let values = e.detail.value;
        let ValueArr = [];
        let tmp = [];
        values.forEach((obj, idx) => {
            let val = obj.split('_');
            tmp[idx] = val[1];
            ValueArr[val[0]] = tmp;
            console.log(1);
        });
        if (values.length == 0) {
            that.setData({
                SumPay: 0
            })
        } else {

        }
        that.setData({
            ischeck: ValueArr
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
