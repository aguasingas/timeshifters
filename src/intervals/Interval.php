<?php

namespace Hola\Intervals;

class Interval {
  private $dateStart;
  private $dateEnd;

  /**
   * Constructor.
   *
   * @param int $timestamp1
   * @param int $timestamp2
   */
  function __construct($timestamp1, $timestamp2) {
    $this->dateStart = new \DateTime();
    $this->dateStart->setTimestamp($timestamp1);
    $this->dateEnd = new \DateTime();
    $this->dateEnd->setTimestamp($timestamp2);
  }

  public function getStart() {
    return $this->dateStart;
  }

  public function getEnd() {
    return $this->dateEnd;
  }
}