<?php

function ini_home(){
	$dir=getcwd();
	if(strpos($dir,'/admin/scripts')!=false) $home="../../";
	elseif(strpos($dir,'/admin')!=false) $home="../";
	elseif(strpos($dir,'/manager/scripts')!=false) $home="../../";
	elseif(strpos($dir,'/manager')!=false) $home="../";
	elseif(strpos($dir,'/setup/scripts')!=false) $home="../../";
	elseif(strpos($dir,'/setup')!=false) $home="../";
	elseif(strpos($dir,'/support/scripts')!=false) $home="../../";
	elseif(strpos($dir,'/support')!=false) $home="../";
	elseif(strpos($dir,'/includes/admin')!=false) $home="../../";
	elseif(strpos($dir,'/includes/manager')!=false) $home="../../";
	elseif(strpos($dir,'/includes/modules')!=false) $home="../../";
	elseif(strpos($dir,'/includes')!=false) $home="../";
	else $home=".";
	return $home;
}
	
class ini {

	function get($header){		
		$config=parse_ini_file(ini_home()."/includes/cfg.ini",true);
		if($header!=null) return $config[$header];
		else return $config;
	}
	function add($header,$key,$value){
		$home=ini_home();
		$config=parse_ini_file("$home/includes/cfg.ini",true);
//		if(array_key_exists($header,$config)) {								//
			$config[$header][$key]=$value;							//
//		}															// Problem Code
//		else{														//
//			array_push($config,array($header));
//			$config[$header][$key]=$value;							//
//		}															//
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