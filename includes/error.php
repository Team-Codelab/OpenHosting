<?php

if($_GET["E"]>=1) error($_GET["E"]);

function error($n){
	$errors[1]="Bad login";
	$errors[2]="";
	
	echo("<div style='width:100%; height: 30px; top: 0px; background-color: red;' id='error'><font style='color: white; font-size: 20px;'>Error #$n: ".$errors[$n]." <div style='float: right;'><a href='javascript: document.getElementById(".'"error"'.").style.display=".'"none"'.";'>X</a></font></div></div>");
}











?>