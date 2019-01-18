// var cityData = require('../../utils/city.js');
//，,
var app = getApp();
Page({
    data: {
        appData: app,
        qyopen: false,
        content_open: false,
        isfull: false,
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
        fullData: {
            'commit': {
                "location": {
                    'province': '所在省',
                    'city': '所在市',
                    'area': "所在区",
                    'other': '具体地址',
                    'latitude': '经度',
                    'longitude': '纬度'
                },
                'pic': '首图地址',
                "squre": '租住面积',
                "room_account": '房间数',
                "rent_type": '租住类型0合租1整租',
                "price": '价格',
                "room_type": '租房类型:0主卧1次卧',
                "unit": '单位：0元每天1元每月2元每季度3元每年',
                'title': '租贴标题'
            },
            'cont': [{
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "和平区",
                        'other': '风华里小区',
                        'longitude': 117.157732,
                        'latitude': 39.098774
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 30,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 2280,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "和平区",
                        'other': '风华里小区',
                        'longitude': 117.159456,
                        'latitude': 39.086775
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 40,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 4280,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "和平区",
                        'other': '风华里小区',
                        'longitude': 117.322527,
                        'latitude': 39.401202
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 14,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 1177,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "和平区",
                        'other': '风华里小区',
                        'longitude': 117.10432632,
                        'latitude': 39.31222
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 25,
                    "room_account": 4,
                    "rent_type": 0,
                    "price": 1090,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "和平区",
                        'other': '风华里小区',
                        'longitude': 117.2013223,
                        'latitude': 39.1019313
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 32,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 990,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河东区",
                        'other': '风华里小区',
                        'longitude': 117.1320432,
                        'latitude': 39.3122
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 13,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 2300,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河东区",
                        'other': '风华里小区',
                        'longitude': 117.2132123,
                        'latitude': 39.10110123
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 65,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 3120,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河东区",
                        'other': '风华里小区',
                        'longitude': 117.104232332,
                        'latitude': 39.31022
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 34,
                    "room_account": 5,
                    "rent_type": 0,
                    "price": 1180,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河东区",
                        'other': '风华里小区',
                        'longitude': 117.13219723,
                        'latitude': 39.1212313
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 43,
                    "room_account": 4,
                    "rent_type": 0,
                    "price": 230,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河西区",
                        'other': '12里小区',
                        'longitude': 117.3212527,
                        'latitude': 39.432322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 32,
                    "room_account": 1,
                    "rent_type": 1,
                    "price": 2205,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河西区",
                        'other': '12里小区',
                        'longitude': 117.10462332,
                        'latitude': 39.3112232
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 23,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 980,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河西区",
                        'other': '12里小区',
                        'longitude': 117.2129723,
                        'latitude': 39.01213
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 31,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 1220,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': ' 青春汇 - 青春汇中北镇店1组'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河西区",
                        'other': '12里小区',
                        'longitude': 117.153227,
                        'latitude': 39.0123320123
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 13,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 2240,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河西区",
                        'other': '12里小区',
                        'longitude': 117.104612332,
                        'latitude': 39.301232
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 54,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 1200,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '风小区',
                        'longitude': 117.211329723,
                        'latitude': 39.1322313
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 45,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 1400,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '青春汇 - 青春汇中北镇店1组'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '风小区',
                        'longitude': 117.3322527,
                        'latitude': 39.4212322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 50,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 1250,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '风小区',
                        'longitude': 117.1032322332,
                        'latitude': 39.12322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 65,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 2380,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '青春汇 - 青春汇中北镇店1组'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '风小区',
                        'longitude': 117.2119723,
                        'latitude': 39.11213
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 56,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 1280,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': ' 临近曹庄地铁站，超市，生活交通便利，无中J费'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '风小区',
                        'longitude': 117.1232527,
                        'latitude': 39.4301232
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 43,
                    "room_account": 1,
                    "rent_type": 1,
                    "price": 4480,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '紫梧桐公寓 - 紫梧桐公寓和平店1组'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '里小区',
                        'longitude': 117.1046233232,
                        'latitude': 39.123122
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 43,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 2280,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '紫梧桐公寓 - 紫梧桐公寓和平店1组'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "南开区",
                        'other': '里小区',
                        'longitude': 117.211219723,
                        'latitude': 39.0123213
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 32,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 4380,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 2,
                    'title': '治国里 中心北路菜市场楼上 卧室出租 可短租 出行 购物方便'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河北区",
                        'other': '里小区',
                        'longitude': 117.3252327,
                        'latitude': 39.012322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 21,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 6320,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 2,
                    'title': '急租芳馨园  紧邻地铁 没有中J费 押一付一 家具家电全新'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河北区",
                        'other': '里小区',
                        'longitude': 117.1032462332,
                        'latitude': 39.312322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 23,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 3340,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 3,
                    'title': '急租芳馨园  紧邻地铁 没有中J费 押一付一 家具家电全新'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河北区",
                        'other': '里小区',
                        'longitude': 117.211973223,
                        'latitude': 39.1212313
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 34,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 3230,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 3,
                    'title': '学府花园 南开 欧式装修干净卫生 24h宽带 随时带看'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "河北区",
                        'other': '华小区',
                        'longitude': 117.3232527,
                        'latitude': 39.03301232
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 45,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 660,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 2,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "红桥区",
                        'other': '华小区',
                        'longitude': 117.1046232332,
                        'latitude': 39013122
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 56,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 1230,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 3,
                    'title': '学府花园 南开 欧式装修干净卫生 24h宽带 随时带看'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "红桥区",
                        'other': '华小区',
                        'longitude': 117.213219723,
                        'latitude': 39.11233
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 67,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 3210,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "红桥区",
                        'other': '华小区',
                        'longitude': 117.3253227,
                        'latitude': 39.4012
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 76,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 4320,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '3号线 华苑 大阳台 阳面 精装 龤中介 全包 直租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "红桥区",
                        'other': '华小区',
                        'longitude': 117.1046322332,
                        'latitude': 39.122322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 65,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 2340,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '急租芳馨园  紧邻地铁 没有中J费 押一付一 家具家电全新'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '98小区',
                        'longitude': 117.21197232323,
                        'latitude': 39.2112313
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 64,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 1530,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '学府花园 南开 欧式装修干净卫生 24h宽带 随时带看'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '98小区',
                        'longitude': 117.325297327,
                        'latitude': 39.1232322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 46,
                    "room_account": 2,
                    "rent_type": 1,
                    "price": 5420,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '鸿正绿色家园 杭州道 包物业 包采暖 随时看房 可月付 短租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '932小区',
                        'longitude': 117.33225627,
                        'latitude': 39.4012322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 53,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 2280,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 1,
                    'title': '3号线 鸿正绿色家园 杭州道 包物业 包采暖 随时看房 可月付 短租'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '932小区',
                        'longitude': 117.10463232,
                        'latitude': 39.3101232
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 35,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 1180,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 1,
                    "unit": 1,
                    'title': '急租芳馨园  紧邻地铁 没有中J费 押一付一 家具家电全新'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '932小区',
                        'longitude': 117.2113223,
                        'latitude': 39.1012313
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 42,
                    "room_account": 2,
                    "rent_type": 0,
                    "price": 100,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 0,
                    'title': '急租芳馨园  紧邻地铁 没有中J费 押一付一 家具家电全新'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '32华里小区',
                        'longitude': 117.1032432,
                        'latitude': 39.3012322
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 24,
                    "room_account": 1,
                    "rent_type": 0,
                    "price": 108,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 0,
                    'title': '急租芳馨园  紧邻地铁 没有中J费 押一付一 家具家电全新'
                },
                {
                    "location": {
                        'province': '天津市',
                        'city': '天津市',
                        'area': "塘沽区",
                        'other': '32华里小区',
                        'longitude': 117.2321123,
                        'latitude': 39.1201233
                    },
                    'pic': 'http://127.0.0.1:8888/miniapp/wuye/1.png',
                    "squre": 31,
                    "room_account": 3,
                    "rent_type": 0,
                    "price": 122,
                    'distance': {
                        'num': 0,
                        'unit': 'm'
                    },
                    "room_type": 0,
                    "unit": 0,
                    'title': '城市之光 福地广场附近 精装主卧 包物业无线取暖 随时看房'
                }
            ]
        },
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
        })
        let that = this;
        this.setData({
            selected_data: that.data.fullData.cont
        })

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
                                    })
                                }
                            });
                        }
                    })
                }
            },
            fail(res) {},
        });
    },
    showList: function(e) {
        let idx = typeof(e) == 'object' ? e.currentTarget.dataset.nav : e;
        let that = this;
        let correct = (that.data.shownavindex == idx);
        console.log(correct, idx, e, typeof(e), typeof(e) == 'object')
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
    _blur: function() {
        this.showList(0)
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
        }
        let local = (that.data.local.latitude == 0 && that.data.local.longitude == 0);
        that.data.selected_data.forEach(function(element, index) {
            that.getDistance(that.data.local.latitude, that.data.local.longitude, element.location.latitude, element.location.longitude);
            let long = parseInt(that.data.distence);
            console.log(long);
            data[index] = element;
            data[index].distance.num = local ? '未知' : (long > 1000 ? (long / 1000).toFixed(1) : long);
            data[index].distance.unit = local ? '距离' : ((long >= 1000) ? 'km' : 'm');
        });
        this.setData({
            show_Data: data,
            selected_data: data
        })
        console.log(that.data.show_Data);
    },
    searchBox: function(e) {
        console.log(e.detail.value)
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
        var tmp = this.data.sort_type
        tmp.sort_type = idx,
            this.setData({
                sort_type: tmp
            });
        tmp = this.data.sort_type
        tmp.sort_type = coun
        this.setData({
            sort_type: tmp
        });
        this.showList(0);
        if (e != 0) {
            this.Esort(coun);
        }
    },
    selectLocation: function(e) {
        console.log(this)
        let that = this;
        Math.pow()
        switch (e.currentTarget.dataset.tpy) {

            case 'sort_type':
                var tmp = this.data.sort_type
                tmp.current = e.currentTarget.dataset.idx
                this.setData({
                    sort_type: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun, 1);
                break;
            case 'rent_type':
                var tmp = this.data.rent_type
                console.log(tmp)
                tmp.current = e.currentTarget.dataset.idx
                console.log(tmp)
                this.setData({
                    rent_type: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun);
                break;
            case 'price':
                var tmp = this.data.price
                tmp.current = e.currentTarget.dataset.idx
                this.setData({
                    price: tmp
                });
                this.setE(e.currentTarget.dataset.idx, e.currentTarget.dataset.coun);
                break;
            case 'room_count':
                var tmp = this.data.room_count
                tmp.current = e.currentTarget.dataset.idx
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
                })
                console.log(res);
            },
            complete() {
                that.setdistance();
                wx.hideToast();
            }
        })

    }
})
