<?php
require_once("controller/DBController.php");
class Login {

    function __construct(){
        $this->conn=new DBController();
    }

    // public function verifyLogin($email,$parola){
    //     $sql = "SELECT * FROM user WHERE (Email='$email' and Parola='$parola')";	
    //     $result = mysqli_query($this->conn,$sql) or die("Bad query $sql");
    //     $resultCheck = mysqli_num_rows($result);
    //     $conn=$email.$parola."secretcode";
    
    //     if($row = mysqli_fetch_assoc($result))
    //     $iduser=$row["iduser"];
    //     $this->iduser=$iduser;
    //     if($resultCheck>0){
    //         $this->addToken(md5($conn),$iduser);
    //         return md5($conn);
            
    //         }
    //     else return "";
    
    // }
    function verifyLogin($username,$parola)
    {
        $sql = "SELECT * FROM users WHERE username=? and password=?";	
        $paramType="ss";
        $paramValue=array($username,$parola);
        $result=$this->conn->runQuery($sql,$paramType,$paramValue);
        if($row = mysqli_fetch_assoc($result))
        $user_id=$row["user_id"];
         $this->user_id=$user_id;
        
        
        return $result;
        $this->addToken(md5($conn),$user_id);
        echo "login verified<br>";
        }
    

    public function verifyToken($token){
        $check = false;
        $stmt = mysqli_prepare($this->conn, "SELECT * from tokens where token=?"); 
        mysqli_stmt_bind_param($stmt, 's', $token);
        mysqli_stmt_execute($stmt);
        $stmt->store_result();
        if($stmt -> num_rows > 0)
        $check=true;
    return $check;    
    }

    public function getIdFromToken($token){
        $sql = "SELECT * FROM tokens WHERE token='$token'";	
        $result = mysqli_query($this->conn,$sql) or die("Bad query $sql");
        $resultCheck = mysqli_num_rows($result);
        if($row = mysqli_fetch_assoc($result)){
        $user_id=$row["user_id"];
        }
        return $user_id;
    
    }


    public function addToken($token,$user_id){
        $check = $this->verifyToken($token);
        if(!$check){
        $stmt = mysqli_prepare($this->conn, "INSERT INTO tokens (user_id,token) VALUES (?,?)"); 
            mysqli_stmt_bind_param($stmt, 'is', $user_id,$token);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
        }
    }

    public function verifyEmail($email){
        $stmt=mysqli_prepare($this->conn,"select * from users where email=?");
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $stmt->store_result();
        if($stmt->num_rows>0)
            return false;
        return true;
    }

    public function register($email, $username, $parola){
        if($this->verifyEmail($email)){
        $parola_criptata=md5($parola);
        // $stmt= mysqli_prepare($this->conn,"INSERT INTO user (Email, Nume, Parola) VALUES (?,?,?) ");
        // mysqli_stmt_bind_param($stmt, 'sss', $email, $nume, $parola);
        // mysqli_stmt_execute($stmt);
        // mysqli_stmt_close($stmt);
        $sql="INSERT INTO user (username, parola) VALUES (?,?)";
        $paramType="ss";
        $paramValue=array($username,$parola);
        return true;
    }return false;
    }

    public function deleteToken($user_id){
        $stmt = mysqli_prepare($this->conn,"delete from tokens where user_id=?");
        mysqli_stmt_bind_param($stmt,'i',$user_id);
        mysqli_stmt_execute($stmt);
        return true;
    }
}
?>