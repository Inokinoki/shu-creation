                    <li>
                        <a href="#AccountCollapse" data-toggle="collapse" data-target="#AccountCollapse" 
                            aria-expanded="false" aria-controls="AccountCollapse">账户管理</a>
                        <ul class="nav-ul collapse" id="AccountCollapse">
                            <li><a href="javascript:user_center('person')">个人资料</a></li>
                            <li><a href="javascript:user_center('password')">修改密码</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#ActivityCollapse" data-toggle="collapse" data-target="#ActivityCollapse" 
                            aria-expanded="false" aria-controls="ActivityCollapse">活动管理</a>
                        <ul class="nav-ul collapse" id="ActivityCollapse">
                            <li><a>正在报名</a></li>
                            <li><a>正在进行</a></li>
                            <li><a>已结束</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#CourseCollapse" data-toggle="collapse" data-target="#CourseCollapse" 
                            aria-expanded="false" aria-controls="CourseCollapse">课程管理</a>
                        <ul class="nav-ul collapse" id="CourseCollapse">
                            <li><a>我的课程</a></li>
                            <li><a>加入课程</a></li>
                            <li><a>课程资料</a></li>
                            <li><a>C语言IDE</a></li>
                            <li><a>HTML编辑</a></li>
                        </ul>
                    </li>
<?php
    require_once("../api/level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
                    <li>
                        <a href="#ManageCollapse" data-toggle="collapse" data-target="#ManageCollapse" 
                            aria-expanded="false" aria-controls="ManageCollapse">社团管理</a>
                        <ul class="nav-ul collapse" id="ManageCollapse">
                            <li><a>账户查询</a></li>
                            <li><a>加入申请</a></li>
                            <li><a>用户列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#TestCollapse" data-toggle="collapse" data-target="#TestCollapse" 
                            aria-expanded="false" aria-controls="TestCollapse">功能测试</a>
                        <ul class="nav-ul collapse" id="TestCollapse">
                            <li><a href="./mailtest.php">邮箱系统</a></li>
                            <li><a href="./map.html">定位系统</a></li>
                            <li><a href="./activiate.php">账户激活</a></li>
                        </ul>
                    </li>
<?php
    }
?>