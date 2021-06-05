<?php
    include_once "database.php";
    $db = new database();
    
    $a=$_REQUEST["loginEmail"];
    $b=$_REQUEST["loginPassword"];
    
    
    
    if(strlen($db->verifyLogin($a,$b))>0){
        setcookie("token",$db->verifyLogin($a,$b),time() + (86400 * 30),"/");
        header("Location:./home.php");
    }
    else header("Location:./home.php?message=invalid data");
?>