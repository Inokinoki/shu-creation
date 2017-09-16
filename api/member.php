<?php
    /* Source:
     *      0: normal add(Use club creation api)
     *      1: request add
     */
    require_once("level.php");
    $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
        $member_source = $_GET["source"];
        if ($member_source==1){
            $request_id = $_POST["request_id"];
            require_once("database.php");
            $database = new Database();
            $database->connect();

            $member_result = $database->query("SELECT * FROM request WHERE _id = $request_id");
            $member_info = mysqli_fetch_array($member_result);
            $member_id = $member_info["username"];
            if ($database->exist("student_id", $member_id, "member")){
                echo 2;
            } else {
                $member_name = $member_info["name"];
                $member_phone = $member_info["phone_number"];
                $member_email = $member_info["email"];
                $member_sex = $member_info["sex"];
                $member_campus = $member_info["campus"];
                $database->query("INSERT INTO member
                    (_id, name, student_id, level, email, phone_number, sex, campus) VALUES 
                    (null, '$member_name', '$member_id', 1, '$member_email', 
                    '$member_phone', '$member_sex', $member_campus)");
                $database->query("UPDATE request SET state = 1
                    WHERE _id = $request_id");
                    $database->query("UPDATE accounts SET level = 1
                    WHERE username = $member_id");
                echo 0;
            }
        } else if($member_source==2){
            require_once("database.php");
            $database = new Database();
            $database->connect();
            $member_id = $_POST["username"];
            if ($database->exist("student_id", $member_id, "member")){
                echo 2;
            } else {
                $member_name = $_POST["name"];
                $member_phone = $_POST["phone_number"];
                $member_email = $_POST["email"];
                $member_sex = $_POST["sex"];
                $member_campus = $_POST["campus"];
                $database->query("INSERT INTO member
                    (_id, name, student_id, level, email, phone_number, sex, campus) VALUES 
                    (null, '$member_name', '$member_id', 1, '$member_email', 
                    '$member_phone', '$member_sex', $member_campus)");
                echo 0;
            }
        } else {
            // Not know mode
            echo 1;
        }
    } else 
        echo 1;

?>