<?php

use \Hola\Intervals;

class IntervalGroupTest extends PHPUnit_Framework_TestCase {
  private $timestamp;

  public function setUp() {
    //  Tue, 31 Mar 2015 00:00:00 GMT
    $timestamp[0] = 1427760000;
    $hour = 24 * 3600;
    // Creating timestamps for all the hours for that day.
    for ($i = 1;$i < 24;$i++) {
      $timestamp[$i] = $timestamp[0] + $i * $hour;
    }
    $this->timestamp = $timestamp;
  }

  public function testSuccessfulExecution() {
    // Thu, 23 Apr 2015 14:00:00 GMT
    $timestamp1 = 1429797600;
    // Thu, 23 Apr 2015 16:00:00 GMT
    $timestamp2 = 1429804800;
    $group = new Intervals\IntervalGroup();
    $group->add(new Intervals\Interval($timestamp1, $timestamp2));
    $result = $group->size();
    $expected = 1;
    $this->assertEquals($expected, $result);
  }

  public function testIntersectIntervalGroups() {
    $timestamp = $this->timestamp;

    $group1 = new Hola\Intervals\IntervalGroup();
    $group1->add(new Intervals\Interval($timestamp[6], $timestamp[7]));
    $group1->add(new Intervals\Interval($timestamp[8], $timestamp[9]));
    $group1->add(new Intervals\Interval($timestamp[11], $timestamp[12]));
    $group1->add(new Intervals\Interval($timestamp[14], $timestamp[16]));
    $group1->add(new Intervals\Interval($timestamp[18], $timestamp[19]));
    $group1->add(new Intervals\Interval($timestamp[20], $timestamp[22]));

    $this->assertEquals(6, $group1->size());

    $group2 = new Hola\Intervals\IntervalGroup();
    $group2->add(new Intervals\Interval($timestamp[10], $timestamp[13]));
    $group2->add(new Intervals\Interval($timestamp[16], $timestamp[18]));
    $group2->add(new Intervals\Interval($timestamp[19], $timestamp[20]));
    $group2->add(new Intervals\Interval($timestamp[21], $timestamp[23]));

    $groupExpected = new Hola\Intervals\IntervalGroup();
    $groupExpected->add(new Intervals\Interval($timestamp[11], $timestamp[12]));
    $groupExpected->add(new Intervals\Interval($timestamp[21], $timestamp[22]));

    $groupResult = Intervals\IntervalGroupMatcher::intersect($group1, $group2);

    $this->assertEquals($groupExpected, $groupResult);
  }

  public function testPruneEarliest() {
    $timestamp = $this->timestamp;

    $group1 = new Hola\Intervals\IntervalGroup();
    $group1->add(new Intervals\Interval($timestamp[6], $timestamp[7]));
    $group1->add(new Intervals\Interval($timestamp[8], $timestamp[9]));
    $group1->add(new Intervals\Interval($timestamp[11], $timestamp[12]));
    $group1->add(new Intervals\Interval($timestamp[14], $timestamp[16]));
    $group1->add(new Intervals\Interval($timestamp[18], $timestamp[19]));
    $group1->add(new Intervals\Interval($timestamp[20], $timestamp[22]));

    $group2 = new Hola\Intervals\IntervalGroup();
    $group2->add(new Intervals\Interval($timestamp[10], $timestamp[13]));
    $group2->add(new Intervals\Interval($timestamp[16], $timestamp[18]));
    $group2->add(new Intervals\Interval($timestamp[19], $timestamp[20]));
    $group2->add(new Intervals\Interval($timestamp[21], $timestamp[23]));

    Intervals\IntervalGroupMatcher::pruneEarliest($group1, $group2);

    $groupExpected = new Intervals\IntervalGroup();
    $groupExpected->add(new Intervals\Interval($timestamp[11], $timestamp[12]));
    $groupExpected->add(new Intervals\Interval($timestamp[14], $timestamp[16]));
    $groupExpected->add(new Intervals\Interval($timestamp[18], $timestamp[19]));
    $groupExpected->add(new Intervals\Interval($timestamp[20], $timestamp[22]));

    $this->assertEquals($groupExpected, $group1);
  }
}
