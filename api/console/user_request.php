<?php
    require_once("level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>姓名</th>
        <th>学号</th>
        <th>时间</th>
        <th>性别</th>
        <th>学院</th>
        <th>邮箱</th>
        <th>电话</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
<?php
        require_once("database.php");
        $database = new Database();
        $database->connect();
        $request_result = $database->query("SELECT * FROM request WHERE state = 0");
        while ($request_row = mysql_fetch_array($request_result)) {
            echo "<tr>";
            echo "<td>".$request_row["name"]."</td>";
            echo "<td>".$request_row["username"]."</td>";
            echo "<td>".$request_row["request_time"]."</td>";
            if ($request_row["sex"]==1)
                echo "<td>女</td>";
            else
                echo "<td>男</td>";
            $campus_id = $request_row['campus'];
            $campus_result = $database->query("SELECT * FROM campus WHERE _id = $campus_id");
            $campus_row = mysql_fetch_array($campus_result);
            echo "<td>".$campus_row["name"]."</td>";
            echo "<td>".$request_row["email"]."</td>";
            echo "<td>".$request_row["phone_number"]."</td>";
            echo "<td><a href='javascript:user_center(request_detail,"
                .$request_row["_id"].")'>详情</a>";
            echo "</td>";
            echo "</tr>";
        }
?>
    </tbody>
</table>
<?php
    } else {
        require_once("no_permission.php");
    }
?>