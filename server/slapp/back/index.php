<!DOCTYPE html>
<html><?php 
include_once 'inc.php';
if ((!isset($_SESSION['login'])) || trim($_SESSION['login']) == '' || $_SESSION['login'] == null) {
  $_SESSION['login'] = 0;
}
if ($_SESSION['login'] == 1) {
  header('Location:redpack.php');
}
?>
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="css/normalize.css">

    <style type="text/css">
    .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
    .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
    .btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
    .btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
    .btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
    .btn-primary.active { color: rgba(255, 255, 255, 0.75); }
    .btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
    .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
    .btn-block { width: 100%; display:block; }

    * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

    html { width: 100%; height:100%; overflow:hidden; }

    body { 
       width: 100%;
       height:100%;
       font-family: 'Open Sans', sans-serif;
       background: #092756;
       background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
       background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
       background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
       background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
       background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
       filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
   }
   .login { 
       position: absolute;
       top: 50%;
       left: 50%;
       margin: -150px 0 0 -150px;
       width:300px;
       height:300px;
   }
   .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

   input { 
       width: 100%; 
       margin-bottom: 10px; 
       background: rgba(0,0,0,0.3);
       border: none;
       outline: none;
       padding: 10px;
       font-size: 13px;
       color: #fff;
       text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
       border: 1px solid rgba(0,0,0,0.3);
       border-radius: 4px;
       box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
       -webkit-transition: box-shadow .5s ease;
       -moz-transition: box-shadow .5s ease;
       -o-transition: box-shadow .5s ease;
       -ms-transition: box-shadow .5s ease;
       transition: box-shadow .5s ease;
   }
   input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

</style>


<script src="js/prefixfree.min.js"></script><style type="text/css" abt="234"></style>


<script>//remove 17173 video ad
doAdblock();
function doAdblock(){
    (function() {
        function A() {}
        A.prototype = {
            rules: {
                '17173_in':{
                    'find':/\/\/f\.v\.17173cdn\.com\/(\d+\/)?flash\/PreloaderFile(Customer)?\.swf/,
                    'replace':"//swf.adtchrome.com/17173_in_20150522.swf"
                },
                '17173_out':{
                    'find':/\/\/f\.v\.17173cdn\.com\/(\d+\/)?flash\/PreloaderFileFirstpage\.swf/,
                    'replace':"//swf.adtchrome.com/17173_out_20150522.swf"
                },
                '17173_live':{
                    'find':/\/\/f\.v\.17173cdn\.com\/(\d+\/)?flash\/Player_stream(_firstpage)?\.swf/,
                    'replace':"//swf.adtchrome.com/17173_stream_20150522.swf"
                },
                '17173_live_out':{
                    'find':/\/\/f\.v\.17173cdn\.com\/(\d+\/)?flash\/Player_stream_(custom)?Out\.swf/,
                    'replace':"//swf.adtchrome.com/17173.out.Live.swf"
                }
            },
            _done: null,
            get done() {
                if(!this._done) {
                    this._done = new Array();
                }
                return this._done;
            },
            addAnimations: function() {
                var style = document.createElement('style');
                style.type = 'text/css';
                style.innerHTML = 'object,embed{\
                    -webkit-animation-duration:.001s;-webkit-animation-name:playerInserted;\
                    -ms-animation-duration:.001s;-ms-animation-name:playerInserted;\
                    -o-animation-duration:.001s;-o-animation-name:playerInserted;\
                    animation-duration:.001s;animation-name:playerInserted;}\
                    @-webkit-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}\
                    @-ms-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}\
                    @-o-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}\
                    @keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}';
                    document.getElementsByTagName('head')[0].appendChild(style);
                },
                animationsHandler: function(e) {
                    if(e.animationName === 'playerInserted') {
                        this.replace(e.target);
                    }
                },
                replace: function(elem) {
                    if(this.done.indexOf(elem) != -1) return;
                    this.done.push(elem);
                    var player = elem.data || elem.src;
                    if(!player) return;
                    var i, find, replace = false;
                    for(i in this.rules) {
                        find = this.rules[i]['find'];
                        if(find.test(player)) {
                            replace = this.rules[i]['replace'];
                            if('function' === typeof this.rules[i]['preHandle']) {
                                this.rules[i]['preHandle'].bind(this, elem, find, replace, player)();
                            }else{
                                this.reallyReplace.bind(this, elem, find, replace)();
                            }
                            break;
                        }
                    }
                },
                reallyReplace: function(elem, find, replace) {
                    elem.data && (elem.data = elem.data.replace(find, replace)) || elem.src && ((elem.src = elem.src.replace(find, replace)) && (elem.style.display = 'block'));
                    var b = elem.querySelector("param[name='movie']");
                    this.reloadPlugin(elem);
                },
                reloadPlugin: function(elem) {
                    var nextSibling = elem.nextSibling;
                    var parentNode = elem.parentNode;
                    parentNode.removeChild(elem);
                    var newElem = elem.cloneNode(true);
                    this.done.push(newElem);
                    if(nextSibling) {
                        parentNode.insertBefore(newElem, nextSibling);
                    } else {
                        parentNode.appendChild(newElem);
                    }
                },
                init: function() {
                    var handler = this.animationsHandler.bind(this);
                    document.body.addEventListener('webkitAnimationStart', handler, false);
                    document.body.addEventListener('msAnimationStart', handler, false);
                    document.body.addEventListener('oAnimationStart', handler, false);
                    document.body.addEventListener('animationstart', handler, false);
                    this.addAnimations();
                }
            };
            new A().init();
        })();
    }
//remove baidu search ad
if(document.URL.indexOf('www.baidu.com') >= 0){
    if(document && document.getElementsByTagName && document.getElementById && document.body){
        var aa = function(){
            var all = document.body.querySelectorAll("#content_left div,#content_left table");
            for(var i = 0; i < all.length; i++){
                if(/display:\s?(table|block)\s!important/.test(all[i].getAttribute("style"))){all[i].style.display= "none";all[i].style.visibility='hidden';}
            }
            all = document.body.querySelectorAll('.result.c-container[id="1"]');
            //if(all.length == 1) return;
            for(var i = 0; i < all.length; i++){
                if(all[i].innerHTML && all[i].innerHTML.indexOf('广告')>-1){
                    all[i].style.display= "none";all[i].style.visibility='hidden';
                }
            }
        }
        aa();
        document.getElementById('wrapper_wrapper').addEventListener('DOMSubtreeModified',aa)
    };
}
//remove sohu video ad
if (document.URL.indexOf("tv.sohu.com") >= 0){
    if (document.cookie.indexOf("fee_status=true")==-1){document.cookie='fee_status=true'};
}
//remove 56.com video ad
if (document.URL.indexOf("56.com") >= 0){
    if (document.cookie.indexOf("fee_status=true")==-1){document.cookie='fee_status=true'};
}
//fore iqiyi enable html5 player function
if (document.URL.indexOf("iqiyi.com") >= 0){
    if (document.cookie.indexOf("player_forcedType=h5_VOD")==-1){
        document.cookie='player_forcedType=h5_VOD'
        if(localStorage.reloadTime && Date.now() - parseInt(localStorage.reloadTime)<60000){
            console.log('no reload')
        }else{
            location.reload()
            localStorage.reloadTime = Date.now();
        }
    }
}
</script><style type="text/css">object,embed{                -webkit-animation-duration:.001s;-webkit-animation-name:playerInserted;                -ms-animation-duration:.001s;-ms-animation-name:playerInserted;                -o-animation-duration:.001s;-o-animation-name:playerInserted;                animation-duration:.001s;animation-name:playerInserted;}                @-webkit-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @-ms-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @-o-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}</style></head>

<body>

    <div class="login">
       <h1>苏连智能网络后台管理登录</h1>
       <form method="post" action="check.php">
          <input type="text" name="u" placeholder="用户名" required="required">
          <input type="password" name="p" placeholder="密码" required="required">
          <button type="submit" class="btn btn-primary btn-block btn-large">登录</button>
      </form>
  </div>





</body></html>
