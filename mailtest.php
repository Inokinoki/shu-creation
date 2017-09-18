<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Inoki Shaw"/>
        <meta name="keywords" content="Lego;Robot;Creation;Shanghai University"/>
        <meta name="description" content="Shanghai University Creation Club Official Website"/>

        <link rel="shortcut icon" href="/favicon.ico" />

        <title>上海大学创幻社Mail</title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/md5.js"></script>
        <script src="./js/validate.js"></script>
        <script src="./js/account.js"></script>

        <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
			<?php
					require_once("./header.php");
			?>
        <div class="col-md-12">
            <form>
                <div class="form-group">
                    <h4>接收者邮箱：</h4>
                    <input name="mail-to" id="mail-to"
                        type="email" class="form-control" placeholder="接收者邮箱">
                </div>

                <div class="form-group">
                    <h4>主题：</h4>
                    <input name="mail-subject" id="mail-subject"
                        type="text" class="form-control" placeholder="主题">
                </div>
                
                <div class="form-group">
                    <h4>内容：</h4>
                    <textarea class="form-control" id="mail-content"
                        rows="5" placeholder="HTML 代码"></textarea>
                </div>
                <div id="wrong-tip"></div>
                <button type="button" id="comfirm-button" class="btn btn-success" onclick="send();">发送测试</button>
            </form>
        </div>
        <script>
            function send(){
                document.getElementById("comfirm-button").setAttribute("disabled","disabled");
                document.getElementById("wrong-tip").innerHTML = 
                    "<div class='alert alert-info' role='alert'>正在发送，请稍后...</div>";
                var mailto = document.getElementById("mail-to").value;
                var mailsubject = document.getElementById("mail-subject").value;
                var mailcontent = document.getElementById("mail-content").value;
                $.post("./api/sendmail.php",
                {
                    mail_to         :   mailto,
                    mail_subject    :   mailsubject,
                    mail_body       :   mailcontent
                }, onEmailReceive );
            }

            function onEmailReceive(data, status){
                if (status){
                    result = data.split("|");
                    if (result[0] == "0"){
                        alert("发送成功");
                        document.getElementById("wrong-tip").innerHTML = 
                            "<div class='alert alert-success' role='alert'></div>";
                    } else if (result[0] == "1"){
                        if (result[1] == "0"){
                            document.getElementById("wrong-tip").innerHTML = 
                            "<div class='alert alert-danger' role='alert'>您没有使用该功能的权限哦</div>";
                        } else if (result[1] == "1"){
                            document.getElementById("wrong-tip").innerHTML = 
                            "<div class='alert alert-danger' role='alert'>no target</div>";
                        } else if (result[1] == "2"){
                            document.getElementById("wrong-tip").innerHTML = 
                            "<div class='alert alert-danger' role='alert'>no subject</div>";
                        } else if (result[1] == "3"){
                            document.getElementById("wrong-tip").innerHTML = 
                            "<div class='alert alert-danger' role='alert'>no content</div>";
                        }
                    }
                } else {
                    alert("网络错误，请稍后重试。");
                    document.getElementById("wrong-tip").innerHTML = "";
                }
                document.getElementById("comfirm-button").removeAttribute("disabled");
            }
        </script>
    </body>
</html>