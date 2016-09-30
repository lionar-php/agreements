<?php

namespace Agreed\Technical\Routing;

interface Router
{
	/**
	 * Adding a route under an action into the router.
	 * 
	 * @param string $route  	The route to add.
	 * @param string $action 	The action to add under the route.
	 */
	public function add ( $route, $action );

	/**
	 * Determine if the router has the given route registered.
	 * 
	 * @param  string  $route 	The route to check for registration.	
	 * @return boolean        	True if registered false if not.
	 */
	public function has ( $route ) : bool;

	/**
	 * Get the action registered under the given route.
	 * 
	 * @param  string $route 	The route to get an action from.
	 * @return string        	The action that is registered under the given route.
	 */
	public function get ( $route ) : string;
}