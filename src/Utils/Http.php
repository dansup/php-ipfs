<?php

namespace Dansup\IPFS\Utils;

use GuzzleHttp\Client as Guzzle;

class Http {

  private $client = null;
  private $url = null;
  private $method = null;
  private $file = null;
  private $params = null;
  private $request = null;

  public function __construct()
  {
    $this->client = new Guzzle();
    $this->url = null;
    $this->method = "GET";
    $this->file = null;
    $this->params = null;
    $this->request = null;
  }

  public function get()
  {
    $this->method = "GET";
    return $this;
  }

  public function post()
  {
    $this->method = "POST";
    return $this;
  }

  public function put()
  {
    $this->method = "PUT";
    return $this;
  }

  public function url($url)
  {
    $this->url = $url;
    return $this;
  }

  public function withFile($file)
  {
    //validate file
    $this->file = $file;
  }

  public function withQuery($params)
  {
    $this->params = $params;
  }

  public function getResponse()
  {
    $client = $this->client;
    $params = [];
    if($this->params !== null) {
      $params['query'] = $this->params;
    }
    if($this->file !== null) {
      $params['file'] = $this->file;
    }
    $res = $client->request($this->method, $this->url, $params);
    return $res;
  }

  public function toJson()
  {
    return $res->getBody();
  }

  public function execute()
  {
    $res = self::getResponse();
    return $res->getBody();
  }

}