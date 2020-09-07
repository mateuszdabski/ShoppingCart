<?php

namespace Cart\Controllers;

use Braintree\ClientToken;
use Psr\Http\Message\ResponseInterface as Response;

class BraintreeController
{
    public function token(Response $response)
    {
        return $response->withJson([
           'token' => ClientToken::generate(),
        ]);
    }
}