function login(){
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
    document.getElementById("wrong-tip").innerHTML = 
        "<div class='alert alert-info' role='alert'>正在登录，请稍后...</div>";
    var username = getUsername("input-username");
    var password = getPassword("input-password");
    if (username && password){
        $.post("./api/login.php",
            {
                username : username,
                password : password
            }, onLoginReceive );
    } else {
        resetLogin();
    }
}

function activiate(){
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
    document.getElementById("wrong-tip").innerHTML = 
        "<div class='alert alert-info' role='alert'>正在激活，请稍后...</div>";
    var name     = getName("activiate-name");
    var password = getRawPassword("activiate-password");
    var nickname = getNickname("activiate-nickname");
    var username = getUsername("activiate-username");
    if (username && password && nickname && name){
        $.post("./api/activiate.php",
            {
                username : username,
                password : password,
                nickname : nickname,
                name     : name
            }, onActiviateReceive );
    } else {
        resetActiviate();
    }
}

function join(){
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
    document.getElementById("wrong-tip").innerHTML = 
        "<div class='alert alert-info' role='alert'>正在提交申请，请稍后...</div>";
    var description = getDescription("join-description");
    var email       = getEmail("join-email");
    var name        = getName("join-name");
    var phone       = document.getElementById("join-phone").value;
    var sex         = 0;
    if (document.getElementById("join-sex-1").checked)
        sex = 0;
    else if (document.getElementById("join-sex-2").checked)
        sex = 1;
    var username    = getUsername("join-student-id");
    var campus      = document.getElementById("join-student-campus").value;
    if (email && phone && username && name && description){
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
    } else {
        resetJoin();
    }
}

function getUsername(id){
    var username = document.getElementById(id).value;
    if(validateUsername(username, "wrong-tip"))
        return username;
    else
        return false;
}

function getRawPassword(id){
    var e_password = document.getElementById(id);
    if (validatePassword(e_password.value, "wrong-tip")){
        return e_password.value;
    } else
        return false;
}

function getPassword(id){
    var e_password = document.getElementById(id);
    if (validatePassword(e_password.value, "wrong-tip")){
        var encrypted = hex_md5(e_password.value);
        e_password.value = encrypted;
        return encrypted;
    } else
        return false;
}

function getNickname(id){
    var nickname = document.getElementById(id).value;
    if(validateLength(nickname, "昵称", 4,"wrong-tip"))
        return nickname;
    else
        return false;
}

function getName(id){
    var name = document.getElementById(id).value;
    if(validateLength(name, "姓名", 2,"wrong-tip"))
        return name;
    else
        return false;
}

function getPhoneNumber(id){
    var phone = document.getElementById(id).value;
    if(validatePhone(phone, "wrong-tip"))
        return phone;
    else
        return false;
}

function getDescription(id){
    var description = document.getElementById(id).value;
    if(validateLength(description, "自我介绍", 10,"wrong-tip"))
        return description;
    else
        return false;
}

function getEmail(id){
    var email = document.getElementById(id).value;
    if (validateEmail(email, "wrong-tip"))
        return email;
    else
        return false;
}

function resetLogin(){
    cleanPassword();
    document.getElementById("comfirm-button").removeAttribute("disabled");
}

function resetActiviate(){
    document.getElementById("comfirm-button").removeAttribute("disabled");
}

function resetJoin(){
    document.getElementById("comfirm-button").removeAttribute("disabled");
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
            document.getElementById("wrong-tip").innerHTML = 
                "<div class='alert alert-danger' role='alert'>密码错误！</div>";
        } else if (result[0] == "2"){
            alert("您未在本站激活，点击确定前往激活页面");
            self.location = "./activiate.php?username=" + getUsername("input-username");
        }
    } else {
        alert("网络错误，请稍后重试。");
        document.getElementById("wrong-tip").innerHTML = "";
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
            document.getElementById("wrong-tip").innerHTML = 
                "<div class='alert alert-danger' role='alert'>密码错误！请确认是您在上海大学统一身份认证的密码。</div>";
        }
    } else {
        alert("网络错误，请稍后重试。");
        document.getElementById("wrong-tip").innerHTML = "";
    }
    document.getElementById("comfirm-button").removeAttribute("disabled");
    document.getElementById("activiate-password").value = "";
}

function onJoinReceive(data, status){
    if (status){
        result = data.split("|");
        if (result[0] == "0"){
            alert("申请提交成功，我们将在三个工作日内审核您的申请，并通过邮件回复您审核结果。\n请注意查收邮件！");
            self.location = "./index.php";
        }
    } else {
        alert("网络错误，请稍后重试。");
        document.getElementById("wrong-tip").innerHTML = "";
    }
    document.getElementById("comfirm-button").removeAttribute("disabled");
}

function modifyPassword(){
    document.getElementById("comfirm-button").setAttribute("disabled","disabled");
    document.getElementById("wrong-tip").innerHTML = 
        "<div class='alert alert-info' role='alert'>检测中</div>";
    var old_password = document.getElementById("old-password").value;
    var new_password = document.getElementById("new-password").value;
    var confirm_password = document.getElementById("confirm-password").value;
    if (new_password==confirm_password){
        if (new_password.length >= 4){
            document.getElementById("wrong-tip").innerHTML = 
                "<div class='alert alert-info' role='alert'>发送中</div>";
            new_password = hex_md5(new_password);
            $.post("./api/password.php",
            {
                old_password : old_password,
                new_password : new_password
            }, onPasswordReceive );
        } else {
            document.getElementById("wrong-tip").innerHTML = 
            "<div class='alert alert-danger' role='alert'>新密码长度过短</div>";
            document.getElementById("comfirm-button").removeAttribute("disabled");
        }
    } else {
        document.getElementById("wrong-tip").innerHTML = 
            "<div class='alert alert-danger' role='alert'>密码不一致</div>";
        document.getElementById("comfirm-button").removeAttribute("disabled");
    }
}

function onPasswordReceive(data, status){
    if (status){
        result = data.split("|");
        if (result[0] == "0"){
            document.getElementById("wrong-tip").innerHTML = 
                "<div class='alert alert-success' role='alert'>密码修改成功</div>";
        } else if (result[0] == "1" || result[0] == "2"){
            document.getElementById("wrong-tip").innerHTML = 
                "<div class='alert alert-danger' role='alert'>登陆状态失效</div>";
        } else if (result[0] == "3"){
            document.getElementById("wrong-tip").innerHTML = 
                "<div class='alert alert-danger' role='alert'>旧密码错误！</div>";
        }
    } else {
        alert("网络错误，请稍后重试。");
        document.getElementById("wrong-tip").innerHTML = "";
    }
    document.getElementById("comfirm-button").removeAttribute("disabled");
}