<?php

namespace libs\handle;

class Kernel
{
	private $route;
	private $request;
	private $response;
	
	public function __construct( $route)
	{
		$this->request = new \libs\request\Request( $route);
		$this->response = new \libs\response\Response();
	}
	
	public function sendResponse( $string = null , $status = 200 )
	{
		
		if( $string != null)
		{
			$this->setHeader('Content-Type: text/html');
			echo $string;
		}else
		{
			$data = $this->request->handle();
		
			$response = call_user_func_array( array( $data['action'] , 'action' ) , $data['arguments'] );
			
			echo $response;
		}
		
		
		$this->_copyright();
	}
	
	protected function setHeader( $headers )
	{
		header( $headers );
	}
	
	private function _copyright()
	{
		echo '<p>Framework Production By MOT</p>';
	}
}