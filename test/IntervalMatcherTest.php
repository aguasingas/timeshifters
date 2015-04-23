<?php

use Hola\Intervals;

class IntervalMatcherTest extends PHPUnit_Framework_TestCase {
  function testSmallIntervalInsideofBiggerInterval() {
    // Thu, 23 Apr 2015 14:00:00 GMT
    $timestamp1 = 1429797600;
    // Thu, 23 Apr 2015 16:00:00 GMT
    $timestamp2 = 1429804800;
    // Thu, 23 Apr 2015 18:00:00 GMT
    $timestamp3 = 1429812000;
    // Thu, 23 Apr 2015 20:00:00 GMT
    $timestamp4 = 1429819200;

    // Big interval.
    $interval1 = new Intervals\Interval($timestamp1, $timestamp4);
    // Small interval, inside of Big interval.
    $interval2 = new Intervals\Interval($timestamp2, $timestamp3);

    $interval_expected = $interval2;
    $interval_result = Intervals\IntervalMatcher::intersect($interval1, $interval2);
    $this->assertEquals($interval_expected, $interval_result);
    $interval_result = Intervals\IntervalMatcher::intersect($interval2, $interval1);
    $this->assertEquals($interval_expected, $interval_result);

    // Big interval.
    $interval1 = new Intervals\Interval($timestamp1, $timestamp4);
    // Small interval, inside of Big interval.
    $interval2 = new Intervals\Interval($timestamp1, $timestamp2);

    $interval_expected = $interval2;
    $interval_result = Intervals\IntervalMatcher::intersect($interval1, $interval2);
    $this->assertEquals($interval_expected, $interval_result);
    $interval_result = Intervals\IntervalMatcher::intersect($interval2, $interval1);
    $this->assertEquals($interval_expected, $interval_result);

  }

  function testIntervalsOverlap() {
    // Thu, 23 Apr 2015 14:00:00 GMT
    $timestamp1 = 1429797600;
    // Thu, 23 Apr 2015 16:00:00 GMT
    $timestamp2 = 1429804800;
    // Thu, 23 Apr 2015 18:00:00 GMT
    $timestamp3 = 1429812000;
    // Thu, 23 Apr 2015 20:00:00 GMT
    $timestamp4 = 1429819200;

    // First overlaping interval.
    $interval1 = new Intervals\Interval($timestamp1, $timestamp3);
    // Second overlaping interval
    $interval2 = new Intervals\Interval($timestamp2, $timestamp4);

    $interval_expected = new Intervals\Interval($timestamp2, $timestamp3);
    $interval_result = Intervals\IntervalMatcher::intersect($interval1, $interval2);
    $this->assertEquals($interval_expected, $interval_result);
    $interval_result = Intervals\IntervalMatcher::intersect($interval2, $interval1);
    $this->assertEquals($interval_expected, $interval_result);
  }

  function testIntervalsDontOverlap() {
    // Thu, 23 Apr 2015 14:00:00 GMT
    $timestamp1 = 1429797600;
    // Thu, 23 Apr 2015 16:00:00 GMT
    $timestamp2 = 1429804800;
    // Thu, 23 Apr 2015 18:00:00 GMT
    $timestamp3 = 1429812000;
    // Thu, 23 Apr 2015 20:00:00 GMT
    $timestamp4 = 1429819200;

    // First non-overlaping interval.
    $interval1 = new Intervals\Interval($timestamp1, $timestamp2);
    // Second non-overlaping interval
    $interval2 = new Intervals\Interval($timestamp3, $timestamp4);

    // They don´t overlap.
    $interval_expected = FALSE;
    $interval_result = Intervals\IntervalMatcher::intersect($interval1, $interval2);
    $this->assertEquals($interval_expected, $interval_result);
    $interval_result = Intervals\IntervalMatcher::intersect($interval2, $interval1);
    $this->assertEquals($interval_expected, $interval_result);

    // First non-overlaping interval.
    $interval1 = new Intervals\Interval($timestamp1, $timestamp2);
    // Second non-overlaping interval
    $interval2 = new Intervals\Interval($timestamp2, $timestamp4);
    $this->assertEquals($interval_expected, $interval_result);
  }

  public function testSortIntervals() {
    // Thu, 23 Apr 2015 14:00:00 GMT
    $timestamp1 = 1429797600;
    // Thu, 23 Apr 2015 16:00:00 GMT
    $timestamp2 = 1429804800;
    // Thu, 23 Apr 2015 18:00:00 GMT
    $timestamp3 = 1429812000;
    // Thu, 23 Apr 2015 20:00:00 GMT
    $timestamp4 = 1429819200;

    // Big interval.
    $interval1 = new Intervals\Interval($timestamp1, $timestamp4);
    // Small interval, inside of Big interval.
    $interval2 = new Intervals\Interval($timestamp2, $timestamp3);

    $originalInterval1 = clone $interval1;
    $originalInterval2 = clone $interval2;

    Intervals\IntervalMatcher::sortIntervals($interval1, $interval2);
    $this->assertEquals($originalInterval1, $interval1);
    $this->assertEquals($originalInterval2, $interval2);
  }
}
