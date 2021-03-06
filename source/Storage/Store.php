<?php

namespace Agreed\Technical\Storage;

use Agreed\Technical\Storage\Exceptions\IdentifierNotFoundException;
use InvalidArgumentException;

class Store
{
	protected $stack = null;

	public function __construct ( Stack $stack )
	{
		$this->stack = $stack;
	}

	public function save ( $identifier, $entity )
	{
		$this->check ( $identifier );
		$this->stack->set ( $identifier, $entity );
	}

	public function all ( ) : array
	{
		return $this->stack->all ( );
	}

	public function get ( $identifier )
	{
		$this->check ( $identifier );
		if ( ! $this->stack->has ( $identifier ) )
			throw new IdentifierNotFoundException ( "$identifier has not been found" );
		return $this->stack->get ( $identifier );
	}

	public function has ( $identifier ) : bool
	{
		$this->check ( $identifier );
		return $this->stack->has ( $identifier );
	}
	
	private function check ( $identifier )
	{
		if ( ! is_string ( $identifier ) or empty ( $identifier ) )
			throw new InvalidArgumentException ( '$identifier must be a non empty string' );
	}
}