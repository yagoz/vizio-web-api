<?php
namespace Error\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\Exception\FlattenException;

class ErrorController
{
    public function exceptionAction(FlattenException $exception)
    {   
        $response = new \stdClass();
        $response->Success = false;
        $response->Data = $exception->getMessage();

        return new Response(json_encode($response), $exception->getStatusCode(), array('content-type'=>'application/json'));
    }
}
