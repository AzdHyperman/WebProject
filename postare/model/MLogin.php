<?php
require_once("controller/DBController.php");
require_once("model/Encryption.php");
class Login {

    function __construct(){
        $this->conn=new DBController();
    }

    function verifyLogin($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username=? and password=?";	   
        $paramType="ss";
        $parola_criptata = encryptPassword($password);
        $paramValue=array($username,$parola_criptata);
        $conn=$username.$password."secretcode";
        $result=$this->conn->runQuery($sql,$paramType,$paramValue);
        $user_id=$result[0]["user_id"];
        $this->user_id=$user_id;
        // echo $user_id."<br>";
        if($result>0)
        //  $this->addToken(md5($conn),$user_id);
         return md5($conn);
        //  return $result;
         
    }
    function getUsersById($user_id)
    {
        $sql="SELECT * FROM users where user_id=?";
        $paramType="i";
        $paramValue=array($user_id);
        $result2=$this->conn->runQuery($sql,$paramType,$paramValue);
        return $result2;
    }
    function getUsers()
    {
        $sql="SELECT * FROM users order by user_id";
        $result=$this->conn->runBaseQuery($sql);
        return $result;
    }
     function verifyToken($token){
        $check = false;
        $sql="SELECT * from tokens where token=?";
        $paramType="s";
        $paramValue=array($token);

        $result=$this->conn->runQuery($sql,$paramType,$paramValue);
        if($result> 0)
        $check=true;
        return $check;    
    }

     function getIdFromToken($token){
        $sql = "SELECT * FROM tokens WHERE token=?";	
        $paramType="s";
        $paramValue=array($token);
        $result=$this->conn->runQuery($sql,$paramType,$paramValue);
        return $result;
    
    }


     function addToken($token,$user_id){
        $check = $this->verifyToken($token);
        if(!$check){
        $sql="INSERT INTO tokens (user_id,token) VALUES (?,?)";
        $paramType="is";
        $paramValue=array($user_id,$token);

        $insertId=$this->conn->insert($sql,$paramType,$paramValue);
        return $insertId;
    
        }
    }

     function verifyEmail($email){
        $sql="SELECT * FROM users where email=?";
        $paramType="s";
        $paramValue=array($email);
        $result=$this->conn->runQuery($sql,$paramType,$paramValue);
        if($result>0)
            return false;
        return true;
    }

     function register($email, $username, $parola){
        if($this->verifyEmail($email)){
        $parola_criptata=encryptPassword($parola);
        $sql="INSERT INTO users (email,username,password) VALUES (?,?,?)";
        $paramType="sss";
        $paramValue=array($email,$username,$parola_criptata);
        $insertId=$this->conn->insert($sql,$paramType,$paramValue);
        return true;
    }return false;
    }

     function deleteToken($user_id){
        $sql="DELETE FROM tokens where user_id=?";
        $paramType="i";
        $paramValue=array($user_id);
        $result=$this->conn->update($sql,$paramType,$paramValue);
        return true;
    }
}
?>