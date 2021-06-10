<?php
require_once("controller/DBController.php");
class Login {

    function __construct(){
        $this->conn=new DBController();
    }


    // function verifyLogin($username,$password)
    // {
    //     $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";	
    //     $result = mysqli_query($this->conn,$sql) or die("Bad query $sql");
    //     $resultCheck = mysqli_num_rows($result);
    //     $conn=$email.$parola."secretcode";
    
    //     if($row = mysqli_fetch_assoc($result))
    //     $iduser=$row["user_id"];
    //     // $this->iduser=$iduser;
    //     if($resultCheck>0){
    //         $this->addToken(md5($conn),$iduser);
    //         return md5($conn);
            
    //         }
    //     else return "";
    //     }
    function verifyLogin($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username=? and password=?";	   
        $paramType="ss";
        $paramValue=array($username,$password);
        $conn=$username.$password."secretcode";
        $result=$this->conn->runQuery($sql,$paramType,$paramValue);
        $user_id=$result[0]["user_id"];
        if($result>0)
        $this->addToken(md5($conn),$user_id);
        // return md5($conn);
        return $user_id;
         
    }

     function verifyToken($token){
        $check = false;
        // $stmt = mysqli_prepare($this->conn, "SELECT * from tokens where token=?"); 
        // mysqli_stmt_bind_param($stmt, 's', $token);
        // mysqli_stmt_execute($stmt);
        // $stmt->store_result();
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
        // $result = mysqli_query($this->conn,$sql) or die("Bad query $sql");
        // $resultCheck = mysqli_num_rows($result);
        // if($row = mysqli_fetch_assoc($result)){
        // $user_id=$row["user_id"];
        // }
        // return $user_id;
    
    }


     function addToken($token,$user_id){
        $check = $this->verifyToken($token);
        if(!$check){
        $sql="INSERT INTO tokens (user_id,token) VALUES (?,?)";
        $paramType="is";
        $paramValue=array($token,$user_id);

        $insertId=$this->conn->insert($sql,$paramType,$paramValue);
        return $insertId;
    
        }
    }

     function verifyEmail($email){
        $stmt=mysqli_prepare($this->conn,"select * from users where email=?");
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $stmt->store_result();
        if($stmt->num_rows>0)
            return false;
        return true;
    }

     function register($email, $username, $parola){
        if($this->verifyEmail($email)){
        $parola_criptata=md5($parola);
        // $stmt= mysqli_prepare($this->conn,"INSERT INTO user (Email, Nume, Parola) VALUES (?,?,?) ");
        // mysqli_stmt_bind_param($stmt, 'sss', $email, $nume, $parola);
        // mysqli_stmt_execute($stmt);
        // mysqli_stmt_close($stmt);
        $sql="INSERT INTO user (username, parola) VALUES (?,?)";
        $paramType="ss";
        $paramValue=array($username,$parola);
        $insertId=$this->conn->insert($sql,$paramType,$paramValue);
        return true;
    }return false;
    }

     function deleteToken($user_id){
        // $stmt = mysqli_prepare($this->conn,"delete from tokens where user_id=?");
        // mysqli_stmt_bind_param($stmt,'i',$user_id);
        // mysqli_stmt_execute($stmt);
        $sql="DELETE FROM tokens where user_id=?";
        $paramType="i";
        $paramValue=array($user_id);
        $result=$this->conn->update($sql,$paramType,$paramValue);
        return true;
    }
}
?>