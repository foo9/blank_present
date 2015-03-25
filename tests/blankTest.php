<?php

require_once __DIR__ . '/../vendor/autoload.php';

class blankTest extends PHPUnit_Framework_TestCase
{
	public function testZeroLengthString()
	{
		$this->assertSame(true, _blank(""));
	}

	public function testSpaceString()
	{
		$this->assertSame(true, _blank(" "));
	}

	public function testNull()
	{
		$this->assertSame(true, _blank(null));
	}

	public function testStringNull()
	{
		$this->assertSame(true, _blank('null'));
	}

	public function testStringUpperCaseNull()
	{
		$this->assertSame(true, _blank('NULL'));
	}
	
	public function testZeroLengthArray()
	{
		$this->assertSame(true, _blank(array()));
	}

	public function testArrayInNull()
	{
		$this->assertSame(true, _blank(array(null)));
	}
	
	public function testBooleanFalse()
	{
		$this->assertSame(true, _blank(false));
	}
	
	public function testBooleanTrue()
	{
		$this->assertSame(false, _blank(true));
	}

	public function testStringBooleanFalse()
	{
		$this->assertSame(true, _blank('false'));
	}

	public function testStringBooleanTrue()
	{
		$this->assertSame(false, _blank('true'));
	}

	public function testStringUpperCaseBooleanFalse()
	{
		$this->assertSame(true, _blank('FALSE'));
	}

	public function testStringUpperCaseBooleanTrue()
	{
		$this->assertSame(false, _blank('TRUE'));
	}
	
	public function testIntegerOne()
	{
		$this->assertSame(false, _blank(1));
	}
	
	public function testIntegerZero()
	{
		$this->assertSame(true, _blank(0));
	}

	public function testIntegerMinusOne()
	{
		$this->assertSame(false, _blank(-1));
	}
	
	public function testFloatZero()
	{
		$this->assertSame(true, _blank(0.0));
	}

	public function testStringOne()
	{
		$this->assertSame(false, _blank('1'));
	}

	public function testStringZero()
	{
		$this->assertSame(true, _blank('0'));
	}

	public function testStringMinusOne()
	{
		$this->assertSame(false, _blank('-1'));
	}

	public function testStringFloatZero()
	{
		$this->assertSame(true, _blank('0.0'));
	}

	public function testStringPhp()
	{
		$this->assertSame(false, _blank('php'));
	}

	public function testHexadecimalNumeric()
	{
		$this->assertSame(true, _blank(0x0));
	}

	public function testOctalNumeric()
	{
		$this->assertSame(true, _blank(00));
	}

	public function testBinaryNumeric()
	{
		$this->assertSame(true, _blank(0b0));
	}

	/**
     * @expectedException Exception
     */
	public function testUnknownTypeException()
	{
		$this->assertSame(true, _blank(null, function ($arg) {
			return 'unknown type';
		}));
	}
}
