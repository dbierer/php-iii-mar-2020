<?php
namespace FlyingElephantService\Middleware;
use Psr\Http\Message\{ResponseInterface, ServerRequestInterface,
    StatusCodeInterface as StatusCode};
use Psr\Http\Server\{MiddlewareInterface, RequestHandlerInterface};
use Zend\Validator\Uuid;
use Zend\Diactoros\Response\JsonResponse;

class UuidCheckMiddleware implements MiddlewareInterface
{
    const ERROR_UUID = 'ERROR: improper ID';
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler)
        : ResponseInterface
    {
        $id       = $request->getAttribute('id', 0);        
        $uuid     = new Uuid();
        $response = $handler->handle($request);
            
        // check if $id is present
        if ($id && !$uuid->isValid($id)) {
            $response = new JsonResponse(['error' => self::ERROR_UUID], StatusCode::STATUS_NOT_ACCEPTABLE);
        }
        return $response;
    }
}
