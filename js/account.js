function login(){
    document.getElementById("input-wrong-password").innerHTML = "";
    var username = getUsername("input-username");
    var password = getPassword("input-password");
    $.post("./api/login.php",
        {
            username : username,
            password : password
        }, onReceive );
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

function onReceive(data, status){
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
            window.navigate("./activiate.php");
        }
    } else {
        alert("网络错误，请稍后重试。");
    }
    cleanPassword();
}