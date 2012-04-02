<?php 

function mysql_init(){
	$cfg=parse_ini_file("cfg.ini");
	mysql_connect($cfg[mysql][server],$cfg[mysql][user],$cfg[mysql][pass]);
	mysql_select_db($cfg[mysql][database]);
}

class user{
	//////Admin Functions
	function admin_login($admin_user,$admin_pass){
		$pass_enc=sha1(mysql_real_escape_string($admin_pass)."pyros");
		mysql_init();
		$query=mysql_query("select * from admins where user='".mysql_real_escape_string($admin_user)."' and password='".$pass_enc."'");
		if(mysql_num_rows($query)==0) return false;
		else return true;
	}
	function admin_auth($admin_user,$admin_auth){
		mysql_init();
		$query=mysql_query("select * from admins where user='".mysql_real_escape_string($admin_user)."'");
		if(mysql_num_rows($query)==0) return false;
		elseif($admin_auth!=mysql_result($query,0,auth)) return false;
		else return true;
	}

	
	//////User Functions
	function login($user,$pass){
		$pass_enc=sha1(mysql_real_escape_string($pass)."pyros");
		mysql_init();
		$query=mysql_query("select * from users where (user='".mysql_real_escape_string($user)."' or email='".mysql_real_escape_string($user)."') and password='".$pass_enc."'");
		if(mysql_num_rows($query)==0) return false;
		else return true;
	}
	function auth($user,$auth){
		mysql_init();
		$query=mysql_query("select * from users where user='".mysql_real_escape_string($user)."'");
		if(mysql_num_rows($query)==0) return false;
		elseif($auth!=mysql_result($query,0,auth)) return false;
		else return true;
	}
	
}








?>