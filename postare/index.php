<?php
require_once ("controller/DBController.php");
require_once ("model/MPostare.php");
require_once ("model/MLogin.php");

$db_handle=new DBController();
//mvc handler
$action="";
if(!empty($_GET["action"]))
{
    $action=$_GET["action"];
}
switch ($action)
{   case "login":
    if(isset($_POST["loginbtn"]))
        {echo"is logged in<br>";
        $login=new Login();
        // functiile pentru login 
        
        }//end if
        break;
    case "logout":
        if(isset($_POST["logoutbtn"]))
        {
        echo "you logged out<br>";
        $login=new Login();

        // functiile pentru logout 
        }
        break;
    case "register":
        if(isset($_POST["registerbtn"]))
        echo"you're gonna register<br>";
        break;
    case "feedbacks":
        header("Location: view/feedbacks.php");
    case "add-postare":
        if(isset($_POST["add"]))
        {
            //$postare=new CPostare();
            $username=$_POST['username'];
            $text=$_POST['text'];
            $categorie=$_POST['categorie'];
            $rank=$_POST['rank'];
            $postare = new Postare();
            $insertId=$postare->addPostare($username,$rank,$categorie,$text);
            if(empty($insertId))
            {
                $response=array(
                    "message"=> "postarea nu e adaugata",
                    "type"=>"error"
                );
                header("Location: index.php?action=add-postare");
            }else{header ("Location:index.php");}
        }//end if add
         $postare = new Postare();
         $result = $postare->getPostari();
        require_once "view/home.php";
        break;
    case "edit-postare":
        $post_id=$_GET['post_id'];
        $postare=new Postare();

        if(isset($_POST['edit']))
        { 
            $username=$_POST["username"];
            $rank=$_POST["rank"];
            $categorie=$_POST["categorie"];
            $text=$_POST["text"];
            
            $postare->editPostare($username,$rank,$categorie,$text,$post_id);
            header("Location:index.php");
        }
        $result=$postare->getPostariById($post_id);
        require_once "view/edit-postari.php";
        break;
    case "delete-postare":
        $post_id = $_GET["post_id"];
        $postare=new Postare();
        $postare->deletePostarebyID($post_id);
        
        $result = $postare->getPostari();
        require_once "view/postari.php";
        break;

    default:
        $postare = new Postare();
        $result = $postare->getPostari();
        //$result= $postare->getPostariById(51);
        require_once "view/home.php";
        break;

}//end switch


?>