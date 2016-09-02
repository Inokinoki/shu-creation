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
        <th>性别</th>
        <th>学院</th>
        <th>邮箱</th>
        <th>电话</th>
        <th>身份</th>
    </tr>
    </thead>
    <tbody>
<?php
        require_once("database.php");
        $database = new Database();
        $database->connect();
        $member_result = $database->query("SELECT * FROM member");
        $member_count = 0;
        while ($member_row = mysql_fetch_array($member_result)) {
            echo "<tr>";
            echo "<td>".$member_row["name"]."</td>";
            echo "<td>".$member_row["student_id"]."</td>";
            if ($member_row["sex"]==1)
                echo "<td>女</td>";
            else
                echo "<td>男</td>";
            $campus_id = $member_row['campus'];
            $campus_result = $database->query("SELECT * FROM campus WHERE _id = $campus_id");
            $campus_row = mysql_fetch_array($campus_result);
            echo "<td>".$campus_row["name"]."</td>";
            echo "<td>".$member_row["email"]."</td>";
            echo "<td>".$member_row["phone_number"]."</td>";
            echo "<td>";
            $member_level = $member_row["level"];
            switch($member_level){
                case 0:echo "<span class='label label-default'>前社员</span>";break;
                case 1:echo "<span class='label label-warning'>预备社员</span>";break;
                case 2:echo "<span class='label label-info'>正式社员</span>";break;
                case 3:echo "<span class='label label-success'>副社长</span>";break;
                case 4:echo "<span class='label label-primary'>社长</span>";break;
            }
            echo "</td>";
            echo "</tr>";
            $member_count++;
        }
?>
    </tbody>
</table>
<p><?php echo "总计: ".$member_count." 人"; ?></p>
<?php
    } else {
        require_once("no_permission.php");
    }
?>