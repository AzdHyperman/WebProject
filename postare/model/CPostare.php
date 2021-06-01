<?php
require_once("controller/DBController.php");

class Postare{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function addPostare($username,$rank,$categorie,$text)
    {
    $query="INSERT INTO postari (username,rank,categorie,text) VALUES (? , ? , ? , ?)";
    $paramType="ssss";
    $paramValue= array($username,$rank,$categorie,$text);

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

    function editPostare($username,$rank,$categorie,$text,$post_id)
    {
        $query = "UPDATE postari SET username = ?,rank = ?,categorie = ?,text = ? WHERE post_id = ?";
        $paramType = "sssi";
        $paramValue = array(
            $username,$rank,$categorie,$text,$post_id
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
            $post_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
}

?>