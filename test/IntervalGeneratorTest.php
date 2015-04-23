<?php
/**
 * Created by PhpStorm.
 * User: saemie
 * Date: 23/04/15
 * Time: 12:28
 */
use \Hola\intervals\IntervalGenerator;

class IntervalGeneratorTest extends PHPUnit_Framework_TestCase {
  function testFails() {
    $generator = new IntervalGenerator();
    $this->assertTrue(false);
  }
} 