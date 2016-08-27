function user_center(key) {
    document.getElementById("wait-alert").hidden = false;
    $('#wait-modal').modal('show');
    $.post("./api/usercenter.php",
            {
                mode : key
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