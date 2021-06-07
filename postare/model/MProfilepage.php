<?php
require_once ("controller/DBController.php")
class userProfile
{
    function __construct()
    {
        $db_handle=new DBController();
    }
    function editProfile()
    {
        $sql="UPDATE userprofile SET username=?,email=?,password=? where user_id=?";
        $paramType="sssi";
        $paramValue=array($username,$email,$password,$user_id);

        $this->db_handle->update($sql,$paramType,$paramValue);
    }
    function uploadPhoto()
    {
        $sql="UPDATE userprofile SET avatarimg=? where user_id=? ";
        $paramType="bi";
        $paramValue=array($avatarimg,$user_id);
        $this->db_handle->update($sql,$paramType,$paramValue);
    }
    function getProfile($user_id)
    {
        $sql="SELECT * from userprofile where id=?";
        $paramType="i";
        $paramValue=array($user_id);
        $result=$this->db_handle->runQuery();
        return $result;
    }

}//end class
?>