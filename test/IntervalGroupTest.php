<?php

use \Hola\Intervals;

class IntervalGroupTest extends PHPUnit_Framework_TestCase {
  public function testSuccessfulExecution() {
    // Thu, 23 Apr 2015 14:00:00 GMT
    $timestamp1 = 1429797600;
    // Thu, 23 Apr 2015 16:00:00 GMT
    $timestamp2 = 1429804800;
    $group = new Intervals\IntervalGroup();
    $group->add(new Intervals\Interval($timestamp1, $timestamp2));
  }
}
