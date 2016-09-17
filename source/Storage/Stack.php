<?php

namespace Agreed\Storage;

interface Stack
{
	public function append ( $identifier, $entity );

	/**
	 * Check wether this stack has the identifier given registered
	 * 
	 * @param  string  $identifier 		The identifier to check for registration
	 * @return boolean             		True if registered false if not
	 */
	public function has ( $identifier ) : bool;
}