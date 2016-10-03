<?php

namespace Agreed\Technical\Tests;

use Agreed\Technical\Configuration;
use Testing\TestCase;

class ConfigurationTest extends TestCase
{
	private $configuration = null;

	public function setUp ( )
	{
		$this->configuration = new Configuration;
	}

	/*
	|--------------------------------------------------------------------------
	| Set method testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider nonStringValues
	 */
	public function set_withNonStringValueForKey_throwsException ( $value )
	{
		$this->configuration->set ( $value, '' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function set_withEmptyStringValueForKey_throwsException ( )
	{
		$this->configuration->set ( '', '' );
	}

	/**
	 * @test
	 */
	public function set_withStringForKeyAndAValue_setsEntryOnConfiguration ( )
	{
		$key = 'routes';
		$value = array ( '/' => 'i want to see the dashboard', '/hello' => 'i want to see a greeting' );
		$this->configuration->set ( $key, $value );
		assertThat ( $this->property ( $this->configuration, 'data' ), hasEntry ( $key, $value ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Get method testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider nonStringValues
	 */
	public function get_withNonStringValueForKey_throwsException ( $value )
	{
		$this->configuration->get ( $value );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function get_withEmptyStringValueForKey_throwsException ( )
	{
		$this->configuration->get ( '' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function get_withStringValueForKeyThatDoesNotExistOnConfiguration_throwsException ( )
	{
		$this->configuration->get ( 'non existent key' );
	}

	/**
	 * @test
	 */
	public function get_withStringValueForKeyThatDoesExistOnConfiguration_returnCorrespondingValue ( )
	{
		$key = 'name'; $value = 'aron';
		$this->configuration->set ( $key, $value );
		assertThat ( $this->configuration->get ( $key ), is ( identicalTo ( $value ) ) );
	}
}