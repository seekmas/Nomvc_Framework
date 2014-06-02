<?php
namespace libs\request;

class Request
{
	
	private $route;
	private $yaml;
	private $path;
	

	public function __construct( $route)
	{
		$this->route = $route;
		$this->yaml = new \libs\yml\Yaml();
		$this->path = new \libs\request\Path();
	}
	
	public function handle()
	{
		foreach ( $this->_find_routing()->getAll() as $route )
		{

			preg_match_all( '/{([\_\-a-zA-Z0-9]+)}/'  , $route['request'] , $params );
			
			$preg_url = preg_replace( '/{[\_\-a-zA-Z0-9]+}/' , '([a-zA-Z0-9]+)' , $route['request'] );
			
			$preg_url = preg_replace( '/\//' , '\/' , $preg_url );
			
			$action = preg_replace('/\//' , '\\' , $route['provider'] );
			
			if( preg_match( '/'.$preg_url.'/' , '/' . $this->route->getFull() , $match ) )
			{	
				
				unset( $match[0] );
				return array( 'action' => '\\provider\\'.$action , 'arguments' => $match );
			}
		}
		
		throw new \Exception('Routing Not Found');
	}
	
	private function _find_routing()
	{
		return $this->yaml->load( $this->path->getRoutingPath() . 'dispatch.yml' );
	}
}