let pubFunc = {
    confirm: function() {
        console.log('success');
    },
    cancel: function() {
        console.log('cancel');
    },
    close: function() {
        console.log('close');
    }
};

function shownotice(obj) {
    $("#bgw,#bgwS").remove();
    let defaultVal = {
        'title': obj.title ? obj.title + '：' : '提示',
        'titleColor': obj.titleColor || '#777',
        'showText': obj.showText || '',
        'textColor': obj.textColor || '#666',
        'icon': obj.icon || 'info',
        'cancel': obj.cancel || false,
        'onConfirm': obj.onConfirm || function() {
            console.log('');
        },
        'onCancel': obj.onCancel || function() {
            console.log('');
        },
        'onClose': obj.onClose || function() {
            console.log('');
        },
    };

    pubFunc.close = defaultVal.onClose;
    pubFunc.cancel = defaultVal.onCancel;
    pubFunc.confirm = defaultVal.onConfirm;

    let classArr = {
        "info": "iconfont icon-info-circle yellow",
        "success": "iconfont icon-check-circle green",
        "fail": "iconfont icon-close-circle red"
    };

    let str = '<div id="bgw" class="NoticeBackgroundWhite fade in"><div id="NoticeBar" class="modal-dialog fade in"><div class="modal-content"><div class="modal-header"><button type="button" class="close iconfont icon-close" z-index="-1"></button><h5 class="modal-title" style="color:' + defaultVal.titleColor + '">' + defaultVal.title + '</h5></div><div class="modal-body clearfix"><div class="col-sm-1 text-center"><span class="' + classArr[defaultVal.icon] + '"></span></div><div class="col-sm-11 breakall"><p class="ng-binding" style="color:' + defaultVal.textColor + '">' + defaultVal.showText + '</p></div></div> <div class="modal-footer"><button fun="confirm" class="btn btn-default">确定</button>' + (defaultVal.cancel ? '<button fun="close" class="btn btn-primary">取消</button>' : '') + '</div></div></div></div><script id="bgwS" type="text/javascript">$("#bgw [fun=cancel]").click(function(){showingNoticeClose();pubFunc.cancel()});$("#bgw [fun=confirm]").click(function(){showingNoticeClose();pubFunc.confirm()});$("#bgw .close").click(close);function showingNoticeClose(){$("#NoticeBar").animate({opacity:0,marginTop:"10px"},120,"linear",function(){$("#bgw,#bgwS").remove();pubFunc.close()})}</script>';

    $('body').append(str);
    // $('#bgw').animate({},100,'linear');
    $('#NoticeBar').animate({
        marginTop: '30px',
        opacity: 1
    }, 120, 'linear');

}

function showModel(e) {
    $("#bgw,#bgwS").remove();

    let def = {
        'title': e.title ? e.title + '：' : '提示',
        'showText': e.showText || '',
        'level': e.level || 'warning',
        'autoclose': e.autoclose || false,
        'onClose': e.onClose || function() {
            console.log('');
        },
    };
    pubFunc.close = def.onClose;

    let str = '<div class="btn btn-' + def.level + '" role="alert" style="position: fixed;top: 0;z-index: 99999;text-align: center;margin: auto;left: 0;width: 100%;cursor: auto;" id="bgw"><strong>' + def.title + '</strong>' + def.showText + '</div><script id="bgwS">$("#bgw").click(function(){closeShowingModel()});function closeShowingModel(){$("#bgw").animate({opacity:0},800,"linear",function(){$("#bgw,#bgwS").remove();pubFunc.close()})};' + (def.autoclose ? ('setTimeout(function(){closeShowingModel()},' + def.autoclose + ');') : '') + '</script>';

    $('body').append(str);
}
