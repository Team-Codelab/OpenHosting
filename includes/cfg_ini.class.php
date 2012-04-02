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
			$new.="[".key($config)."]\n";
			for($x=0;$x<array_size($config[key($x)]);$x++){
				$new.= key($config[key($x)])." = '".$config[key($config)][key($config[key($x)])]."'\n";
				next($config[key($x)]);
			}
			next($config);
		}
		$cf=fopen("cfg.ini","w");
		fwrite($cf,$new);
		fclose($cf);		
	}
}

?>