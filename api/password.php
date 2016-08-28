<?php
    $uuid = $_COOKIE["creation_uuid"];  // Get uuid.

    if (!empty($uuid)){
        require_once("database.php");
        $database = new Database();
        $database->connect();
        if ($database->exist("uuid", $uuid, "accounts")){
            $old_password = $_POST["old_password"];
            $new_password = $_POST["new_password"];
            $return_code = 0;
            $pwd_result = $database->query("SELECT * FROM accounts WHERE uuid = '$uuid'");
            $pwd_row = mysql_fetch_array($pwd_result);
            if (md5($old_password)==$pwd_row["password"]){
                $pwd_id = $pwd_row["_id"];
                $database->query("UPDATE accounts SET password = '$new_password' WHERE _id = '$pwd_id'");
            } else {
                $return_code = 3;
            }
            echo $return_code;
        } else {
            // Maybe login state out of time
            echo 2;
        }
    } else {
        // No uuid -- ca veut dire not logged
        echo 1;
    }

?>