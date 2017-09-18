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
        <div class="container" role="main">
            <div class="panel panel-primary" style="padding:0;">
                <div class="panel-heading"><h2>联系方式</h2></div>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>地址</td>
                            <td>中国上海市宝山区上大路99号上海大学B楼308室</td>
                        </tr>
                        <tr>
                            <td>邮箱</td>
                            <td><a href="mailto:zhongouchuanghuan@163.com">zhongouchuanghuan@163.com</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="./map.html"></iframe>
                </div>
            </div>
            <div class="page-header">
                <h2>联系方式 <small>主要成员</small></h2>
            </div>
<?php
    require_once("./api/database.php");
    $database = new Database();
    $database->connect();
    // Get boss info
    $boss_result = $database->query("SELECT * FROM member WHERE level = 4");
    while ($boss_info = mysqli_fetch_array($boss_result)){
        echo "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-4'>
                <div class='panel panel-info'>
                    <div class='panel-heading'>".$boss_info["name"]."</div>
                    <div class='panel-body'>
                        <p>电话: ".$boss_info["phone_number"]."</p>
                        <p>邮箱: ".$boss_info["email"]."</p>
                    </div>
                </div>
            </div>";
    }
    $fboss_result = $database->query("SELECT * FROM member WHERE level = 3");
    while ($fboss_info = mysqli_fetch_array($fboss_result)){
        echo "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-4'>
                <div class='panel panel-success'>
                    <div class='panel-heading'>".$fboss_info["name"]."</div>
                    <div class='panel-body'>
                        <p>电话: ".$fboss_info["phone_number"]."</p>
                        <p>邮箱: ".$fboss_info["email"]."</p>
                    </div>
                </div>
            </div>";
    }
?>
            </div>
        </div>
    </body>
</html>
    