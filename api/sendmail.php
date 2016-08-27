<?php
    // Get param
    $mailto         =   $_POST["mail_to"];//发送给谁   
    $mailsubject    =   $_POST["mail_subject"];//邮件主题   
    $mailbody       =   $_POST["mail_body"];//邮件内容  
    if (!empty($mailto)) {
        if (!empty($mailsubject)) {
            if (!empty($mailbody)) {
                // Require level >=3;
                require_once("./level.php");
                $level = new LevelSystem(3, $_COOKIE["creation_uuid"]);
                if ($level->validate()){
                    // Send email to target user, permission level >= 3
                    require_once("./smtp.php");  
                    ##########################################   
                    $smtpserver = "smtp.163.com";//SMTP server   
                    $smtpserverport = 25;//SMTP port 
                    $smtpusermail = "zhongouchuanghuan@163.com";//SMTP user mail  
                    $smtpuser = "zhongouchuanghuan@163.com";//SMTP account
                    $smtppass = "creation2016shu";//SMTP password
                    $mailtype = "HTML";//Mail format
                    ##########################################   
                    $smtp = new SMTP($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);   
                    $smtp->debug = false;//是否显示发送的调试信息   
                    $smtp->sendmail($mailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
                    echo "0";
                } else {
                    // Permission denied.
                    echo "1|0";
                }
            } else {
                echo "1|3";
            }
        } else {
            echo "1|2";
        }
    } else {
        echo "1|1";
    }

    /* Error code : 1 - no target email
                    2 - no subject
                    3 - no body
                    4 - sen failed.
    */
?>