function login(){
    document.getElementById("input-wrong-password").innerHTML = "";
    var username = getUsername("input-username");
    var password = getPassword("input-password");
    $.post("./api/login.php",
        {
            username : username,
            password : password
        }, onLoginReceive );
}

function activiate(){
    document.getElementById("activiate-wrong-password").innerHTML = 
        "<div class='alert alert-info' role='alert'>正在激活，请稍后...</div>";
    var username = document.getElementById("activiate-username").value;
    var password = document.getElementById("activiate-password").value;
    var nickname = document.getElementById("activiate-nickname").value;
    var name     = document.getElementById("activiate-name").value;
    console.info(username+" "+password);
    $.post("./api/activiate.php",
        {
            username : username,
            password : password,
            nickname : nickname,
            name     : name
        }, onActiviateReceive );
}

function getUsername(id){
    var e_username = document.getElementById(id);
    return e_username.value;
}

function getPassword(id){
    var e_password = document.getElementById(id);
    var encrypted = hex_md5(e_password.value);
    e_password.value = encrypted;
    return e_password.value;
}

function cleanPassword(){
    var e_password = document.getElementById("input-password");
    e_password.value = "";
}

function onLoginReceive(data, status){
    if (status){
        result = data.split("|");
        if (result[0] == "0"){
            document.cookie = "creation_uuid = " + result[1]; 
            window.location.reload();
        } else if (result[0] == "1"){
            document.getElementById("input-wrong-password").innerHTML = 
                "<div class='alert alert-danger' role='alert'>密码错误！</div>";
        } else if (result[0] == "2"){
            alert("您未在本站激活，点击确定前往激活页面");
            self.location = "./activiate.php?username=" + getUsername("input-username");
        }
    } else {
        alert("网络错误，请稍后重试。");
    }
    cleanPassword();
}

function onActiviateReceive(data, status){
    if (status){
        result = data.split("|");
        if (result[0] == "0"){
            alert("激活成功，点击确定前往首页"+data);
            self.location = "./index.php";
        } else if (result[0] == "1"){
            document.getElementById("activiate-wrong-password").innerHTML = 
                "<div class='alert alert-danger' role='alert'>密码错误！请确认是您在上海大学统一身份认证的密码。</div>";
        }
    } else {
        alert("网络错误，请稍后重试。");
    }
}