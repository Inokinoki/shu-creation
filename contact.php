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
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=wt2VuU0Al3qgsWhtzPRDsiyrt9Vv2k6X"></script>

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
            <div id="allmap"></div>
            <script type="text/javascript">
                // 百度地图API功能
                var map = new BMap.Map("allmap");    // 创建Map实例
                map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
                map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
                map.setCurrentCity("上海");          // 设置地图显示的城市 此项是必须设置的
                map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
            </script>
            <div class="panel panel-primary">
                <div class="panel-heading"><h2>联系方式</h2></div>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>地址</td>
                            <td>中国上海市宝山区上大路98号B楼308室</td>
                        </tr>
                        <tr>
                            <td>邮箱</td>
                            <td><a href="mailto:zhongouchuanghuan@163.com">zhongouchuanghuan@163.com</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="page-header">
                <h2>联系方式 <small>主要成员</small></h2>
            </div>
<?php
    require_once("./api/database.php");
    // Get boss info
    $boss_result = $database->query("SELECT * FROM member WHERE level = 4");
    while ($boss_info = mysql_fetch_array($boss_result)){
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
    while ($fboss_info = mysql_fetch_array($fboss_result)){
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
    