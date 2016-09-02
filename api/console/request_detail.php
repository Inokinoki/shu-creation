<?php
    require_once("level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
<div class="page-header">
  <h1>申请表</h1>
</div>
<div class="row">
<div class="panel panel-default col-xs-12 col-sm-11 col-md-10 col-lg-10">
<table class="table table-bordered" style="font-size:1.2em;">
    <tbody>
<?php
        require_once("database.php");
        $database = new Database();
        $database->connect();
        $request_result = $database->query("SELECT * FROM request WHERE _id = $uc_extra");
        while ($request_row = mysql_fetch_array($request_result)) {
            echo "<tr>";
            echo "<td><strong>姓名</strong></td><td>".$request_row["name"]."</td>";
            if ($request_row["sex"]==1)
                echo "<td><strong>性别</strong></td><td>女</td>";
            else
                echo "<td><strong>性别</strong></td><td>男</td>";
            $campus_id = $request_row['campus'];
            $campus_result = $database->query("SELECT * FROM campus WHERE _id = $campus_id");
            $campus_row = mysql_fetch_array($campus_result);
            echo "<td><strong>学院</strong></td><td>".$campus_row["name"]."</td>";
            echo "<td><strong>学号</strong></td><td>".$request_row["username"]."</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td><strong>邮箱</strong></td><td colspan='3'>".$request_row["email"]."</td>";
            echo "<td><strong>电话</strong></td><td>".$request_row["phone_number"]."</td>";
            echo "<td><strong>时间</strong></td><td>".$request_row["request_time"]."</td>";
            echo "<tr>";
            echo "<td><strong>自我介绍</strong></td><td colspan='7'>".$request_row["description"]."</td>";
            echo "</tr>";
        }
?>
    </tbody>
</table>
</div>
</div>
<p>
    <a id="backlink" class="btn btn-primary" href="javascript:user_center('user_request',0,<?php echo $uc_page?>)">返回列表</a>
    <a class="btn btn-success" href="javascript:requestAccess(<?php echo $uc_extra;?>)">批准申请</a>
    <a class="btn btn-danger" href="javascript:requestRefuse(<?php echo $uc_extra;?>)">拒绝申请</a>
</p>

<?php
    } else {
        require_once("no_permission.php");
    }
?>