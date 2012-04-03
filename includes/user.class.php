<?php 

include("mysql.init.php");

class user{

	//////Admin Functions
	function admin_login($admin_user,$admin_pass){
		$pass_enc=sha1(mysql_real_escape_string($admin_pass."pyrosine"));
		$user_query=mysql_query("select * from admins where user='".mysql_real_escape_string($admin_user)."' and pass='".$pass_enc."'");
		if(mysql_num_rows($user_query)==0) return false;
		else return true;
	}
	function admin_auth($admin_user,$admin_auth){
		$query=mysql_query("select * from admins where user='".mysql_real_escape_string($admin_user)."'");
		if(mysql_num_rows($query)==0) return false;
		elseif($admin_auth!=mysql_result($query,0,auth)) return false;
		else return true;
	}
	function admin_auth_gen($admin_user){
		$auth=md5(time());
		mysql_query("update admins set auth='$auth' where user='$admin_user'");
		return $auth;
	}
	function admin_uid($admin_user){
		$query=mysql_query("select id from admins where user='".mysql_real_escape_string($admin_user)."'");
		return mysql_result($query,0,id);
	}

	
	//////User Functions
	function login($user,$pass){
		$pass_enc=sha1(mysql_real_escape_string($pass."pyrosine"));
		$query=mysql_query("select * from users where (user='".mysql_real_escape_string($user)."' or email='".mysql_real_escape_string($user)."') and pass='".$pass_enc."'");
		if(mysql_num_rows($query)==0) return false;
		else return true;
	}
	function auth($user,$auth){
		$query=mysql_query("select * from users where user='".mysql_real_escape_string($user)."'");
		if(mysql_num_rows($query)==0) return false;
		elseif($auth!=mysql_result($query,0,auth)) return false;
		else return true;
	}
	function auth_gen($user){
		$auth=md5(time());
		mysql_query("update users set auth='$auth' where user='$user'");
		return $auth;
	}
	function uid($user){
		$query=mysql_query("select id from users where user='".mysql_real_escape_string($user)."'");
		return mysql_result($query,0,id);
	}
	
}








?>