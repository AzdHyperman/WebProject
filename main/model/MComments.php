<?php
require_once("controller/DBController.php");
require_once("model/MLogpage.php");
class Comments{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }
    function addComment($username,$post_id,$text,$reply_of)
    {
        $sql="INSERT INTO comments (username,post_id,text,reply_of) VALUES(?,?,?,?)";
        $paramType="sisi";
        $paramValue=array($username,$post_id,$text,$reply_of);
        //reply of =0 daca raspunde direct pe postare >0 daca e reply
        $insertId=$this->db_handle->insert($sql,$paramType,$paramValue);
        return $insertId;
    }
    function editComment($text,$comm_id){
        $sql="UPDATE comments SET text=? where comm_id=?";
        $paramType="si";
        $paramValue=array($text,$comm_id);

        $this->db_handle->update($sql,$paramType,$paramValue);

    }
    function getCommentsByCommId($comm_id) {
        $query = "SELECT * FROM comments WHERE comm_id = ?";
        $paramType = "i";
        $paramValue = array(
            $comm_id
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function deleteComment($comm_id){
        $sql="DELETE FROM comments where comm_id=?";
        $paramType="i";
        $paramValue=array($comm_id);

        $result=$this->db_handle->update($sql,$paramType,$paramValue);
    }
    function getComments(){
        $sql="SELECT * FROM comments";
        $result=$this->db_handle->runBaseQuery($sql);
        return $result;  
    }
    function getCommentsById($post_id) {
        $query = "SELECT * FROM comments WHERE post_id = ?";
        $paramType = "i";
        $paramValue = array(
            $post_id
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }




}//end class

?>