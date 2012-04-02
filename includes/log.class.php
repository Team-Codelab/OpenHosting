<?php

class log {
	function admin_action($uid,$user,$action){
		if($uid==0){
			$query=mysql_query("select id from admins where user='$user'");
			$uid=mysql_result($query,0,id);
		}
		$query=mysql_query("select id from log_ip where ip='".$_SERVER['remote_addr']."'");
		mysql_query("insert into log_admin_actions (uid,iid,action) values (".mysql_real_escape_string($uid).",".mysql_result($query,0,id).",".mysql_real_escape_string($action).")");
	}
	
	
}

?>