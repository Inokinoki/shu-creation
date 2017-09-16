<?php
    require_once("level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Uid</th>
        <th>姓名</th>
        <th>学号</th>
        <th>昵称</th>
        <th>权限等级</th>
    </tr>
    </thead>
    <tbody>
<?php
        require_once("database.php");
        $database = new Database();
        $database->connect();
        $member_count = 0;
        $user_result = $database->query("SELECT * FROM accounts");
        while ($user_row = mysqli_fetch_array($user_result)) {
            echo "<tr>";
            echo "<td>".$user_row["_id"]."</td>";
            echo "<td>".$user_row["name"]."</td>";
            echo "<td>".$user_row["username"]."</td>";
            echo "<td>".$user_row["nickname"]."</td>";
            echo "<td>";
            $user_level = $user_row["level"];
            switch($user_level){
                case 0:echo "<span class='label label-default'>网站会员</span>";break;
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