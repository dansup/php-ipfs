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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
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
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Removes repo lockfiles.
     * @return object Guzzle Response.
     */
    public static function fsck()
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/repo/fsck',
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Sweep the local set of stored objects and remove ones that are not
     * pinned in order to reclaim hard disk space.
     * @return object Guzzle Response.
     */
    public static function gc()
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/repo/gc',
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Get stats for the currently used repo. This is a plumbing command that 
     * will scan the local set of stored objects and print repo statistics.
     * @return object Guzzle Response.
     */
    public static function stat()
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/repo/stat',
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Show repo version.
     * @return object Guzzle Response.
     */
    public static function version()
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/repo/version',
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * There are a number of mutable name protocols that can link among 
     * themselves and into IPNS. For example IPNS references can (currently) 
     * point at an IPFS object, and DNS links can point at other DNS links, 
     * IPNS entries, or IPFS objects. This command accepts any of these 
     * identifiers and resolves them to the referenced item.
     * @return object Guzzle Response.
     */
    public static function resolve($arg)
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/resolve',
        'method'  => 'GET',
        'query'   => ['arg'=>$query],
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * Print ipfs bandwidth information.
     * @return object Guzzle Response.
     */
    public static function bw($peer=null)
    {
        $query = null;
        if($peer !== null) {
          $query = ['peer' => $peer];
        }
        $api = [
        'path'    => 'http://localhost:5001/api/v0/stats/bw',
        'method'  => 'POST',
        'query'   => $query,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    }

    /**
     * List known addresses.
     * @return object Guzzle Response.
     */
    public static function swarmAddrs()
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/swarm/addrs',
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    } 

    /**
     * List all local addresses the node is listening on.
     * @return object Guzzle Response.
     */
    public static function swarmLocalAddrs()
    {
        $api = [
        'path'    => 'http://localhost:5001/api/v0/swarm/addrs/local',
        'method'  => 'GET',
        'query'   => null,
        'file'    => null
        ];
        $cmd = null;
        $response = (new self())->handleCall($api, $cmd);
        return json_decode($response);
    } 
}