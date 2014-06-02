<?php
namespace libs\route;
class Route
{
	private $full;
	private $route;
	
	public function __construct()
	{
		
		if( isset( $_GET['route'] ) )
		{
			$routes = trim( $_GET['route'] );
			$result = preg_split( '/[^a-zA-Z0-9\_\-]/' , $routes );
			$this->full = $routes;
			$this->route = $result;
		}else
		{
			$this->route = array();
		}

	}
	
	public function get( $index )
	{
		if( isset( $this->route[$index] ) )
			return $this->route[$index];
		else
			return false;
	}
	
	public function getFull()
	{
		return $this->full;
	}	
	
}