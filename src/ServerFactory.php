<?php

namespace Dansup\IPFS;

class ServerFactory
{
    /**
     * Configuration parameters.
     * @var array
     */
    protected $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function getServer()
    {
        $server = new Server(
            $this->getDriver($this->config['driver'])//,
            //$this->getCache(),
            //$this->getApi()
        );
        //$server->setSourcePathPrefix($this->getSourcePathPrefix());
        //$server->setCachePathPrefix($this->getCachePathPrefix());
        //$server->setGroupCacheInFolders($this->getGroupCacheInFolders());
        //$server->setDefaults($this->getDefaults());
        //$server->setPresets($this->getPresets());
        //$server->setBaseUrl($this->getBaseUrl());
        //$server->setResponseFactory($this->getResponseFactory());
        return (new $this->config['driverClass']);
    }

    public function getDrivers()
    {
        return [
        'api' => \Dansup\IPFS\Drivers\Api::class,
        'cli' => \Dansup\IPFS\Drivers\Cli::class
        ];
    }

    public function getDriver($driver)
    {
        $config = $this->config;
        $config['driver'] = $driver;
        $config['driverClass'] = $this->getDrivers()[$driver]; 
        return $config;
    }
    /**
     * Create configured server.
     * @param  array  $config Configuration parameters.
     * @return Server Configured server.
     */
    public static function driver($driver)
    {
        $config = (new self)->getDriver($driver);
        return (new self($config))->getServer();
    }

}
