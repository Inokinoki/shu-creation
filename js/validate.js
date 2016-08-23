function validateUsername(username, error_message_id){
    if (username.length!=8){
        document.getElementById(error_message_id).innerHTML = 
                "<div class='alert alert-danger' role='alert'>请确定您输入的是8位学号</div>";
                return false;
    }
    return true;
}

function validatePassword(password, error_message_id){
    if (password.length<5){
        document.getElementById(error_message_id).innerHTML = 
                "<div class='alert alert-danger' role='alert'>密码长度过短</div>";
        return false;
    }
    return true;
}

function validateLength(text, name, min_length, error_message_id){
    if (text.length < min_length){
        document.getElementById(error_message_id).innerHTML = 
                "<div class='alert alert-danger' role='alert'>"+ name +"长度过短</div>";
        return false;
    }
    return true;
}

function validateEmail(email, error_message_id){
    if (!email.match("@")){
        document.getElementById(error_message_id).innerHTML = 
                "<div class='alert alert-danger' role='alert'>电子邮箱格式不正确</div>";
        return false;
    } else if (email.length<5){
        document.getElementById(error_message_id).innerHTML = 
                "<div class='alert alert-danger' role='alert'>电子邮箱长度过短</div>";
        return false;
    }
    return true;
}

function validatePhone(phone, error_message_id){
    if (username.length<10){
        document.getElementById(error_message_id).innerHTML = 
                "<div class='alert alert-danger' role='alert'>号码格式不正确，请填写您的常用手机号码</div>";
                return false;
    }
    return true;
}