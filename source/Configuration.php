<?php

namespace Agreed\Technical;

use InvalidArgumentException;

class Configuration
{
	private $data = array ( );

	public function set ( $key, $value )
	{
		$this->check ( $key );
		$this->data [ $key ] = $value;
	}

	public function get ( $key )
	{
		$this->check ( $key );
		if ( ! isset ( $this->data [ $key ] ) )
			throw new InvalidArgumentException ( "$key does not exist inside this configuration." );
		return $this->data [ $key ];
	}

	private function check ( $key )
	{
		if ( ! is_string ( $key ) or empty ( $key ) )
			throw new InvalidArgumentException ( '$key must be a non empty string' );
	}
}