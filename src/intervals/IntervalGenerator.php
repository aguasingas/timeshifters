<?php
/**
 * Created by PhpStorm.
 * User: saemie
 * Date: 23/04/15
 * Time: 12:19
 */
namespace Hola\Intervals;

class IntervalGenerator {
  protected $planet_directory;
  protected $planet;

  function __construct() {
    $this->planet_directory = __DIR__ . "/../assets/planets/";
  }

  /**
   * Loads the configurations for a given planet.
   */
  public function LoadPlanetData($planet_id) {

  }

  /**
   * Returns the data for loaded planet.
   */
  public function getPlanetData() {

  }
}
