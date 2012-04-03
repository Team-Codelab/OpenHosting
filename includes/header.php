<?php
echo("<html><head>");
echo("<title>$title :: Zarkov Hosting</title>");
echo("<style>
	body{font-size: 14; font-family: courier;background:#FFFFFF;}
	a{text-decoration: none; color: #EC3D00;}
	img{border: none;}
	
	a.menu{font-size:30px; font-type:bold; color: white;}
	div#menu{height: 30px; padding: 10px; border-left: dotted 1px; float: left; vertical-align: middle;}
	div#body{width: 80%; height: 50px; background-color: #B4CDCD; padding: 15px; margin-right: auto; margin-left: auto; font-size: 15px;}
	
</style>");
echo("</head><body>");
include("error.php");
if(!$nomenu){ $id=0; include("menu.php"); }
include("log.class.php");
$log = new log();
$log->ip();
?>