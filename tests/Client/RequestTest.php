<?php

namespace Agreed\Client\Tests;

use Mockery;
use Testing\TestCase;

class RequestTest extends TestCase
{
	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function __construct_withNonStringValueForBase_throwsException ( $value )
	{
		$request = Mockery::mock ( 'Agreed\\Client\\Request[]', array ( $value ) );
	}

	/**
	 * @test
	 */
	public function __construct_withStringForBase_setsBaseOnRequest ( )
	{
		$URL = 'http://eyedouble.nl/';
		$request = Mockery::mock ( 'Agreed\\Client\\Request[]', array ( $URL ) );
		assertThat ( $request->base, is ( identicalTo ( $URL ) ) );
	}

	/**
	 * @test
	 */
	public function __construct_withArrayForAttributes_setsArrayAsAtributesOnRequest ( )
	{
		$attributes = array ( 'name' => 'Aron', 'city' => 'Nijmegen' );
		$request = Mockery::mock ( 'Agreed\\Client\\Request[]', array ( '', $attributes ) );
		assertThat ( $request->attributes, is ( identicalTo ( $attributes ) ) );
	}
}