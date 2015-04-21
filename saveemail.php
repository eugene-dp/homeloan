<?php

include("admin/includes/config.php");
include("admin/includes/functions.php");
dbconnect();
$date=date('Y-m-d');


// check the duplication

$sql_check  =  "select * from  email where email = '".$_REQUEST['name']."' ";
$rs_check   =  mysql_query($sql_check);
$no_check   =  mysql_num_rows($rs_check);
if($no_check == 0){


Query("INSERT INTO email(
id ,
email, date
)
VALUES (
NULL , '".$_REQUEST['name']."','$date'
)");
echo "saved successfully";
}else{
echo "Duplicate";
}

?>