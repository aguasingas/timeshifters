<?php

namespace Hola\Intervals;

class IntervalMatcher {

  public static function intersect($interval1, $interval2) {
    self::sortIntervals($interval1, $interval2);
    if (self::isSmallInsideBigInterval($interval1, $interval2)) {
      return $interval2;
    }
  }

  /**
   * Make sure the interval with the earliest start date is the first one.
   *
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   */
  public static function sortIntervals(Interval &$interval1, Interval &$interval2) {
    if ($interval1->getStart() > $interval2->getStart()) {
      self::swapIntervals($interval1, $interval2);
    }
  }

  /**
   * Swap intervals values.
   *
   * Interval2 gets the values for interval1,
   * and the other way around.
   *
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   */
  public static function swapIntervals(Interval &$interval1, Interval &$interval2) {
    list($interval1, $interval2) = array($interval2, $interval1);
  }

  /**
   * Is interval2 inside of interval1?
   *
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   * @return bool
   */
  private static function isSmallInsideBigInterval(Interval $interval1, Interval $interval2) {
    return
      self::firstIntervalEarlierStart($interval1, $interval2)
      &&
      self::FirstIntervalLaterEnd($interval1, $interval2);
  }

  /**
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   * @return bool
   */
  private static function firstIntervalEarlierStart(Interval $interval1, Interval $interval2) {
    return $interval1->getStart() < $interval2->getStart();
  }

  /**
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   * @return bool
   */
  private static function firstIntervalLaterStart(Interval $interval1, Interval $interval2) {
    return $interval1->getStart() > $interval2->getStart();
  }

  /**
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   * @return bool
   */
  private static function FirstIntervalEarlierEnd(Interval $interval1, Interval $interval2) {
    return $interval1->getEnd() < $interval2->getEnd();
  }

  /**
   * @param \Hola\Intervals\Interval $interval1
   * @param \Hola\Intervals\Interval $interval2
   * @return bool
   */
  private static function FirstIntervalLaterEnd(Interval $interval1, Interval $interval2) {
    return $interval1->getEnd() > $interval2->getEnd();
  }
}