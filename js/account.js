function login(){
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
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
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
    document.getElementById("activiate-wrong-password").innerHTML = 
        "<div class='alert alert-info' role='alert'>正在激活，请稍后...</div>";
    var username = document.getElementById("activiate-username").value;
    var password = document.getElementById("activiate-password").value;
    var nickname = document.getElementById("activiate-nickname").value;
    var name     = document.getElementById("activiate-name").value;
    $.post("./api/activiate.php",
        {
            username : username,
            password : password,
            nickname : nickname,
            name     : name
        }, onActiviateReceive );
}

function join(){
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
    document.getElementById("join-tip").innerHTML = 
        "<div class='alert alert-info' role='alert'>正在提交申请，请稍后...</div>";
    var name        = document.getElementById("join-name").value;
    var sex         = 0;
    if (document.getElementById("join-sex-1").checked)
        sex = 0;
    else if (document.getElementById("join-sex-2").checked)
        sex = 1;
    var username    = document.getElementById("join-student-id").value;
    var campus      = document.getElementById("join-student-campus").value;
    var phone       = document.getElementById("join-phone").value;
    var email       = document.getElementById("join-email").value;
    var description = document.getElementById("join-description").value;
    alert("name:"+ name +"\n"+
        "sex:"+ sex +"\n"+
        "username:"+ username +"\n"+
        "campus:"+ campus +"\n"+
        "phone:"+ phone +"\n"+
        "email:"+ email +"\n"+
        "description:"+ description);
    $.post("./api/join.php",
        {
            name     : name,
            sex      : sex,
            campus   : campus,
            phone    : phone,
            username : username,
            email    : email,
            description : description
        }, onJoinReceive );
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

function joinClean(){
    document.getElementById("join-name").value = "";
    document.getElementById("join-sex-1").checked = false;
    document.getElementById("join-sex-2").checked = false;
    document.getElementById("join-sex-1").parentElement.setAttribute("class", "btn btn-default");
    document.getElementById("join-sex-2").parentElement.setAttribute("class", "btn btn-default");
    document.getElementById("join-student-id").value = "";
    document.getElementById("join-student-campus").value = "1";
    document.getElementById("join-phone").value = "";
    document.getElementById("join-email").value = "";
    document.getElementById("join-description").value = "";
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
        document.getElementById("activiate-wrong-password").innerHTML = "";
    }
    cleanPassword();
    document.getElementById("comfirm-button").removeAttribute("disabled");
}

function onActiviateReceive(data, status){
    if (status){
        result = data.split("|");
        if (result[0] == "0"){
            alert("激活成功，点击确定前往首页");
            self.location = "./index.php";
        } else if (result[0] == "1"){
            document.getElementById("activiate-wrong-password").innerHTML = 
                "<div class='alert alert-danger' role='alert'>密码错误！请确认是您在上海大学统一身份认证的密码。</div>";
        }
    } else {
        alert("网络错误，请稍后重试。");
        document.getElementById("activiate-wrong-password").innerHTML = "";
    }
    document.getElementById("comfirm-button").removeAttribute("disabled");
    document.getElementById("activiate-password").value = "";
}

function onJoinReceive(data, status){
    if (status){
        alert(data);
        result = data.split("|");
        if (result[0] == "0"){
            alert("申请提交成功，我们将在三个工作日内审核您的申请，并通过邮件回复您审核结果。\n请注意查收邮件！");
            self.location = "./index.php";
        }
    } else {
        alert("网络错误，请稍后重试。");
        document.getElementById("join-tip").innerHTML = "";
    }
    document.getElementById("comfirm-button").removeAttribute("disabled");
}