<?php
/*
 * Check user level and require 
 */
class LevelSystem{
    var $uuid;
    var $level = 0;
    var $permit = false;

    function LevelSystem($request_level, $request_uuid){
        $this->uuid = $request_uuid;
        $this->level = $request_level;
    }

    function validate(){
        if (!empty($this->uuid)){
            require_once("/shu-creation/api/database.php");
            $database = new Database();
            $database->connect();
            $result = $database->query("SELECT * FROM accounts WHERE uuid = '$this->uuid'");
            $row = mysql_fetch_array($result);
            if ($row["level"]>=$this->level){
                $this->permit = true;
            }
        }
        return $this->permit;
    }
}
?>