<?php
    require_once("level.php");
    $level = new LevelSystem(0, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
        $person_uuid = $_COOKIE["creation_uuid"];
        require_once("database.php");
        $database = new Database();
        $database->connect();
        $person_result = $database->query("SELECT * FROM accounts WHERE uuid = '$person_uuid'");
        $person_row = mysql_fetch_array($person_result);
        $person_id = $person_row["username"];
        
        // Is member?
        $member_result = $database->query("SELECT * FROM member WHERE student_id = '$person_id'");
        $is_member = false;
        if (mysql_num_rows($member_result)>0){
            $is_member = true;
        }
?>
<div class="page-header" style="font-size:1.5em;">
  <?php 
        // Header: Nick name and level
        echo "<h2>".$person_row["nickname"]." <small>"; 
        if (!$is_member){
            $user_level = $person_row["level"];
            switch($user_level){
                case 0:echo "<span class='label label-default'>网站会员</span>";break;
                case 1:echo "<span class='label label-warning'>预备社员</span>";break;
                case 2:echo "<span class='label label-info'>正式社员</span>";break;
                case 3:echo "<span class='label label-success'>副社长</span>";break;
                case 4:echo "<span class='label label-primary'>社长</span>";break;
            }
        } else {
            $member_row = mysql_fetch_array($member_result);
            $user_level = $member_row["level"];
            switch($user_level){
                case 0:echo "<span class='label label-default'>前社员</span>";break;
                case 1:echo "<span class='label label-warning'>预备社员</span>";break;
                case 2:echo "<span class='label label-info'>正式社员</span>";break;
                case 3:echo "<span class='label label-success'>副社长</span>";break;
                case 4:echo "<span class='label label-primary'>社长</span>";break;
            }
        }
        echo "</small></h2>";
    ?>
</div>
<div class="container row">
    <div class='col-lg-7 col-md-7 col-sm-12 col-xs-12'>
        <div>
<?php
    echo "<table class='table'>";
    echo "<tr><td>真实姓名：</td><td>".$person_row["name"]."</td></tr>";
    echo "<tr><td>学号：</td><td>".$person_row["username"]."</td></tr>";
    if ($is_member){
        if ($member_row["sex"]==1)
            echo "<tr><td>性别：</td><td>女</td></tr>";
        else
            echo "<tr><td>性别：</td><td>男</td></tr>";
        $campus_id = $member_row['campus'];
        $campus_result = $database->query("SELECT * FROM campus WHERE _id = $campus_id");
        $campus_row = mysql_fetch_array($campus_result);
        echo "<tr><td>学院：</td><td>".$campus_row["name"]."</td></tr>";
        echo "<tr><td>身份：</td><td>";
        $member_level = $member_row["level"];
        switch($member_level){
            case 0:echo "<span class='label label-default'>前社员</span>";break;
            case 1:echo "<span class='label label-warning'>预备社员</span>";break;
            case 2:echo "<span class='label label-info'>正式社员</span>";break;
            case 3:echo "<span class='label label-success'>副社长</span>";break;
            case 4:echo "<span class='label label-primary'>社长</span>";break;
        }
        echo "</td></tr>";
        echo "<tr><td>电子邮件：</td><td>".$member_row["email"]."</td></tr>";
        echo "<tr><td>电话号码：</td><td>".$member_row["phone_number"]."</td></tr>";
        echo "</table>";
    } else {
        echo "<tr><td>提醒：</td><td>非社团成员，您可以<a href='./join.php'>申请</a>加入社团</td></tr>";
        echo "</table>";
    }
    ?>
        </div>
        <!--<div class="panel panel-info">
            <div class="panel-heading"><h3>通知</h3></div>
            <div class="panel-body">
                <p>...</p>
            </div>
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>-->
    </div>
    <div class='col-lg-5 col-md-5 col-sm-12 col-xs-12'>
<?php
    // Level system list
    echo "<h3>权限列表</h3><table class='table table-striped'>";
    echo "<thead><tr><th>功能名称</th><th>可用性</th>
        </tr></thead>";
    echo "<tr><td>修改密码</td><td><span class='glyphicon glyphicon-ok'></span></td></tr>";
    echo "<tr><td>个人资料</td><td><span class='glyphicon glyphicon-ok'></span></span></td></tr>";
    echo "<tr><td>正在报名</td><td><span class='glyphicon glyphicon-ok'></span></td></tr>";
    echo "<tr><td>正在进行</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>已结束</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>加入课程</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>课程资料</td><td><span class='glyphicon glyphicon-ok'></span></td></tr>";
    echo "<tr><td>C语言IDE</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>HTML编辑</td><td><span class='glyphicon glyphicon-ok'></span></td></tr>";
    echo "<tr><td>社员列表</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>加入申请</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>用户列表</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>邮箱系统</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>定位系统</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "<tr><td>账户激活</td><td><span class='glyphicon glyphicon-remove'></span></span></td></tr>";
    echo "</table>";
?>
    </div>
</div>
<?php
    } else {
        require_once("no_permission.php");
    }
?>