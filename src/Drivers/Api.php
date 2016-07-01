<?php

namespace Dansup\IPFS\Drivers;

use Dansup\IPFS\Utils\Http;

class Api {
  use \Dansup\IPFS\Contracts\Driver;
  
  public function handleCall($api, $cmd)
  {
    if( is_array($api) == false) {
      throw new \Exception('Invalid API call');
    }
    switch ($api['method']) {
      case 'GET':
        $res = (new Http())->get();
        break;
      case 'POST':
        $res = (new Http())->post();
        break;
      
      default:
        $res = (new Http())->get();
        break;
    }
    if($api['query'] !== null) {
      $res = $res->withQuery($api['query']);
    }
    if($api['file'] !== null) {
      $res = $res->withFile($api['file']);
    }
    return $res->url($api['path'])->execute();

  }

}