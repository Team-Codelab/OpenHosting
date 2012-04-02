<?php

class ini {
	
	function get(){
		$config=parse_ini_file("cfg.ini");
	}
	function add($header,$key,$value){
		$config=parse_ini_file("cfg.ini");
		$config[$header][$key]==$value;
		$new="";
		for($z=0;$z<array_size($config);$z++){
			$new.="[".$config[$z]."]\n";
			for($x=0;$x<array_size($config[$x]);$x++){
				$new.= $x." = '".$config[$z][$x]."'\n";
			}
		}		
	}
}

?>