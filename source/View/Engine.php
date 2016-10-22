<?php

namespace Agreed\Technical\View;

interface Engine
{
	/**
	 * Output the contents of a template.
	 * 
	 * @param  string $template  	The template to output.
	 * @param  array  $arguments 	Optional data to fill into the placeholders of the template.
	 * @return void
	 */
	public function make ( $template, array $arguments = array ( ) );
}