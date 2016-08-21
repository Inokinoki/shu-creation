<?php
    $name     = $_POST["name"];
    $sex      = $_POST["sex"];
    $campus   = $_POST["campus"];
    $phone    = $_POST["phone"];
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $description = $_POST["description"];

    require_once("./database.php");
    $database->query("INSERT INTO request 
        (name, sex, campus, phone_number, email, username, description, _id, request_time, state) 
        VALUES ('$name', '$sex', '$campus', '$phone', '$email', '$username', '$description', null, null, 0)");
    echo "0";
?>