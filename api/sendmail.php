<?php
    
    // Get param

    $mailto         =   $_POST["mail_to"];//发送给谁   
    $mailsubject    =   $_POST["mail_subject"];//邮件主题   
    $mailbody       =   $_POST["mail_body"];//邮件内容  

    if (!empty($mailto)) {
        if (!empty($mailsubject)) {
            if (!empty($mailbody)) {
                // TO-DO require level >=3;

                // Send email to target user, permission level >= 3
                require_once("./smtp.php");  
                ##########################################   
                $smtpserver = "smtp.163.com";//SMTP服务器   
                $smtpserverport = 25;//SMTP服务器端口   
                $smtpusermail = "zhongouchuanghuan@163.com";//SMTP服务器的用户邮箱   
                $smtpuser = "zhongouchuanghuan@163.com";//SMTP服务器的用户帐号   
                $smtppass = "creation2016shu";//SMTP服务器的用户密码   
                $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件   
                ##########################################   
                $smtp = new SMTP($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);   
                $smtp->debug = true;//是否显示发送的调试信息   
                $smtp->sendmail($mailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
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