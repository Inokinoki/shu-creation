<?php
    $mode = $_POST["mode"];
    $uc_extra = $_POST["extra"];
    $uc_page = $_POST["page"];
    if (!empty($mode)){
        require_once("database.php");
        $uc_database = new Database();
        $uc_database->connect(); 
        $uc_result = $uc_database->query("SELECT * FROM user_center WHERE name = '$mode'");
        $uc_array = mysqli_fetch_array($uc_result);
        if (!empty($uc_array["link"]))
            require_once($uc_array["link"]);
        else 
            require_once("./console/no_such_page.php");
    } else {
        require_once("./console/no_such_page.php");
    }
?>