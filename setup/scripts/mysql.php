<?php

$server=$_POST['server'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$database=$_POST['database'];

mysql_connect($server,$user,$pass) or die("MySQL Could not connect to the server with the given details. Go back and retry details.");
mysql_query("drop database if exists ".$database);
mysql_query("create database ".$database);
mysql_select_db($database);

// Admins
mysql_query("create table admins (
	id int(11) unique auto_increment primary key not null,
	user varchar(64) not null unique,
	pass varchar(64) not null,
	auth varchar(32) not null,
	email varchar(64) not null,
	first_name varchar(64),
	last_name varchar(64),
	contact_number varchar(16),
	level int(1) not null default 1
)");
// Users and products
mysql_query("create table users (
	id int(11) unique auto_increment primary key not null,
	user varchar(64) not null unique,
	pass varchar(64) not null,
	auth varchar(32) not null,
	email varchar(64) not null,
	first_name varchar(64) not null,
	last_name varchar(64) not null,
	company varchar(64),
	house varchar(32) not null,
	address_1 varchar(32) not null,
	city varchar(32) not null,
	country varchar(32) not null,
	postcode varchar(32) not null,
	contact_number varchar(16) not null
)");
mysql_query("create table products(
	id int(11) unique auto_increment primary key not null,
	title varchar(64) not null,
	description varchar(1024) not null,
	1m_cost int(3) not null,
	3m_cost int(3) not null,
	6m_cost int(3) not null,
	12m_cost int(3) not null,
	available int(11),
	purchased int(11) not null default 0
)");
mysql_query("create table services(
	id int(11) unique auto_increment primary key not null,
	uid int(11) not null,
	pid int(2) not null,
	purchased_timestamp int(32) not null,
	activated int(1) not null default 0,
	suspended int(1) not null default 0,
	expired int(1) not null default 0,
	expired_timestamp int(32) not null
)");
mysql_query("create table invoices(
	id int(11) unique auto_increment primary key not null,
	uid int(11) not null,
	sid int(11) not null,
	owed int(4) not null,
	paid int(1) not null default 0,
	defaulted int(1) not null
)");
// Logs
mysql_query("create table log_emails(
	id int(11) unique auto_increment primary key not null,
	template int(2) not null,
	uid int(11) not null,
	timestamp int(32) not null
)");
mysql_query("create table log_ips(
	id int(11) unique auto_increment primary key not null,
	ip varchar(15) unique not null
)");
mysql_query("create table log_admin_logins(
	id int(11) unique auto_increment primary key not null,
	uid int(11) not null,
	iid int(11) not null,
	timestamp int(32) not null
)");
mysql_query("create table log_user_logins(
	id int(11) unique auto_increment primary key not null,
	uid int(11) not null,
	iid int(11) not null,
	timestamp int(32) not null
)");
mysql_query("create table log_admin_actions(
	id int(11) unique auto_increment primary key not null,
	action varchar(64) not null,
	uid int(11) not null,
	iid int(11) not null,
	timestamp int(32) not null
)");
mysql_query("create table log_user_actions(
	id int(11) unique auto_increment primary key not null,
	action varchar(64) not null,
	uid int(11) not null,
	iid int(11) not null,
	timestamp int(32) not null
)");

$status=fopen("../status.php");
fwrite($status,'\<?php \$status=1 ?\>');
header("location:../index.php");

?>