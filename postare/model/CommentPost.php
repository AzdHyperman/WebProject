<?php
require_once("controller/DBController.php");
require_once("model/MLogpage.php");
require_once("model/MPostare.php");
class Comentariu{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function addComentariu($post_id,$text_comentariu)
    {
        $query ="INSERT INTO comments(Comentariu, post_id) VALUES (?,?)";
        $paramType="si";
        $paramValue= array($text_comentariu,$post_id);

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;

    }

    function getComments()
    {
        $query="SELECT * FROM comments ORDER BY id_comment";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;

    }
}
?>