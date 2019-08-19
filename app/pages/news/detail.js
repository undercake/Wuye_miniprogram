// pages/news/detail.js
Page({

    /**
     * 页面的初始数据
     */
    data: {
        isload: false,
        loadfail: 'none',
        id: -1,
        children: '',
        json: [{
            "tag": "p",
            "attrs": [],
            "children": [{
                "tag": "span",
                "attrs": [{
                    "name": "style",
                    "value": "font-weight: bold;"
                }],
                "children": ["ger您好好a", {
                    "tag": "span",
                    "attrs": [{
                        "name": "style",
                        "value": "font-style: italic;"
                    }],
                    "children": ["gfd sg", {
                        "tag": "span",
                        "attrs": [{
                            "name": "style",
                            "value": "text-decoration-line: underline;"
                        }],
                        "children": ["hfd"]
                    }, {
                        "tag": "span",
                        "attrs": [{
                            "name": "style",
                            "value": "text-decoration-line: underline line-through;"
                        }],
                        "children": ["s", {
                            "tag": "span",
                            "attrs": [{
                                "name": "style",
                                "value": "color: rgb(139, 170, 74);"
                            }],
                            "children": ["sb"]
                        }]
                    }]
                }]
            }, {
                "tag": "span",
                "attrs": [{
                    "name": "style",
                    "value": "text-decoration-line: underline line-through;"
                }],
                "children": [{
                    "tag": "span",
                    "attrs": [{
                        "name": "style",
                        "value": "background-color: rgb(249, 150, 59);"
                    }],
                    "children": [{
                        "tag": "span",
                        "attrs": [{
                            "name": "style",
                            "value": "font-style: italic;"
                        }],
                        "children": [{
                            "tag": "span",
                            "attrs": [{
                                "name": "style",
                                "value": "color: rgb(139, 170, 74);"
                            }],
                            "children": ["gf"]
                        }, "xb"]
                    }, "fb", {
                        "tag": "span",
                        "attrs": [{
                            "name": "style",
                            "value": "font-size: xx-large;"
                        }],
                        "children": ["hrf"]
                    }]
                }]
            }]
        }, {
            "tag": "p",
            "attrs": [],
            "children": [{
                "tag": "span",
                "attrs": [{
                    "name": "style",
                    "value": "/* text-decoration-line: underline line-through; */"
                }],
                "children": [{
                    "tag": "span",
                    "attrs": [{
                        "name": "style",
                        "value": "background-color: rgb(249, 150, 59);"
                    }],
                    "children": [{
                        "tag": "span",
                        "attrs": [{
                            "name": "style",
                            "value": "font-size: xx-large;"
                        }],
                        "children": ["x"]
                    }, "rf"]
                }, "bx"]
            }, "cbzdcvbcv你好"]
        }]
    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function(options) {
        // try {
        //     if (options.detail <= -1) return;
        //     this.setData({
        //         id: options.detail
        //     });
        //     this.loadData();
        // } catch (e) {
        //     console.log(e);
        // }
        this.startTransData();
    },

    startTransData: function() {
        let t = this.transData(this.data.json);
        this.setData({children:t});
    },

    transData:function(oldData) {
        let type = {
            "view": ["div", "p", "br", "table", "tbody", "tr", "th", "td", "dl", "dd", "dt", "ul", "ol", "li", "pre", "footer", "header", "blockquote"],
            "text": ["span", "b", "strong", "i", "u", "sub", "sup", "a"],
            "image": ["img"],
            "audio": ["sudio"],
            "video": ["video"]
        };

        let newData = [];

        oldData.forEach(
            (e, i) => {
                let [tag, attr, children] = ['', {
                        'src': '',
                        'class': '',
                        'style': '',
                        'href': ''
                    },
                    []
                ];
                if (typeof(e) == 'object') {
                    // console.log(e, i);
                    tag = (type.view.includes(e.tag) ? 'view' : (type.image.includes(e.tag) ? 'image' : 'text'));
                    let tmp;

                    if (typeof(e.attrs) != 'undefined') {
                        tmp = {
                            'src': '',
                            'class': e.tag,
                            'style': '',
                            'href': ''
                        };
                        e.attrs.forEach((em, id) => {
                            // console.log(em, id);
                            attr[em.name] = em.value;
                        });
                        // console.log(tmp,dataTmp);
                    }

                    // console.log(dataTmp,this);

                    // console.log(typeof(e.children));
                    if (['object', 'array'].includes(typeof(e.children))) {
                        children = this.transData(e.children);
                        // console.log(children);
                    }
                } else if (typeof(e) != 'undefined') {
                    tag = 'text';
                    children = e;
                }
                let dataTmp = {
                    'tag': tag,
                    'attr': attr,
                    'children': children,
                    'childrenTypeString': typeof(children) == 'string'
                };
                newData[i] = dataTmp;
                // console.log(newData);
            }
        );
        return newData;
    },

    loadData: function() {
        console.log('loading');
        wx.showToast({
            title: '加载中...',
            icon: 'loading',
            duration: 2000000
        });
        let that = this;
        app.request(that, app.globalData.baseURI + 'index', 'GET', {
            id: that.data.id
        });
    },

    backData: function(e) {

        console.log(e);
        wx.stopPullDownRefresh();

        if (e == 'null' || typeof(e.data) != 'object') {
            wx.hideToast();
            this.setData({
                loadfail: 'block'
            });
            return;
        }
        wx.hideToast();

        let data = e.data;
        this.setData({
            remote_json: data,
            isload: true
        });


        console.log(e);
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
        // this.getData();
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
