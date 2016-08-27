<?php
    $uuid = $_COOKIE["creation_uuid"];  // Get uuid.

    if (!empty($uuid)){
        require_once("/shu-creation/api/database.php");
        $database = new Database();
        $database->connect();
        if ($database->exist("uuid", $uuid, "accounts")){
            $name = $_POST["name"];
            $nickname = $_POST["nickname"];
            $password = $_POST["password"];
            $return_code = 0;
            if (!empty($name)){
                $database->query("UPDATE accounts SET name = '$name' WHERE uuid = '$uuid'");
            }
            if (!empty($nickname)){
                $database->query("UPDATE accounts SET nickname = '$nickname' WHERE uuid = '$uuid'");
            }
            if (!empty($password)){
                $database->query("UPDATE accounts SET password = '$password' WHERE uuid = '$uuid'");
                $database->query("UPDATE accounts SET uuid = '' WHERE uuid = '$uuid'");
                $return_code = 4;
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