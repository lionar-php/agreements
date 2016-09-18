<?php

namespace Agreed\Storage\Tests;

use Agreed\Storage\Store;
use Mockery;
use Testing\TestCase;

class StoreTest extends TestCase
{
	private $store, $stack = null;

	public function setUp ( )
	{
		$stack = Mockery::mock ( 'Agreed\\Storage\\Stack' );
		$this->store = new Store ( $stack );
		$this->stack = $stack;
	}

	/*
	|--------------------------------------------------------------------------
	| Save method testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException  InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function save_withNonStringValueForIdentifier_throwsException ( $value )
	{
		$this->store->save ( $value, '' );
	}

	/**
	 * @test
	 * @expectedException  InvalidArgumentException
	 */
	public function save_withEmptyStringValueForIdentifier_throwsException (  )
	{
		$this->store->save ( '', '' );
	}

	/**
	 * @test
	 */
	public function save_withStringForIdentifierAndEntity_callsStackPutMethod ( )
	{
		$entity = 'my entity';
		$identifier = 'bench press';
		$this->stack->shouldReceive ( 'append' )->with ( $identifier, $entity )->once ( );
		$this->store->save ( $identifier, $entity );
	}

	/*
	|--------------------------------------------------------------------------
	| Get method testing
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException  InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function get_withNonStringValueForIdentifier_throwsException ( $value )
	{
		$this->store->get ( $value );
	}

	/**
	 * @test
	 * @expectedException  InvalidArgumentException
	 */
	public function get_withEmptyStringValueForIdentifier_throwsException (  )
	{
		$this->store->get ( '' );
	}

	/**
	 * @test
	 * @expectedException Agreed\Storage\Exceptions\IdentifierNotFoundException
	 */
	public function get_withIdentifierThatDoesNotExist_throwsException ( )
	{
		$identifier = 'non existent';
		$this->stack->shouldReceive ( 'has' )->with ( $identifier )->once ( )->andReturn ( false );
		$this->store->get ( $identifier );
	}

	/**
	 * @test
	 */
	public function get_withIdentifierThatDoesExist_returnsEntity ( )
	{
		$identifier = 'bench press';
		$entity = 'some entity';
		$this->stack->shouldReceive ( 'has' )->with ( $identifier )->once ( )->andReturn ( true );
		$this->stack->shouldReceive ( 'get' )->with ( $identifier )->once ( )->andReturn ( $entity );
		assertThat ( $this->store->get ( $identifier ), is ( identicalTo ( $entity ) ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Has method testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException  InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function has_withNonStringValueForIdentifier_throwsException ( $value )
	{
		$this->store->has ( $value );
	}

	/**
	 * @test
	 * @expectedException  InvalidArgumentException
	 */
	public function has_withEmptyStringValueForIdentifier_throwsException ( )
	{
		$this->store->has ( '' );
	}

	/**
	 * @test
	 */
	public function has_withIdentifierThatDoesNotExistOnStore_returnsFalse ( )
	{
		$identifier = 'id';
		$this->stack->shouldReceive ( 'has' )->with ( $identifier )->once ( )->andReturn ( false );
		$this->store->has ( $identifier );
	}

	/**
	 * @test
	 */
	public function has_withIdentifierThatDoesExistOnStore_returnsTrue ( )
	{
		$identifier = 'id';
		$this->stack->shouldReceive ( 'has' )->with ( $identifier )->once ( )->andReturn ( true );
		$this->store->has ( $identifier );
	}
}