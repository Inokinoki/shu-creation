<?php
    $uuid = $_COOKIE["creation_uuid"];
    require_once("./database.php");
    $database->query("UPDATE accounts SET uuid = '' WHERE uuid = '$uuid'");
    setcookie("creation_uuid","");
    header("Location:../index.php");
?>