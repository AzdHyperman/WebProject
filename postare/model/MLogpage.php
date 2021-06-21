<?php
require_once("controller/DBController.php");

class Logpage{

    function __construct()
    {
        $this->db_handle=new DBController();
    }
//logare,postare,edit,delete
    function sendLog($type,$info)
    {
    $query="INSERT INTO logpage (type,info) VALUES (? , ?)";
    $paramType="ss";
    $paramValue= array($type,$info);

    $insertLog = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertLog;

    }//end addPostare
    function getLog()
    {
        $query="SELECT * FROM logpage ORDER BY data";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }//type :report info: Limbaj neadecvat user:john1111 user_id:122 data:10.12.2021 20:59
    //type: postare info: titlu postare blabla user:john1234 user_id:212 data:
    //type: logare info:logare

}//end class

?>