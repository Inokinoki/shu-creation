function user_center(key, extra, page) {
    document.getElementById("wait-alert").hidden = false;
    $('#wait-modal').modal('show');
    $.post("./api/usercenter.php",
            {
                mode    :   key,
                extra   :   extra,
                page    :   page
            }, onUsercenterReceive );
}

function usercenter_close(){
    document.getElementById("wait-alert").hidden = true;
}

function onUsercenterReceive(data, status){
    if(status){
        document.getElementById("main-container").innerHTML = data;
    } else {
        alert("网络错误，请稍后重试。");
    }
    document.getElementById("wait-alert").hidden = true;
    $('#wait-modal').modal('hide')
}

function requestAccess(request_id){
    document.getElementById("wait-alert").hidden = false;
    $.post("./api/member.php?source=1",
            {
                request_id : request_id
            }, onRequestReceive );
}

function onRequestReceive(data, status){
    if (status){
        result = data;
        if (result == "0"){
            alert("已加入预备社员名单");
        } else if (result == "1"){
            alert("您的权限不足");
        } else if (result == "2"){
            alert("此成员已在社员列表中");
        }
    } else {
        alert("网络错误，请稍后重试。");
    }
    document.getElementById("wait-alert").hidden = true;
    user_center('user_request',0,1);
}

function requestRefuse(request_id){
    document.getElementById("wait-alert").hidden = false;
    $.post("./api/refuse_request.php",
            {
                request_id : request_id
            }, onRefuseReceive );
}

function onRefuseReceive(data, status){
    if (status){
        result = data;
        if (result == "0"){
            alert("已拒绝");
        } else if (result == "1"){
            alert("您的权限不足");
        } else if (result == "2"){
            alert("未知的申请编号");
        }
    } else {
        alert("网络错误，请稍后重试。");
    }
    document.getElementById("wait-alert").hidden = true;
    user_center('user_request',0,1);
}