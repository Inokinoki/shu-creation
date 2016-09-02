<?php
    require_once("level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
        $request_id = $_POST["request_id"];
        if (!empty($request_id)){
            require_once("database.php");
            $database = new Database();
            $database->connect();
            $database->query("UPDATE request SET state = 1
                    WHERE _id = $request_id");
            echo 0;
        } else 
            echo 2;
    } else 
        echo 1;

?>