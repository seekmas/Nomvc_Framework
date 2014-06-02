<?php
namespace libs\yml;

require_once 'spyc_yaml/Spyc.php';

class Yaml
{
	
	private $metadata;
	private $node;
	
	public function get( $index )
	{
		$this->node = $this->node[$index];
		return $this->node;
	}
	
	public function getAll()
	{
		return $this->metadata;
	}
	
	public function load( $path)
	{
		$this->metadata = \Spyc::YAMLLoad( $path );
		$this->node = $this->metadata;
		return $this;
	}
	
	public function dump( $array )
	{
		$this->metadata = $array;
		return \Spyc::YAMLDump( $this->metadata );
	}
}