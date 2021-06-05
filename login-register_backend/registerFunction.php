<?php
include_once "database.php";
$db=new database();
if(isset($_REQUEST["registerNume"])
&& !empty($_REQUEST["registerNume"]) 
&& isset($_REQUEST["registerEmail"])
&& !empty($_REQUEST["registerEmail"]) 
&& isset($_REQUEST["registerPassword"])
&& !empty($_REQUEST["registerPassword"]) 
){

    if($db->register($_REQUEST["registerEmail"],$_REQUEST["registerNume"],$_REQUEST["registerPassword"])){
        $a=$_REQUEST["registerEmail"];
        $b=$_REQUEST["registerPassword"];
    if(strlen($db->verifyLogin($a,$b))>0){
        setcookie("token",$db->verifyLogin($a,$b),time() + (86400 * 30),"/");
        header("Location:./home.php");
}

}else  header("Location:./login.php?message=email is already used");

}else header("Location:./login.php?message=invalid data");
?>