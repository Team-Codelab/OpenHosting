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

$c=parse_ini_file($home."/includes/cfg.ini",true);
mysql_connect($c["mysql"]["server"],$c["mysql"]["user"],$c["mysql"]["pass"]);
mysql_select_db($c["mysql"]["database"]);

?>