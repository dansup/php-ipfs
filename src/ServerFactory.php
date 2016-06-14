<?php

namespace Dansup\IPFS;

use \GuzzleHttp\Guzzle;

class ServerFactory
{
    /**
     * Configuration parameters.
     * @var array
     */
    protected $base;
    protected $ip;
    protected $gatewayPort;
    protected $apiPort;

    /**
     * Create ServerFactory instance.
     * @param string $ip IP Address of IPFS node.
     * @param integer $gatewayPort IPFS Gateway Port.
     * @param integer $apiPort IPFS Api Port.
     */
    public function __construct ( 
        $ip = 'localhost',
        $gatewayPort = 8080,
        $apiPort = 5001
        )
    {
        $this->ip = $ip;
        $this->gatewayPort = $gatewayPort;
        $this->apiPort = $apiPort;
        $this->base = "http://{$ip}:{$gatewayPort}/api/";
    }
    public function request ($url, $fullResponse = false, $method = "GET", $content = null)
    {
        $client = new \GuzzleHttp\Client();
        if($content !== null) {
            $res = $client->request($method, $this->base.$url, ['file' => $content]);
        } else {
            $res = $client->request($method, $this->base.$url);
        }
        $res = ($fullResponse == true) ? $res : $res->getBody();
        return $res;
    }
    public static function add ($content, $fullResponse = false)
    {
        $path = "v0/add";
        $response = (new self)->request($path, $fullResponse, "POST", $content);
        return $response;
    }
    public static function ls ($hash, $fullResponse = false)
    {
        $path = "v0/ls/{$hash}";
        $response = (new self)->request($path, $fullResponse);
        return $response;
    }
    public static function size ($hash, $fullResponse = false)
    {
        $path = "v0/object/stat/{$hash}";
        $response = (new self)->request($path, $fullResponse);
        return $response;
    }
    public static function pin ($hash, $fullResponse = false)
    {
        $path = "v0/pin/add/{$hash}";
        $response = (new self)->request($path, $fullResponse);
        return $response;
    }

}
