<?php

class ini {
	
	function get(){
		$config=parse_ini_file("cfg.ini");
	}
	function add($header,$key,$value){
		$config=parse_ini_file("cfg.ini");
		$config[$header][$key]==$value;
		$new="";
		for($z=0;$z<count($config);$z++){
			$new.="[".key($config)."]\n";
			for($x=0;$x<count($config[key($config)]);$x++){

				$new.= key($config[key($config)])." = '".$config[key($config)][key($config[key($config)])]."'\n";

				next($config[key($config)]);
			}
			next($config);
		}
		$cf=fopen("cfg.ini","w");
		fwrite($cf,$new);
		fclose($cf);		
	}
}

?>