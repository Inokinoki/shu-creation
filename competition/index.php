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
                        <!-- <li><a href="./activity.php">社团活动</a></li>
                        // <li><a href="./menmber.php">主要成员</a></li> -->
                        <li><a href="./join.php">报名通道</a></li>
                        <li><a href="./contact.php">联系我们</a></li>
                        <li><a href="./about.php">关于</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
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
                        <div id="wrong-tip"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" id="comfirm-button" class="btn btn-primary" onclick="login();">登录</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" role="main">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>第七届 “中欧杯” 创幻机器人大赛报名表</h2></div>
                    <div class="panel-body">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" id="join_form">
                            <p>
								欢迎您报名参加 第七届 “中欧杯” 创幻机器人大赛。<br/>
								<br/>
								请于<span class="text-danger">2017年1月2日 18：00 前</span>将报名表发送至<span class="text-primary">zhongouchuanghuan@163.com</span><br/>
								<br/>
								点击此处
								<a type="button" class="btn btn-default" href="./第七届中欧杯创幻机器人大赛报名表.docx">下载</a>
								报名表。
							</p>
							<p>
								使用微信或QQ打开本页面的同学请点击右上角菜单-><span class="text-danger">在浏览器中打开本页面</span> 才可正常下载报名表<br/>
								<br/>
							</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>