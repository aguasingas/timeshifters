<?php
/**
 * Created by PhpStorm.
 * User: saemie
 * Date: 23/04/15
 * Time: 12:28
 */
use \Hola\intervals\IntervalGenerator;

class IntervalGeneratorTest extends PHPUnit_Framework_TestCase {
  function setUp() {
    // Set up mock planet file.
    $planet = array(
      "id" => "planet_1",
      "name" => "Mars",
      "day_length" => 172800,
      "img" => "",
    );
    file_put_contents(__DIR__ . '/tmp/planet_1.json', json_encode($planet));
  }

  function testFails() {
    $generator = new IntervalGenerator();
    $this->assertTrue(false);
  }
}