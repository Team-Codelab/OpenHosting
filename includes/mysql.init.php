<?php

$cfg=parse_ini_file("cfg.ini");
mysql_connect($cfg[mysql][server],$cfg[mysql][user],$cfg[mysql][pass]);
mysql_select_db($cfg[mysql][database]);

?>