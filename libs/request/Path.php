<?php
namespace libs\request;

class Path
{
	
	private $base_path;
	
	public function __construct()
	{
		$this->base_path = str_replace( 'index.php' , '' ,  $_SERVER['SCRIPT_FILENAME'] ) ;
	}
	
	public function getBasePath()
	{
		return $this->base_path;
	}
	
	public function getLibsPath()
	{
		return $this->base_path . 'libs/';
	}
	
	public function getAppPath()
	{
		return $this->base_path . 'app/';
	}
	
	public function getRoutingPath()
	{
		return $this->base_path . 'app/routing/';
	}
	
	public function getConfigPath()
	{
		return $this->base_path . 'config/';
	}
}