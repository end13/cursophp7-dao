<?php
spl_autoload_register(function($class_name){
	$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";

	if(file_exists($class_name.".php")){
		require_once($filename);
	}
});


?>