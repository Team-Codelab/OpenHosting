<?php 

class user{
	function login($user,$pass){
		$pass_enc=sha1(mysql_real_escape_string($pass)."pyros");
		$cfg=parse_ini_file("cfg.ini");
		mysql_connect($cfg[mysql][server],$cfg[mysql][user],$cfg[mysql][pass]);
		mysql_select_db($cfg[mysql][database]);
		$query=mysql_query("select * from users where (user='".mysql_real_escape_string($user)."' or email='".mysql_real_escape_string($user)."') and password='".$pass_enc."'");
		if(mysql_num_rows($query)==0) return false;
		else return true;
	}
	
}








?>