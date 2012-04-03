<?php

$dir=getcwd();
if(strpos($dir,'/admin/scripts')!=false) $home="../../";			/// Home code
elseif(strpos($dir,'/admin')!=false) $home="../";
elseif(strpos($dir,'/manager/scripts')!=false) $home="../../";
elseif(strpos($dir,'/manager')!=false) $home="../";
elseif(strpos($dir,'/setup/scripts')!=false) $home="../../";
elseif(strpos($dir,'/setup')!=false) $home="../";
elseif(strpos($dir,'/support/scripts')!=false) $home="../../";
elseif(strpos($dir,'/support')!=false) $home="../";
elseif(strpos($dir,'/includes/admin')!=false) $home="../../";
elseif(strpos($dir,'/includes/manager')!=false) $home="../../";
elseif(strpos($dir,'/includes/modules')!=false) $home="../../";
elseif(strpos($dir,'/includes')!=false) $home="../";
else $home=".";

$cfg=parse_ini_file("$home/includes/cfg.ini");
mysql_connect($cfg["mysql"]["server"],$cfg["mysql"]["user"],$cfg["mysql"]["pass"]) or die("MySQL Could not connect. Please contact an admin.");
mysql_select_db($cfg["mysql"]["database"]) or die("MySQL Could not use the configured database. Please contact an admin.");

?>