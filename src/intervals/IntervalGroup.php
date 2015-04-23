<?php

namespace Hola\Intervals;


class IntervalGroup {
  private $intervals;

  public function __construct() {
    $this->intervals = array();
  }

  public function add(Interval $interval) {
    $this->intervals[] = $interval;
  }

  public function size() {
    return count($this->intervals);
  }

  public function getFirstInterval() {
    reset($this->intervals);
    return (current($this->intervals));
  }

  public function getStartTimestamp() {
    if ($fistInterval = $this->getFirstInterval()) {
      return $fistInterval->getStartTimestamp();
    }
  }

  public function getFirstEndTimestamp() {
    if ($fistInterval = $this->getFirstInterval()) {
      return $fistInterval->getEndTimestamp();
    }
  }

  public function removeFirstInterval() {
    array_shift($this->intervals);
  }
}