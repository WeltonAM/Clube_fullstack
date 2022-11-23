<?php

use app\classes\CacheHtml;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

return function($fileName)
{
    return function(Request $request, RequestHandler $handler) use ($fileName) {
        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();

        CacheHtml::set($fileName, $existingContent);

        return $response;
    };
};