<?php
    $mode = $_POST["mode"];
    if (!empty($mode)){
        require_once("database.php");
        $uc_database = new Database();
        $uc_database->connect(); 
        $uc_result = $uc_database->query("SELECT * FROM user_center WHERE name = '$mode'");
        $uc_array = mysql_fetch_array($uc_result);
        require_once("level.php");
        $uc_level = new LevelSystem($uc_array["level"], $_COOKIE["creation_uuid"]);
        if ($uc_level->validate()){
            if (!empty($uc_array["link"]))
                require_once($uc_array["link"]);
            else 
                require_once("./console/no_such_page.php");
        } else
            require_once("./console/no_permission.php");
    } else {
        require_once("./console/no_such_page.php");
    }
?>