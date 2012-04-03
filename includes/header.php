<?php
echo("<html><head>");
echo("<title>$title :: Zarkov Hosting</title>");
echo("<style>
	body{font-size: 14; font-family: courier;background:#FFFFFF;}
	a{text-decoration: none; color: #EC3D00;}
	img{border: none;}
	
	a.menu{font-size:30px; font-type:bold;}
	div#menu{height: 30px; padding: 10px; border-left: dotted 1px; float: left; vertical-align: middle;}
	
</style>");
echo("</head><body>");
if(!$nomenu){
	$id=0;
	include("menu.php");
}
include("log.class.php");
$log = new log();
$log->ip();
?>