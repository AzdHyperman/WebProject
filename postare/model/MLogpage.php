<?php
require_once("controller/DBController.php");

class Logpage{

    function __construct()
    {
        $this->dbhandle=new DBController();
    }
//logare,postare,edit,delete
    function sendLog($type,$info,$username,$user_id)
    {
        $query="INSERT INTO logpage (type,info,username,user_id) VALUES (?,?,?,?)";
        $paramType="sssi";
        $paramValue=array($type,$info,$username,$user_id);

        $insertId=$this->db_handle->insert($query,$paramValue,$paramValue);
        return $insertId;
    }
    function getLog()
    {
        $query="SELECT * FROM logpage ORDER BY date";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }//type :report info: Limbaj neadecvat user:john1111 user_id:122 data:10.12.2021 20:59
    //type: postare info: titlu postare blabla user:john1234 user_id:212 data:
    //type: logare info:logare
    function saveToCSV()
    {
//         $result = mysql_query('SELECT * FROM `employee_data`');
// if (!$result) die('Couldn\'t fetch records');
        
$result=getLog();
$num_fields = mysql_num_fields($result);
$headers = array();
for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysql_field_name($result , $i);
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}
    }
}//end class

?>