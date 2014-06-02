<?php
require_once 'constant.php';


class ClassLoader
{

	public static function load( $class ) {  
		
		preg_match('/^([^\\\]+\\\)(.+)$/' , $class , $maps);

		$class_map = require 'class_map.php';
		
		$libs_files = $class_map[$maps[1]] . '/' . $maps[2] . '.php';

		if( !array_key_exists( $maps[1] , $class_map  ) || !file_exists( $libs_files ) )
		{
			echo PRE_ECHO;
			throw new \Exception('Class '.$class.' Not Found');
		}

		require_once( $libs_files );
	}
}
spl_autoload_register( array('ClassLoader' , 'load') );