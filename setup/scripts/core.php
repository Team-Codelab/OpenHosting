<?php

include("../../cfg_ini.class.php");
include("../../log.class.php");

$cfg=new ini();
$log=new log();
$cfg->add(core, title, $_POST['title']);
$log->admin_action(0, 'Set core value: title: '.$_POST['title']);

$status=fopen("../status.php",'w');
fwrite($status,'<?php $status=3 ?>');
fclose($status);
header("../../admin/index.php");

?>