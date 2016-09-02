<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Inoki Shaw"/>
        <meta name="keywords" content="Lego;Robot;Creation;Shanghai University"/>
        <meta name="description" content="Shanghai University Creation Club Official Website"/>

        <title>创幻社 用户管理</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/user.css">
        <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="./js/md5.js"></script>
        <script src="./js/validate.js"></script>
        <script src="./js/account.js"></script>
        <script src="./js/user.js"></script>

        <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php require_once("./console_header.php"); ?>
        <div class="wrapper row container-fluid">
            <div class="navlist hidden-xs hidden-sm col-md-3 col-lg-2">
                <ul class="nav-ul nav-root affix">
                    <?php require_once("./usercenter_side.php"); ?>
                </ul>
            </div>
            <div id="main-container" class="main-container col-xs-12 col-sm-12 col-md-9 col-lg-10">
            </div>
        </div>
        <div id="wait-alert" hidden="true" class="wait-alert panel panel-default hidden-xs hidden-sm">
            <div class="panel-heading">
                <a href="javascript:usercenter_close()"><span>&times;</span></a>
            </div>
            <div class="panel-body">
                <p><img height="64px" width="64px" src="./img/loading.gif"></img></p>
                <p>正在载入中...</p>
            </div>
        </div>
        <div id="wait-modal" class="modal fade hidden-md hidden-lg">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body" style="text-align:center;">
                    <p><img height="64px" width="64px" src="./img/loading.gif"></img></p>
                    <p>正在载入中...</p>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script>window.onload = user_center('person_info',0,1); </script>
    </body>
</html>