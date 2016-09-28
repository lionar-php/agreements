<?php

namespace Agreed\Client;

use Support\Accessibility\Accessible;

abstract class Request
{
	use Accessible;

	/**
	 * The data that the client provided with the request
	 */
	protected $attributes = array ( );

	public function __construct ( array $attributes = array ( ) )
	{
		$this->attributes = $attributes;
	}
}