<?php
    require_once("level.php");
    $level = new LevelSystem(0, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
<?php
        $person_uuid = $_COOKIE["creation_uuid"];
        require_once("database.php");
        $database = new Database();
        $database->connect();
        $person_result = $database->query("SELECT * FROM accounts WHERE uuid = '$person_uuid'");
        $person_row = mysql_fetch_array($person_result);
        echo $person_row["name"];
        
?>
    </tbody>
</table>
<?php
    } else {
        require_once("no_permission.php");
    }
?>