<?php
$nomenu=1; include("../includes/header.php");

include("status.php");

if($status==0){ 
	/// Setup MySQL
	echo("MySQL:<hr><form method='post' action='scripts/mysql.php'>
		Server: <input type='text' name='server' value='localhost'><br>
		Username: <input type='text' name='user'><br>
		Password: <input type='password' name='pass'><br>
		Database: <input type='text' name='database' value='openhosting'><p>
		<hr>
		<input type='submit' value='Next'>
		</form>
	");
}
elseif($status==1){ 
	/// Setup admin account
	echo("Root admin account:<hr><form method='post' action='scripts/admin.php'>
		Username: <input type='text' name='user' value='root' readonly><br>
		Email: <input type='text' name='email'><br>
		Password: <input type='password' name='pass'><p>
		<hr>
		<input type='submit' value='Next'>
		</form>
	");
}
elseif($status==2){
	/// Setup some site basics
	echo("Core setup:<hr><form method='post' action='scripts/core.php'>
		Site name: <input type='text' name='title' value='OpenHosting'><br>
		<hr>
		<input type='submit' value='Finish'>
		</form>
	");
}
else header("../index.php");






?>