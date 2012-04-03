<?php

$cfg=parse_ini_file("cfg.ini");
mysql_connect($cfg[mysql][server],$cfg[mysql][user],$cfg[mysql][pass]) or die("MySQL Could not connect using server '".$cfg[mysql][server]."' and username '".$cfg[mysql][user]."'. Please contact an admin.");
mysql_select_db($cfg[mysql][database]) or die("MySQL Could not use the configured database. Please contact an admin.");

?>