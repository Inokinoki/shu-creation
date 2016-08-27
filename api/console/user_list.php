<?php
    require_once("level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
<table class="table table-bordered">
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
        $user_result = $database->query("SELECT * FROM accounts");
        while ($user_row = mysql_fetch_array($user_result)) {
            echo "<tr>";
            echo "<td>".$user_row["_id"]."</td>";
            echo "<td>".$user_row["name"]."</td>";
            echo "<td>".$user_row["username"]."</td>";
            echo "<td>".$user_row["nickname"]."</td>";
            echo "<td>";
            $user_level = $user_row["level"];
            switch($user_level){
                case 0:echo "网站会员";break;
                case 1:echo "预备社员";break;
                case 2:echo "正式社员";break;
                case 3:echo "副社长";break;
                case 4:echo "社长";break;
            }
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