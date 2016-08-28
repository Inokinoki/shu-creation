    <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.php">上海大学创幻社</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav hidden-lg hidden-md">
                        <li><a href="javascript:user_center('account_password',0,1)">密码修改</a></li>
                        <li><a href="javascript:user_center('person_info',0,1)">个人中心</a></li>
                        <li class="hidden-sm"><a>更多功能请在PC端访问</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./user.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
<?php
        require_once("./api/database.php");
        $database = new Database();
        $database->connect();
        $uuid = $_COOKIE["creation_uuid"];
        $result = $database->query("SELECT * FROM accounts WHERE uuid = '$uuid'");
        $result = mysql_fetch_array($result);
        if (empty($result["nickname"]))
            echo "User";
        else 
            echo $result["nickname"];
?></a></li>
                        <li><a href="./api/logout.php">退出</a></li>
                    </ul>
                </div>
            </div>
        </nav>