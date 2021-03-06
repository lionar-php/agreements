<?php

namespace Agreed\Technical;

use Closure;

interface Application
{
	/**
	 * Bind an abstract type that becomes a shared instance.
	 * 
	 * @param  string  $abstract 	The abstract type to register.
	 * @param  Closure $concrete 	The concrete definition of the abstract type.
	 * @return void
	 */
	public function share ( $abstract, Closure $concrete );

	/**
	 * Bind an abstract type that must be resolved every single time.
	 * 
	 * @param  string  $abstract 	The abstract type to register.
	 * @param  Closure $concrete 	The concrete definition of the abstract type.
	 * @return void
	 */
	public function bind ( $abstract, Closure $concrete );

	/**
	 * Resolve an abstract type out of the application.
	 * 
	 * @param  string $abstract 	The abstract type to resolve.
	 * @return mixed           		The results of the abstract type.
	 */
	public function make ( $abstract );

	/**
	 * Check if the application has an abstract type registered.
	 * 
	 * @param  string  $abstract 	The abstract type to check for registration.
	 * @return boolean           	True if registered false if not.
	 */
	public function has ( $abstract ) : bool;

	/**
	 * Resolve the results of a closure injecting needed dependencies.
	 * 
	 * @param  Closure $concrete 	The closure to resolve.
	 * @param  array   $payload  	Optional arguments to resolve the closure with.
	 * @return mixed            	The results of the resolved closure.
	 */
	public function call ( Closure $concrete, array $payload = array ( ) );
}