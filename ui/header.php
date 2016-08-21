		<nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Switch to this toggle button in small screen -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.php">上海大学创幻社</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="./index.php">主页</a></li>
                        <li><a href="./activity.php">社团活动</a></li>
                        <li><a href="./menmber.php">主要成员</a></li>
                        <li><a href="./join.php">报名通道</a></li>
                        <li><a href="./contact.php">联系我们</a></li>
                        <li><a href="./about.php">关于</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
<?php
	$user="User";
    require_once("./api/database.php");
	if((!$database->exist("uuid", $_COOKIE["creation_uuid"], "accounts"))||empty($_COOKIE["creation_uuid"])){
?>
                        <li><a data-toggle="modal" data-target="#LoginModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Login Modal -->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="LoginModalLabel">账户登录</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label>学号：</label><input name="username" id="input-username" type="text" class="form-control">
                            <label>密码：</label><input name="password" id="input-password" type="password" class="form-control">
                        </form>
                        <div id="input-wrong-password"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" onclick="login()">登录</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/md5.js"></script>
        <script src="./js/account.js"></script>
<?php
	}else{
        $uuid = $_COOKIE["creation_uuid"];
        $result = $database->query("SELECT * FROM accounts WHERE uuid = '$uuid'");
        $result = mysql_fetch_array($result);
?>
                        <li><a href="./user.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
<?php 
        if (empty($result["nickname"]))
            echo $user;
        else 
            echo $result["nickname"];
?></a></li>
                         <li><a href="./api/logout.php">退出</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<?php
	}
?>
