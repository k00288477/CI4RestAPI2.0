<?php namespace App\Libraries;

use \OAuth2\Storage\Pdo;


// Authentication Library

// Must uncomment the nessecary database property in the .env file 
// TODO: install OAuth dependency in project
class OAuth
{
    var $server;

    function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $dsn = 'mysql:dbname=' . getenv('database.default.database') . ';host=' . getenv('database.default.hostname');
        $username = getenv('database.default.username');
        $password = getenv('database.default.password');
        // PDO installation
        $storage = new Pdo(['dsn' => $dsn, 'username' => $username, 'password' => $password ]);
        // initalise OAuth2 server
        $this->server = new \OAuth2\Server($storage);
        // grant type for access
        $this->server->addGrantType(new \OAuth2\GrantType\UserCredentials($storage));
    }
}