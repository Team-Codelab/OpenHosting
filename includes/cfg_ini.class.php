<?php

$home='/home/site/main/~pyros/OpenHosting';

class ini {
	
	function get($header){
		$config=parse_ini_file("$home/includes/cfg.ini",true);
		if($header!=null) return $config[$header];
		else return $config;
	}
	function add($header,$key,$value){
		$pair=array($key=>$value);
		
		$config=parse_ini_file("$home/includes/cfg.ini",true);
//		if(array_key_exists($header,$config)) {								//
			$config[$header][$key]=$value;							//
//		}															// Problem Code
//		else{														//
//			array_push($config,array($header));
//			$config[$header][$key]=$value;							//
//		}															//
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