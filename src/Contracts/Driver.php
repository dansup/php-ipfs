<?php

namespace Dansup\IPFS\Contracts;

use Dansup\IPFS\Utils\Http;

trait Driver {
    /**
     * Add content to IPFS.
     * @return object Guzzle Response.
     */
    public static function add($content)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/add',
        'method'  => 'POST',
        'query'   => null,
        'file'    => $content
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Perform directory listing of IPFS hash.
     * @return object Guzzle Response.
     */
    public static function ls($hash)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/ls/'.$hash,
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Get file size of an IPFS Object.
     * @return object Guzzle Response.
     */
    public static function size($hash)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/object/stat/'.$hash,
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * cat an IPFS Object.
     * @return object Guzzle Response.
     */
    public static function cat($hash)
    {
        $api = [
        'path'    => 'http://localhost:8080/ipfs/'.$hash,
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return $response;
    }

    /**
     * Pin IPFS hash.
     * @return object Guzzle Response.
     */
    public static function pin($hash)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/pin/add/'.$hash,
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Get list of pinned IPFS objects.
     * @return object Guzzle Response.
     */
    public static function pinList($type = "all")
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/pin/ls',
        'method'  => 'GET',
        'query'   => ['type'=> $type],
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Delete a pinned IPFS object.
     * @return object Guzzle Response.
     */
    public static function pinRemove($hash)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/pin/rm',
        'method'  => 'POST',
        'query'   => ['arg'=> $hash],
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Ping an IPFS node.
     * @return object Guzzle Response.
     */
    public static function ping($address)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/ping',
        'method'  => 'GET',
        'query'   => ['arg'=> $address],
        'file'    => null
        ];
        $cmd = null;
        $response = parent::handleCall($api, $cmd);
        return json_decode($response);
    }
}