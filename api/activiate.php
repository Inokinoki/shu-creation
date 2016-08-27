<?php
/*
 * Use this api to activiate user's account
 * Login link: http://passport.lehu.shu.edu.cn/LoginDo.aspx?action=1
 */
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nickname = $_POST["nickname"];
    $name     = $_POST["name"];
    
    $url = "http://passport.lehu.shu.edu.cn/LoginDo.aspx?action=1";
    $post_data = array ("username" => $username,"password" => $password);
    $passprt_curl = curl_init();
    curl_setopt($passprt_curl, CURLOPT_URL, $url);
    curl_setopt($passprt_curl, CURLOPT_RETURNTRANSFER, 1);
    // Post
    curl_setopt($passprt_curl, CURLOPT_POST, 1);
    curl_setopt($passprt_curl, CURLOPT_POSTFIELDS, $post_data);
    $passport_output = curl_exec($passprt_curl);
    curl_close($passprt_curl);
    // Handle 
    $passport_result = $passport_output.trim("|");
    if ($passport_result[0]==0){
        // Save user info into database
        require_once("/shu-creation/api/database.php");
        $database = new Database();
        $database->connect();
        $password = md5($password);
        if ($database->exist("username", $username, "accounts")){
            // Activiate to reset password.
            $database->query("UPDATE accounts SET password = '$password', uuid = '' 
                WHERE username = '$username'");
        } else {
            // Activiate to activiate.
            $database->query("INSERT INTO accounts
                (username, password, nickname, name, _id, uuid, level) VALUES 
                ('$username', '$password', '$nickname', '$name', null, '', 0)");
        }
        echo 0;
    } else {
        // Wrong password.
        echo 1;
    }
?>