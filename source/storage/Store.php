<?php

namespace Agreed\Storage;

abstract class Store
{
	protected $stack = null;

	public function __construct ( $entity )
	{
		$this->stack = $this->select ( $entity );
	}

	/**
	 * Selecting a stack where this database stores its operations
	 * 
	 * @param  string $stack 		The place where to store
	 * @return void
	 */
	protected function select ( $stack );
}