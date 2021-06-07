<?php
require_once("controller/DBController.php");
class Login {

    function __construct(){
        $this->conn=new DBController();
    }

    public function verifyLogin($email,$parola){
        $sql = "SELECT * FROM user WHERE (Email='$email' and Parola='$parola')";	
        $result = mysqli_query($this->conn,$sql) or die("Bad query $sql");
        $resultCheck = mysqli_num_rows($result);
        $conn=$email.$parola."secretcode";
    
        if($row = mysqli_fetch_assoc($result))
        $iduser=$row["iduser"];
        $this->iduser=$iduser;
        if($resultCheck>0){
            $this->addToken(md5($conn),$iduser);
            return md5($conn);
            
            }
        else return "";
    
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
        $iduser=$row["iduser"];
        
    }return $iduser;
    
    }


    public function addToken($token,$iduser){
        $check = $this->verifyToken($token);
        if(!$check){
        $stmt = mysqli_prepare($this->conn, "INSERT INTO tokens (iduser,token) VALUES (?,?)"); 
            mysqli_stmt_bind_param($stmt, 'is', $iduser,$token);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
        }
    }

    public function verifyEmail($email){
        $stmt=mysqli_prepare($this->conn,"select * from user where Email=?");
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $stmt->store_result();
        if($stmt->num_rows>0)
            return false;
        return true;
    }

    public function register($email, $nume, $parola){
        if($this->verifyEmail($email)){
        $parola_criptata=md5($parola);
        $stmt= mysqli_prepare($this->conn,"INSERT INTO user (Email, Nume, Parola) VALUES (?,?,?) ");
        mysqli_stmt_bind_param($stmt, 'sss', $email, $nume, $parola);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    return true;
    }return false;
    }

    public function deleteToken($iduser){
        $stmt = mysqli_prepare($this->conn,"delete from tokens where iduser=?");
        mysqli_stmt_bind_param($stmt,'i',$iduser);
        mysqli_stmt_execute($stmt);
        return true;
    }
}
?>