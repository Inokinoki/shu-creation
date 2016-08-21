<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Inoki Shaw"/>
        <meta name="keywords" content="Lego;Robot;Creation;Shanghai University"/>
        <meta name="description" content="Shanghai University Creation Club Official Website"/>

        <title>上海大学创幻社 －－ 激活</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="./js/account.js"></script>

        <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
                require_once("./ui/header.php");
        ?>
        <div class="container" role="main">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>账户激活</h2></div>
                    <div class="panel-body">
                        <div class="col-xs-6" id="activiate_form">
                            <form>
                                <div class="form-group">
                                    <label>学号：</label>
                                    <input name="username" id="activiate-username" type="text" class="form-control" 
                                            placeholder="上海大学学号" value="<?php echo $_GET["username"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label>昵称：</label>
                                    <input name="nickname" id="activiate-nickname" type="text" class="form-control" placeholder="本网站使用的昵称">
                                </div>
                                <div class="form-group">
                                    <label>密码：</label>
                                    <input name="password" id="activiate-password" type="password" class="form-control" placeholder="一卡通密码">
                                </div>
                                <div class="form-group">
                                    <label>姓名：</label>
                                    <input name="name" id="activiate-name" type="text" class="form-control" placeholder="真实姓名">
                                </div>
                            </form>
                            <div id="activiate-wrong-password"></div>
                            <button class="btn btn-danger" onclick="activiate()">激活</button>
                        </div>
                        <div class="col-xs-6" id="join_side">
                            <h3>注意：</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>