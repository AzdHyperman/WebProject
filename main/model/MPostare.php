<?php
require_once("controller/DBController.php");
require_once("model/MLogpage.php");
class Postare
{

    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function addPostare($user_id,$username,$rank,$categorie,$text)
    {
    $query="INSERT INTO postari (user_id,username,rank,categorie,text) VALUES (?, ? , ? , ? , ?)";
    $paramType="issss";
    $paramValue= array($user_id,$username,$rank,$categorie,$text);

    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
    
    }//end addPostare

    function deletePostarebyID($post_id)
    {
        $query="DELETE FROM postari WHERE post_id=?";
        $paramType="i";
        $paramValue=array(
            $post_id
        );
        $result=$this->db_handle->update($query,$paramType,$paramValue);

    }//end deletePost

    function editPostare($categorie,$text,$post_id)
    {
        $query = "UPDATE postari SET categorie = ?,text = ? WHERE post_id = ?";
        $paramType = "ssi";
        $paramValue = array(
            $categorie,$text,$post_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }//end edit
    function getPostari(){
        $query="SELECT * FROM postari ORDER BY post_id";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }
    function getPostariById($post_id) {
        $query = "SELECT * FROM postari WHERE post_id = ?";
        $paramType = "i";
        $paramValue = array(
            $post_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getPostariByUserId($user_id) {
        $query = "SELECT * FROM postari WHERE user_id = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    //add
}

?>