<?php

function home(){
	$dir=getcwd();
	if(strpos($dir,'/admin/scripts')!=false) $home="../../";
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
	return $home;
}

class log {
	function admin_action($uid,$user,$action){
		include(home()."/includes/mysql.init.php");
		if($uid==null){
			$query=mysql_query("select id from admins where user='$user'");
			$uid=mysql_result($query,0,id);
		}
		$query=mysql_query("select id from log_ip where ip='".$_SERVER['remote_addr']."'");
		mysql_query("insert into log_admin_actions (uid,iid,action) values (".mysql_real_escape_string($uid).",".mysql_result($query,0,id).",'".mysql_real_escape_string($action)."')");
	}
}

?>