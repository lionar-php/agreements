<?php

namespace Agreed\Technical\Storage;

interface Stack
{
	/**
	 * Set an identifier to a value.
	 * 
	 * @param  mixed $identifier 		The way to identify an entry.
	 * @param  mixed $value     		The value to store.
	 * @return void
	 */
	public function set ( $identifier, $value );

	/**
	 * Check whether this stack has the identifier given registered.
	 * 
	 * @param  string  $identifier 		The identifier to check for registration.
	 * @return boolean             		True if registered false if not.
	 */
	public function has ( $identifier ) : bool;

	/**
	 * Get all values from the stack.
	 * 
	 * @return array 					All the values that are in the stack.
	 */
	public function all ( ) : array;

	/**
	 * Get a value from the stack.
	 * 
	 * @param  mixed $identifier 		The identifier to get the value from.
	 * @return mixed             		The value that was found with the identifier.
	 */
	public function get ( $identifier );
}