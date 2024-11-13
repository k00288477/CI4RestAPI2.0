<?php namespace App\Controllers;

use \App\Libraries\OAuth;
use \OAuth2\Request;
Use CodeIgniter\API\ResponseTrait;

class LoginController extends BaseController
{
    use ResponseTrait;

    public function login(){
        $oauth = new OAuth;
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();
        
        return $this->respond(json_decode($body), $code); // CodeIgniter ResponseTrait. json decode the response body, send code as is
    }


}
