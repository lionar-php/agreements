<?php

namespace Agreed\Events;

interface Dispatcher
{
	/**
	 * Tune a listener into an event.
	 * 
	 * @param  string   $event    	The event to tune the listener in to.
	 * @param  Callable $listener 	The Callable that runs when the event fires.
	 * 
	 * @return void
	 */
	public function listen ( $event, Callable $listener );

	/**
	 * Fire an event returning the results of all listeners.
	 * 
	 * @param  string $event   		The event to fire.
	 * @param  array  $payload 		Optional arguments to use to resolve the listeners.
	 * @return array          		The results of all listeners.
	 */
	public function fire ( $event, $payload = array ( ) ) : array;

	/**
	 * Determine if there are listeners for the given event.
	 * 
	 * @param  string  $event 		The event to check for registration.
	 * @return boolean        		True if the event is registered false if not.
	 */
	public function has ( $event ) : bool;
}