<?php

namespace Dansup\IPFS\Drivers;

use Dansup\IPFS\Utils\Http;
use GuzzleHttp\Client as Guzzle;

class Api {

    /**
     * Add content to IPFS.
     * @return object Guzzle Response.
     */
    public static function add($content)
    {
        $path = "http://localhost:5001/api/v0/add";
        $response = (new Http())->post()->url($path)->withFile($content)->execute();
        return json_decode($response);
    }

    /**
     * Perform directory listing of IPFS hash.
     * @return object Guzzle Response.
     */
    public static function ls($hash)
    {
        $path = "http://localhost:5001/api/v0/ls/{$hash}";
        $response = (new Http())->get()->url($path)->execute();
        return json_decode($response);
    }

    /**
     * Get file size of an IPFS Object.
     * @return object Guzzle Response.
     */
    public static function size($hash)
    {
        $path = "http://localhost:5001/api/v0/object/stat/{$hash}";
        $response = (new Http())->get()->url($path)->execute();
        return json_decode($response);
    }

    /**
     * cat an IPFS Object.
     * @return object Guzzle Response.
     */
    public static function cat($hash)
    {
        $path = "http://localhost:8080/ipfs/{$hash}";
        $response = (new Http())->get()->url($path)->execute();
        return $response;
    }

    /**
     * Pin IPFS hash.
     * @return object Guzzle Response.
     */
    public static function pin($hash)
    {
        $path = "http://localhost:5001/api/v0/pin/add/{$hash}";
        $response = (new Http())->get()->url($path)->execute();
        return json_decode($response);
    }

    /**
     * Get list of pinned IPFS objects.
     * @return object Guzzle Response.
     */
    public static function pinList($type = "all")
    {
        $path = "http://localhost:5001/api/v0/pin/ls?&type={$type}";
        $response = (new Http())->post()->url($path)->execute();
        return json_decode($response);
    }

    /**
     * Delete a pinned IPFS object.
     * @return object Guzzle Response.
     */
    public static function pinRemove($hash)
    {
        $path = "http://localhost:5001/api/v0/pin/rm?&arg={$hash}";
        $response = (new Http())->post()->url($path)->execute();
        return json_decode($response);
    }

    /**
     * Ping an IPFS node.
     * @return object Guzzle Response.
     */
    public static function ping($address)
    {
        $path = "http://localhost:5001/api/v0/ping?arg={$address}";
        $response = (new Http())->get()->url($path)->execute();
        return json_decode($response);
    }

}