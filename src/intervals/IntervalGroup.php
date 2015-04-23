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
}