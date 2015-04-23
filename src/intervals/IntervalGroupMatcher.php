<?php
/**
 * Created by PhpStorm.
 * User: aguasingas
 * Date: 23/04/2015
 * Time: 16:25
 */

namespace Hola\Intervals;


class IntervalGroupMatcher {

  public static function intersect($group1, $group2) {
    return new IntervalGroup();
  }

  public static function sortIntervalGroups(IntervalGroup &$group1,
                                            IntervalGroup &$group2) {
    if ($group1->getStartTimestamp() > $group2->getStartTimestamp()) {
      self::swapIntervalGroups($group1, $group2);
    }
  }

  public static function swapIntervalGroups(IntervalGroup $group1, IntervalGroup $group2) {
    list($group1, $group2) = array($group2, $group1);
  }

  public static function pruneEarliest(IntervalGroup &$group1, IntervalGroup &$group2) {
    self::sortIntervalGroups($group1, $group2);
    // group1 has the earliest start.
    //
    // if the first interval in group1 ends
    // before the first interval in group2 beggins, remove it.
    if ($group1->getFirstEndTimestamp() <=
      $group2->getStartTimestamp()) {
      $group1->removeFirstInterval();
    }
    return $group1;
  }

}