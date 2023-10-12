<?php

use Conesso\Client;
use Conesso\Contracts\TransporterContract;
use Conesso\ValueObjects\ApiKey;
use Conesso\ValueObjects\Transporter\BaseUri;
use Conesso\ValueObjects\Transporter\Headers;
use Conesso\ValueObjects\Transporter\Payload;
use Conesso\ValueObjects\Transporter\QueryParams;
use Conesso\ValueObjects\Transporter\Response;

function mockConessoClient(string $method, string $resource, array $parameters, Response $response): Client
{
    $transporter = Mockery::mock(TransporterContract::class);

    $transporter
        ->shouldReceive('requestObject')
        ->once()
        ->withArgs(function (Payload $payload) use ($method, $resource) {

            $baseUri = BaseUri::from('api.conesso.com/v2');
            $headers = Headers::create()->withAuthorization(ApiKey::from('foo'));
            $queryParams = QueryParams::create();

            $request = $payload->toRequest($baseUri, $headers, $queryParams);

            return $request->getMethod() === $method
                && $request->getUri()->getPath() === "/v2/$resource";
        })->andReturn($response);

    return new Client($transporter);
}
