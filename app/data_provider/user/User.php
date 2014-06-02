<?php
namespace provider\user;

class User
{
	
	private $params;
	
	public function __construct( $params = null )
	{	
		$this->params = $params;
	}
	
	public function action( $name , $id , $format )
	{
		return '<h2>Hello '.$name.'</h2>Your Id is :'.$id.'<br/>current page format is '.$format;
	}
}