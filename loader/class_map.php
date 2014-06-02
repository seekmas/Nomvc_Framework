<?php

$libs = str_replace( 'index.php' , '' ,  $_SERVER['SCRIPT_FILENAME'] );
return array(
	'libs\\' => $libs.'/libs/' ,
	'provider\\'  => $libs.'/app/data_provider/' ,
	'render\\'  => $libs.'/app/data_render/' ,
);