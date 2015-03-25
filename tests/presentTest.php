<?php

require_once __DIR__ . '/../vendor/autoload.php';

class presentTest extends PHPUnit_Framework_TestCase
{
	public function testNull()
	{
		$this->assertSame(false, _present(null));
	}
}
