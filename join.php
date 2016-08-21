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
                $uuid = $_COOKIE["creation_uuid"];
                if (!empty($uuid)){
                    require_once("./api/database.php");
                    if ($database->exist("uuid", $uuid ,"accounts")){
                        $result = mysql_fetch_array(
                            $database->query("SELECT * FROM accounts WHERE uuid = '$uuid'"));
                        $student_name = $result["name"];
                        $student_id = $result["username"];
                        if (!$database->exist("username", $student_id, "member")){
                            // Not a member
                            $request_result = $database->query("SELECT * FROM request WHERE username = '$student_id' AND state = 0");
                            if( mysql_num_rows($request_result)==0 ){
                                // Not requesting
             ?>
                <div class="panel-heading"><h2>报名表</h2></div>
                    <div class="panel-body">
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12" id="join_form">
                            <form>
                                <div class="form-group">
                                    <h4>真实姓名：</h4>
                                    <input name="name" id="join-name" value="<?php echo $student_name; ?>"
                                        type="text" class="form-control" placeholder="姓名">
                                </div>
                                
                                <div class="form-group">
                                    <h4>性别：</h4>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default">
                                            <input name="sex" id="join-sex-1" type="radio" value="1">小鲜肉（男）
                                        </label>
                                        <label class="btn btn-default">
                                            <input name="sex" id="join-sex-2" type="radio" value="2">小鲜花（女）
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h4>学号：</h4>
                                    <input name="name" id="join-student-id" value="<?php echo $student_id; ?>"
                                        type="text" class="form-control" placeholder="学号">
                                </div>

                                <div class="form-group">
                                    <h4>学院：</h4>
                                    <select name="campus" id="join-student-campus" class="form-control">
                                        <?php
                                            $campus_result = $database->query("SELECT * FROM campus");
                                            while ($row = mysql_fetch_array($campus_result)){
                                                echo "<option value='".$row["_id"]."'>".$row["name"]."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h4>手机号码：</h4>
                                    <input name="phone" id="join-phone"
                                        type="text" class="form-control" placeholder="常用号码">
                                </div>

                                <div class="form-group">
                                    <h4>邮箱：</h4>
                                    <input name="email" id="join-email"
                                        type="email" class="form-control" placeholder="常用邮箱">
                                </div>
                                
                                <div class="form-group">
                                    <h4>自我介绍：</h4>
                                    <textarea class="form-control" id="join-description"
                                        rows="5" placeholder="兴趣、爱好、特长、理想等，都可以"></textarea>
                                </div>
                                <div id="join-tip"></div>
                                <button type="button" id="comfirm-button" class="btn btn-success" onclick="join();">报名</button>
                                <button type="button" class="btn btn-danger" onclick="joinClean();">重置</button>
                            </form>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12" id="join_side">
                            <h3>注意：</h3>
                        </div>
                    </div>
                </div>
                <script src="./js/account.js"></script>
            <?php
                            } else {
            ?>
                <div class="panel-heading"><h2>欢迎 <small><?php echo $student_name; ?></small></h2></div>
                    <div class="panel-body">
                        <div class="alert alert-warning" role="alert">您已经提交过申请了，请等待管理员的验证！</div>
                    </div>
                </div>
            <?php
                            }
                        } else {
                            // Already a member
            ?>
                <div class="panel-heading"><h2>欢迎 <small><?php echo $student_name; ?></small></h2></div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert">恭喜您，您已经是创幻社的一员了！不需要再报名社团咯～</div>
                    </div>
                </div>
            <?php
                        }
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