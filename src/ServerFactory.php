<?php

namespace Dansup\IPFS;

use \GuzzleHttp\Guzzle;

class ServerFactory
{

    /**
     * Perform Guzzle REST Request.
     * @return Guzzle Response.
     */
    public function request($url, $content = null, $method = "GET")
    {
        $client = new \GuzzleHttp\Client();
        if($content != null) {
            $res = $client->request($method, $url, ['file' => $content]);
        } else {
            $res = $client->request($method, $url);
        }
        return $res->getBody();
    }

    /**
     * Add content to IPFS.
     * @return object Guzzle Response.
     */
    public static function add($content)
    {
        $path = "http://localhost:5001/api/v0/add";
        $response = (new self)->request($path, $content);
        return json_decode($response);
    }

    /**
     * Perform directory listing of IPFS hash.
     * @return object Guzzle Response.
     */
    public static function ls($hash)
    {
        $path = "http://localhost:5001/api/v0/ls/{$hash}";
        $response = (new self)->request($path);
        return json_decode($response);
    }

    /**
     * Get file size of an IPFS Object.
     * @return object Guzzle Response.
     */
    public static function size($hash)
    {
        $path = "http://localhost:5001/api/v0/object/stat/{$hash}";
        $response = (new self)->request($path);
        return json_decode($response);
    }

    /**
     * cat an IPFS Object.
     * @return object Guzzle Response.
     */
    public static function cat($hash)
    {
        $path = "http://localhost:8080/ipfs/{$hash}";
        $response = (new self)->request($path);
        return $response;
    }

    /**
     * Pin IPFS hash.
     * @return object Guzzle Response.
     */
    public static function pin($hash)
    {
        $path = "http://localhost:5001/api/v0/pin/add/{$hash}";
        $response = (new self)->request($path);
        return json_decode($response);
    }

    /**
     * Get list of pinned IPFS objects.
     * @return object Guzzle Response.
     */
    public static function pinList($type = "all")
    {
        $path = "http://localhost:5001/api/v0/pin/ls?&type={$type}";
        $response = (new self)->request($path, null, "POST");
        return json_decode($response);
    }

    /**
     * Delete a pinned IPFS object.
     * @return object Guzzle Response.
     */
    public static function pinRemove($hash)
    {
        $path = "http://localhost:5001/api/v0/pin/rm?&arg={$hash}";
        $response = (new self)->request($path, null, "POST");
        return json_decode($response);
    }

    /**
     * Ping an IPFS node.
     * @return object Guzzle Response.
     */
    public static function ping($address)
    {
        $path = "http://localhost:5001/api/v0/ping?arg={$address}";
        $response = (new self)->request($path);
        return json_decode($response);
    }
}
