<?php

declare(strict_types=1);

namespace Conesso\Transporters;

use Conesso\Contracts\TransporterContract;
use Conesso\ValueObjects\Transporter\BaseUri;
use Conesso\ValueObjects\Transporter\Headers;
use Conesso\ValueObjects\Transporter\Payload;
use Conesso\ValueObjects\Transporter\QueryParams;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

final class HttpTransporter implements TransporterContract
{
    private \Psr\Http\Client\ClientInterface $httpClient;

    private BaseUri $baseUri;

    private Headers $headers;

    private QueryParams $queryParams;

    public function __construct(
        ClientInterface $httpClient,
        BaseUri $baseUri,
        Headers $headers,
        QueryParams $queryParams
    ) {
        $this->httpClient = $httpClient;
        $this->baseUri = $baseUri;
        $this->headers = $headers;
        $this->queryParams = $queryParams;
    }

    public function requestObject(Payload $payload): mixed
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        $response = $this->sendRequest($request);

        $contents = $response->getBody()->getContents();

        if (str_contains($response->getHeaderLine('Content-Type'), 'text/plain')) {
            return $contents;
        }

        return json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
    }

    private function sendRequest(RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->sendRequest($request);
    }
}
