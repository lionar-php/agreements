<?php

namespace Agreed\Technical\Client;

use InvalidArgumentException;
use Support\Accessibility\Accessible;

abstract class Request
{
	use Accessible;

	/**
	 * The base of the request.
	 * 
	 * @example In HTTP this would be the base URL.
	 */
	protected $base = '';

	/**
	 * The data that the client provided with the request.
	 */
	protected $attributes = array ( );

	public function __construct ( $base, array $attributes = array ( ) )
	{
		if ( ! is_string ( $base ) )
			throw new InvalidArgumentException ( '$base must be a string' );
		
		$this->base = $base;
		$this->attributes = $attributes;
	}
}