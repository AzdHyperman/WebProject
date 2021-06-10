<?php
class database{
private $dbServerName = "localhost";
private $dbUserName = "root";
private $dbPassword = "";
private $dbName = "users";
private $conn; 
private $iduser;

    function __construct(){

        $this->dbServerName = "localhost";
        $this->dbUserName = "root";
        $this->dbPassword = "";
        $this->dbName = "users";
        $this->conn = mysqli_connect($this->dbServerName,$this->dbUserName, $this->dbPassword,$this->dbName);
        if(!$this->conn)
        {
            die("Nu se poate conecta la baza de date");
        }
        return $this->conn;
    }


    public function verifyLogin($email,$parola){
        $parola_verificare_query = "SELECT Parola FROM user WHERE Email='$email' limit 1;";
        $result_parola =  mysqli_query($this->conn,$parola_verificare_query) or die("Bad query $parola_verificare_query");
        $row_parola = mysqli_fetch_row($result_parola);
        $verify_parola = password_verify($parola, $row_parola[0]);
        if($verify_parola)
        {
            $sql = "SELECT * FROM user WHERE Email='$email';";
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

    public function getEmailFromToken($token){
        $id=$this->getIdFromToken($token);
        $sql = "SELECT * FROM user WHERE iduser='$id'";
        $result=mysqli_query($this->conn,$sql) or die ("Bad query $sql");
        $resultCheck = mysqli_num_rows($result);
        if($row = mysqli_fetch_assoc($result)){
        
    
            return $row["Email"];
        }
        
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
        $parola_criptata = password_hash($parola,PASSWORD_BCRYPT);
        $stmt= mysqli_prepare($this->conn,"INSERT INTO user (Email, Nume, Parola) VALUES (?,?,?) ");
        mysqli_stmt_bind_param($stmt, 'sss', $email, $nume, $parola_criptata);
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