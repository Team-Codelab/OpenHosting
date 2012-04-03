<?php

if($_GET["E"]>=1) error($_GET["E"]);

function error($n){
	$errors=array();
	$errors[1]=="Bad login";
	$errors[2]=="";
	
	echo("<div style='width:100%; height: 20px; top: 0px;' id='error'>Error $n: ".$errors[$n]." <div style='float: right;'><a href='javascript: document.getElementById(".'"error"'.").style.display=none'>X</a></div></div>");
}











?>