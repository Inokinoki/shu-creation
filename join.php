<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Inoki Shaw"/>
        <meta name="keywords" content="Lego;Robot;Creation;Shanghai University"/>
        <meta name="description" content="Shanghai University Creation Club Official Website"/>

        <title>上海大学创幻社</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
            <?php // Logged and level==0(not a member)
                if (!empty($_COOKIE["creation_uuid"])){
                    require_once("./api/database.php");
                    if ($database->exist("uuid", $_COOKIE["creation_uuid"] ,"accounts")){
             ?>
                <div class="panel-heading"><h2>报名表</h2></div>
                    <div class="panel-body">
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12" id="join_form">
                            <form>
                                <div class="form-group">
                                    <label>真实姓名：</label>
                                    <input name="name" type="text" class="form-control" placeholder="姓名">
                                </div>
                                
                                <div class="form-group">
                                    <label>性别：</label>
                                    <input name="sex" type="radio" value="1">小鲜肉（男）
                                    <input name="sex" type="radio" value="2">小鲜花（女）
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="join_side">
                            <h3>注意：</h3>
                        </div>
                    </div>
                </div>
            <?php
                    } else {
             ?>
                <div class="panel-heading"><h2>登陆状态过期</h2></div>
                    <div class="panel-body">
                        <div class="alert alert-warning" role="alert">请您先点击
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#LoginModal">登录</button>
                            按钮使用学号、密码登录。</div>
                    </div>
                </div>
            <?php
                    }
                } else {
                    // No creation_uuid
            ?>
                <div class="panel-heading"><h2>未登陆</h2></div>
                    <div class="panel-body">
                        <div class="alert alert-warning" role="alert">请您先点击
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#LoginModal">登录</button>
                            按钮使用学号、密码登录。</div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
        </div>
    </body>
</html>