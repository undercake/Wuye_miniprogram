let heartbeatConnect = self.setInterval("heartbeatFunc()", 1400 * 3);
let heartbeatFailConnect;

console.log(typeof(heartbeatConnect));

let heartbeatRequestCount = 0;
let heartbeatRequestFailCount = 0;

function heartbeatFunc() {
    heartbeatRequestCount++;
    console.log(heartbeatRequestCount);
    $.ajax({
        url: heartbeatURL,
        method: 'GET',
        success: function(e) {
            console.log(e);
            if (e == 'logged out') {
                showModel({
                    title: '注意',
                    showText: '您已经离线，请注意保存页面更改，重新登录将不会保存任何内容！',
                    level: 'danger',
                    autoclose: false
                });
                window.clearInterval(heartbeatConnect);
            }
            heartbeatRequestFailCount = 0;
            window.clearInterval(heartbeatFailConnect);
        },
        error: function() {
            heartbeatRequestFailCount++;
            console.log('fail', heartbeatRequestFailCount, heartbeatRequestCount);
            if (heartbeatRequestFailCount >= 10) {
                window.clearInterval(heartbeatFailConnect);
                showModel({
                    title: '提示',
                    showText: '您网络不畅，请您注意检查',
                    level: 'warning',
                    autoclose: false
                });
                return;
            }
            heartbeatFailConnect = self.setInterval("heartbeatFunc()", 10000);
        }
    });
    if (heartbeatRequestCount > 20) {
        window.clearInterval(heartbeatConnect);
    }
}
