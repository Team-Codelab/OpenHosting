<?php

include("../../includes/admin/admin_auth.php");
$type=$_POST["type"];
$title=$_POST["title"];
$desc=$_POST["description"];
$cost=$_POST["cost"];
if($_POST["available"]!=NULL){ $limited=1; $available=$_POST["available"]; }

mysql_query("insert into products (type,title,description,1m_cost,3m_cost,6m_cost,12m_cost) values ('$type','$title','$desc',$cost,($cost*3),($cost*6),($cost*12))");
if($limited) mysql_query("update products set available=$available where id=".mysql_insert_id());
header("../config.php");

?>