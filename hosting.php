<?php
$title="Hosting packages";
include("includes/header.php");
echo("<div id='body'>");

include("includes/mysql.init.php");
$products=mysql_query("select * from products where tpye='hosting'");
for($z=0;$z<mysql_num_rows($products);$z++){
	if($z!=0 && $z%3==0) echo("<p>");
	echo("<div style='float:left; width: 25%;'>
		<div style='width: 100%;'><h3>".mysql_result($products,$z,title)."</h3></div>
		<div style='width: 100%; height:30px; background-color: #E3A869;'>&pound;".mysql_result($products,$z,"1m_cost")." monthly</div><p>
		<div style='width: 100%;'>".mysql_result($products,$z,description)."</div>
		<div style='width: 100%;'><a href='buy.php?product=".mysql_result($products,$z,id)."'>Buy");if(mysql_result($products,$z,available)!=null) echo(" (".mysql_result($products,$z,available)." available)");echo("</a></div>
	</div>");
	$x++;
}

echo("</div>");
?>