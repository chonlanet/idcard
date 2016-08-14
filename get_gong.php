<?php
header("Access-Control-Allow-Origin: *");
set_time_limit(0); //Unlimited max execution time
header('Content-type: application/json');
require_once("../config.php");

if(isset($_GET['id'])){
    $mysqli = new mysqli($host, $usr, $pwd, $db_name);
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit;
    }
    $resultArray = array();
    $mysqli->set_charset("utf8");
    $sql ="SELECT * FROM dep WHERE div_id='".$_GET['id']."'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_array()){
      $arrCol = array();
      $arrCol["g_id"] = $row['id'];
      $arrCol["g_name"] = $row['Project_gong'];
        array_push($resultArray,$arrCol);
     }
     echo json_encode($resultArray);
    $result->free;
    $mysqli->close;
}else{
  ?>
   Sytax used : get_gong.php?id=x
   return value
   g_id = gond id
   g_name = name of gong



<?php
}
?>