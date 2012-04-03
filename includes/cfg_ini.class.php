<?php
	
class ini {
	function get($file,$header){		
		$config=parse_ini_file($file,true);
		if($header!=null) return $config[$header];
		else return $config;
	}
	function add($file,$header,$key,$value){
		$config=parse_ini_file($file,true);
		$new="";
		for($z=0;$z<count($config);$z++){
			$new.="[".key($config)."]\n";
			for($x=0;$x<count($config[key($config)]);$x++){
				$new.= key($config[key($config)])." = '".$config[key($config)][key($config[key($config)])]."'\n";
				next($config[key($config)]);
			}
			next($config);
		}
		$cfg=fopen($file,"w");
		fwrite($cfg,$new);
		fclose($cfg);
	}
}

?>