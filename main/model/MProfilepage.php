<?php
require_once ("controller/DBController.php");
class userProfile
{
    function __construct()
    {
        $this->db_handle=new DBController();
    }
    function editProfile($username,$email,$password,$user_id)
    {
        $sql="UPDATE users SET username=?,email=?,password=? where user_id=?";
        $paramType="sssi";
        $paramValue=array($username,$email,$password,$user_id);

        $this->db_handle->update($sql,$paramType,$paramValue);
    }
    function uploadPhoto($avatarimg,$user_id)
    {
        $sql="UPDATE users SET avatar=? where user_id=? ";
        $paramType="si";
        $paramValue=array($avatarimg,$user_id);
        $this->db_handle->update($sql,$paramType,$paramValue);
    }
    function getProfile($user_id)
    {
        $sql="SELECT * from users where user_id=?";
        $paramType="i";
        $paramValue=array($user_id);
        $result=$this->db_handle->runQuery($sql,$paramType,$paramValue);
        return $result;
    }

}//end class
?>