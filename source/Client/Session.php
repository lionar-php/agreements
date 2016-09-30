<?php

namespace Agreed\Technical\Client;

interface Session
{
	/**
	 * Get a value by key out of the session.
	 * 
	 * @param  string $key     		The key to get the value from out of the session.
	 * @param  mixed  $default 		The value to return when the key could not be found in the session.
	 * @return mixed          		The value that was stored under key in the session or the default value you supplied.
	 */
	public function get ( $key, $default = null );

	/**
	 * Set a value under a key inside the session.
	 * 
	 * @param string $key   		The key to register the value under.
	 * @param mixed $value 			The value you want to store under the key.
	 */
	public function set ( $key, $value );

	/**
	 * Set a value under a key inside the session but only for the next request.
	 * 
	 * @param string $key   		The key to register the value under for the next request only.
	 * @param mixed $value 			The value you want to store under the key for the next request only.
	 */
	public function flash ( $key, $value );

	/**
	 * Get a value by key that was flashed out of the session.
	 * 
	 * @param  string $key     		The key that was flashed to get the value from out of the session.
	 * @param  mixed  $default 		The value to return when the flashed key could not be found in the session.
	 * @return mixed          		The value that was stored under the flashed key in the session or the default value you supplied.
	 */
	public function flashed ( $key, $default = null );
}