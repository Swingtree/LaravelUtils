<?php

namespace Swingtree\LaravelUtils\Helpers\Crucible;

class CrucibleDefinition {

  private $ha;
  private $ek;
  private $ea;
  private $ei;

  public function __construct($ha,$ek,$ea,$ei) {
    $this->ha = $ha;
    $this->ek = $ek;
    $this->ea = $ea;
    $this->ei = $ei;
  }

  public function Ha(){ return $this->ha; }
  public function Ek(){ return $this->ek; }
  public function Ea(){ return $this->ea; }
  public function Ei(){ return $this->ei; }

}