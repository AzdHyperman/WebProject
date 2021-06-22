<?php
require_once ("controller/DBController.php");
require_once ("model/MPostare.php");
require_once ("model/MLogin.php");
require_once ("model/MLogpage.php");
require_once ("model/MProfilepage.php");
require_once ("model/MComments.php");

$db_handle=new DBController();
$logtoken= new Login();
error_reporting(E_ALL & ~E_NOTICE);
if(!empty($_COOKIE["token"])){
$result=$logtoken->getIdFromToken($_COOKIE["token"]); 
$user_id=$result[0]["user_id"];
$result2=$logtoken->getUsersById($user_id);
$username=$result2[0]["username"];
$avatar=$result2[0]["avatar"];
$rank=$result2[0]["rank"];
}
else { echo "";}
//sa nu afiseze warning 
//mvc handler
$action="";
global $user_id;
global $username;
global $avatar;
global $rank;
global $result;
global $admin;
if(!empty($_GET["action"]))
{
    $action=$_GET["action"];
}
switch ($action)
{   case "login":

    if(isset($_POST["loginbtn"]))
        {echo"is logged in<br>";

        // functiile pentru login 
         $a=$_REQUEST["username"];
         $b=$_REQUEST["password"];
         $login=new Login();
         $result="";
         $result=$login->verifyLogin($a,$b);
         $user_id=$login->user_id;
         echo $login->user_id."<br>";
         echo json_encode($result)."<br>";
         $report=new Logpage();
         $type="login";
         $info="s-a logat user_ul cu user_id: ".$user_id;
         $report->sendLog($type,$info);
         $login->addToken($result,$user_id);
         if(strlen($login->verifyLogin($a,$b))>0){
            setcookie("token",$login->verifyLogin($a,$b),time() + (86400 * 30),"/");
            header("Location: index.php");
        }
        else header("Location: index.php?action=login&message=invalid data");
        }//end if
        
        require_once ("view/login.php");
        break;
    case "logout":
         $logout=new Login();
         $report=new Logpage();
         $type="login";
         $info="s-a delogat user-ul cu user_id ".$user_id;
         $report->sendLog($type,$info);
        // $id=$logout->getIdFromToken($_COOKIE["token"]);
        // setcookie("token",$logout->verifyLogin($a,$b),time() - (86400 * 30),"/");
        $logout->deleteToken($user_id);
        header("Location:index.php?action=login");
        break;
    case "register":
        if(isset($_POST["registerbtn"]))
        {
        $register=new Login();
         $report=new Logpage();
        if(isset($_REQUEST["username"])
            && !empty($_REQUEST["username"]) 
            && isset($_REQUEST["email"])
            && !empty($_REQUEST["email"]) 
            && isset($_REQUEST["password"])
            && !empty($_REQUEST["password"]) 
        ){

    if($register->register($_REQUEST["email"],$_REQUEST["username"],$_REQUEST["password"])){
        $a=$_REQUEST["username"];
        $b=$_REQUEST["password"];
        $result="";
         $result=$register->verifyLogin($a,$b);
         $user_id=$register->user_id;
         $register->addToken($result,$user_id);
        
         $type="login";
         $info="s-a inregistrat user_ul cu user_id: ".$user_id;
         $report->sendLog($type,$info);
    if(strlen($register->verifyLogin($a,$b))>0){
        setcookie("token",$register->verifyLogin($a,$b),time() + (86400 * 30),"/");
        header("Location:index.php");
}

}else  header("Location:index.php?action=register&message=email is already used");

}else header("Location:index.php?action=register&message=invalid data");
    }   
        break;
    case "feedbacks":
        $postari=new Postare();
        $result=$postari->getPostari();
        require_once "view/feedbacks.php";
        break;
    case "raspunde-thread":
        $postare=new Postare();
        $comment=new Comments();
        $post_id=$_GET["post_id"];
        $result=$postare->getPostariById($post_id);
        if(isset($_POST["comment"]))
        {
            //echo "comment adaugat";
            $comm=$_POST["comm"];
            $reply_of=0;
            // echo $username."<br>";
            // echo $post_id."<br>";
            // echo $comm;
            $insertId=$comment->addComment($username,$post_id,$comm,$reply_of);
            
        }
        if(isset($_POST["reply"]))
        {
           // echo "reply adaugat";
            $comm=$_POST["comm"];
            $comm_id=$_POST["comm_id"];
            $insertId=$comment->addComment($username,$post_id,$comm,$comm_id);
           
        
        }
        require_once "view/postareThread.php";
        break;
    case "logpage":
        $logs = new Logpage();
        $users= new Login();
        $userlist=$users->getUsers();

        $result = $logs->getLog();
        //$result= $postare->getPostariById(51);
        require_once "view/admin.php";
        break;
    case "profile":
        if(!empty($user_id)){
        // $user_id=$_GET['user_id'];
        // $user_id=$result;
        //  echo $user_id."<br>";
        echo "";
        }
        else {$user_id=1;}
        $profile=new userProfile();
        $report=new Logpage();
        if(isset($_POST['save-profile']))
        {
            $username=$_POST["username"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            
            $edituser=$profile->editProfile($username,$email, encryptPassword($password),$user_id);
             
         $type="profile";
         $info="s-au facut schimbari la profilul cu user_id: ".$user_id;
         $report->sendLog($type,$info);
            //header("Location:index.php?action=profile");
        }
        if(isset($_POST['save-img']))
        {
            $profileImageName = $_FILES["profileImage"]["name"];
            // For image upload
            $target_dir = "view/imagini/";
            $target_file = $target_dir . basename($profileImageName);
            $profile->uploadPhoto($profileImageName,$user_id);
            if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file))
            {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            
        }
    } 
        $result=$profile->getProfile($user_id);
        require_once "view/profile.php";
        break;
    case "add-postare":
        // if(isset($_POST["add"]))
        // {
            //$postare=new CPostare();
            // $username="defaultUser";//session or cookie
            $text=$_POST['text'];
            $categorie=$_POST['categorie'];
            // $rank="defaultRank";//session or cookie from login()
            $postare = new Postare();
            $insertId=$postare->addPostare($user_id,$username,$rank,$categorie,$text);
            //raport la logpage
            
            $raport= new Logpage();
                $type="achizitie";
                // $post_id=$_GET['post_id'];
                $info="A fost adaugat postarea de la userid: ".$user_id;
                $insertLog=$raport->sendLog($type,$info);
                
            if(empty($insertId))
            {
                $response=array(
                    "message"=> "postarea nu e adaugata",
                    "type"=>"error"
                );
                
                //header("Location: index.php?action=add-postare");
            }else{header ("Location:index.php");
                
                 }
     
        // }//end if add
         $postare = new Postare();
         $result = $postare->getPostari();
         
        require_once "view/home.php";
        
        break;
    case "edit-postare":
        $post_id=$_GET['post_id'];
        $postare=new Postare();

        if(isset($_POST['edit']))
        { 
            $categorie=$_POST["categorie"];
            $text=$_POST["text"];
            
            $postare->editPostare($categorie,$text,$post_id);
            $raport= new Logpage();
            $type="achizitie";
            //$post_id=$_GET['post_id'];
            $info="A fost actualizat postarea";
            $insertLog=$raport->sendLog($type,$info);
            header("Location:index.php");
        }
        $result=$postare->getPostariById($post_id);
        require_once "view/edit-postari.php";
        break;
    case "delete-postare":
        $post_id = $_GET["post_id"];
        $postare=new Postare();
        $comment=new Comments();
        $postare->deletePostarebyID($post_id);
        $raport= new Logpage();
        $type="achizitie";
        //$post_id=$_GET['post_id'];
        $info="A fost stearsa postarea post_id: ".$post_id." de user_id: ".$user_id;
        $insertLog=$raport->sendLog($type,$info);
        $result = $postare->getPostariByUserId($user_id);
        require_once "view/home.php";
        break;
    case "add-comment":
        $comment=new Comments();
        $postare=new Postare();
        $result= $postare->getPostariByUserId($user_id);   
        $post_id=$_POST["post_id"];
        if(isset($_POST["comment"]))
        {
            echo "comment adaugat";
            $comm=$_POST["comm"];
            $reply_of=0;
            echo $username."<br>";
            echo $post_id."<br>";
            echo $comm;
            $insertId=$comment->addComment($username,$post_id,$comm,$reply_of);
            header("Location:index.php");
        }
    if(isset($_POST["reply"]))
    {
        echo "reply adaugat";
        $comm=$_POST["comm"];
        $comm_id=$_POST["comm_id"];
        $insertId=$comment->addComment($username,$post_id,$comm,$comm_id);
        header("Location: index.php");
        
    }
        require_once "view/home.php";
        break;
    case "delete-comment":
        $comment=new Comments();
        $postare=new Postare();
        $comm_id=$_GET["comm_id"];
        $comment->deleteComment($comm_id);
        $result = $postare->getPostariByUserId($user_id);
        require_once "view/home.php";
        break;
    case "edit-comment":
        $comment=new Comments();
        //header edit comment page or direct
        $comment_id=$_GET["comm_id"];
        if(isset($_POST['edit']))
            { 
                // $categorie=$_POST["categorie"];
                $comm=$_POST["comm"];
                
                $comment->editComment($comm,$comment_id);
                $raport= new Logpage();
                $type="achizitie-comment";
                //$post_id=$_GET['post_id'];
                $info="A fost editat comment_id ".$comm_id;
                $insertLog=$raport->sendLog($type,$info);
                header("Location:index.php");
            }
            //  $result=$postare->getPostariById($post_id);
             $commentarii=$comment->getCommentsbyCommId($comment_id);
            require_once "view/edit-comment.php";
        break;
            
    default:
    $logtoken= new Login();
    if(isset($_COOKIE["token"])){
    if($logtoken->verifyToken($_COOKIE["token"]))
    echo "";
    else{ header("Location:index.php?action=login&message=tokenset");
            echo "valori necunoscute";
       }
    }else {header("Location: index.php?action=login");
        
    }
    //setam username userid etc.
    $result=$logtoken->getIdFromToken($_COOKIE["token"]);   
    $user_id=$result[0]["user_id"];
    $result2=$logtoken->getUsersById($user_id);
    $username=$result2[0]["username"];
    $avatar=$result2[0]["avatar"];
    $rank=$result2[0]["rank"];

        // echo $user_id."<br>";
        if(empty($user_id))
        echo "este gol";
        $postare = new Postare();
        $comment= new Comments();
        $result = $postare->getPostari();
        // echo json_encode($result[0]["post_id"])."<br>";
        $result= $postare->getPostariByUserId($user_id);   
        // $comments=$comment->getCommentsById($post_id);
        //am apelati in home php pentru a gasi post_id direct acolo
        require_once "view/home.php";    
        break;

}//end switch


?>