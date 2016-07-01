<?php

namespace Dansup\IPFS;

class Server {

  public function __construct($driver)
  {
    $this->setDriver($driver);
  }

  public function setDriver($driver)
  {
    $this->driver = $driver;
  }

}