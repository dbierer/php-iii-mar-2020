<?php
namespace FlyingElephantService\Middleware;
use Psr\Http\Message\{ResponseInterface,ServerRequestInterface, StatusCodeInterface as StatusCode};
use Psr\Http\Server\{MiddlewareInterface,RequestHandlerInterface};
use Zend\Diactoros\Response\JsonResponse;
use FlyingElephantService\V1\Rest\PropulsionSystems\PropulsionSystemsResource;

class AuthCheckMiddleware implements MiddlewareInterface
{
    const ERROR_METHOD = 'ERROR: method not supported';
    const ERROR_AUTH   = 'Not Authorized';
	protected $resource, $auth;
	public function __construct(PropulsionSystemsResource $resource, $auth)
	{
		$this->resource = $resource;
        $this->auth     = $auth;
	}
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $allowed = FALSE;
        $method = $request->getMethod();
        $auth = $this->auth['authorization'][PropulsionSystemsResource::class];
        if ($request->getAttribute('id', 0) && $auth['entity'][$method]) {
            $allowed = TRUE;
        } elseif ($auth['collection'][$method]) {
            $allowed = TRUE;
        }
        if ($allowed) {
            $response = $handler->handle($request);
        } else {
            $response = new JsonResponse(['error' => self::ERROR_METHOD], StatusCode::STATUS_UNAUTHORIZED);
        }
        return $response;
    }
}
