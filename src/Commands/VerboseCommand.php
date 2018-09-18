<?php
/**
 * Created by PhpStorm.
 * User: Thomas Henrion
 * Date: 2018-09-18
 * Time: 10:21 AM
 */

namespace Swingtree\LaravelUtils\Commands;


use Illuminate\Console\Command;

class VerboseCommand extends Command {

  /**
   * Override
   * @param string $string
   * @param null $verbosity
   */
  public function info($string, $verbosity = null)
  {
    parent::info(date('Y-m-d H:i:s').' '. $string,$verbosity);
  }
}