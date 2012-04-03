<?php

class ini {
	
	function get(){
		$home="/home/site/main/~pyros/OpenHosting";
		$config=parse_ini_file("$home/includes/cfg.ini",true);
	}
	function add($header,$key,$value){
		$home="/home/site/main/~pyros/OpenHosting";
		$pair=array($key=>$value);
		
		$config=parse_ini_file("$home/includes/cfg.ini",true);
		if(in_array($header,$config)) {
			array_push($config[$header],$key);
			array_push($config[$header][$key],$value);
		}
		else{
			array_push($config,$header);
			array_push($config[$header],$key);
			array_push($config[$header][$key],$value);
		}
				print_r($config);
		$new="";
		for($z=0;$z<count($config);$z++){
			$new.="[".key($config)."]\n";
			for($x=0;$x<count($config[key($config)]);$x++){
				$new.= key($config[key($config)])." = '".$config[key($config)][key($config[key($config)])]."'\n";
				next($config[key($config)]);
			}
			next($config);
		}
		$cfg=fopen("$home/includes/cfg.ini","w");
		fwrite($cfg,$new);
		fclose($cfg);
	}
}

?>