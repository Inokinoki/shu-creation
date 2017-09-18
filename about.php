<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Inoki Shaw"/>
        <meta name="keywords" content="Lego;Robot;Creation;Shanghai University"/>
        <meta name="description" content="Shanghai University Creation Club Official Website"/>

        <title>上海大学创幻社 －－ 关于</title>
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
            <div class="jumbotron">
                <?php
                    require_once("./api/database.php");
                    $database = new Database();
                    $database->connect();
                    $result = $database->query("SELECT * FROM static_articles WHERE name = 'about'");
                    $content = mysqli_fetch_array($result);
                    echo $content["content"];
                ?>
            </div>
        </div>
    </body>
</html>
