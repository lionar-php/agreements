<?php

namespace Agreed;

abstract class Request
{
	/**
	 * The data that the client provided with the request
	 */
	protected $attributes = array ( );

	public function __construct ( array $attributes = array ( ) )
	{
		$this->attributes = $attributes;
	}

	public function __get ( $property )
	{
		if ( isset ( $this-> { $property } ) )
			return $this-> { $property };
	}
}