<?php

declare(strict_types=1);

namespace Conesso\Transporters;

use Conesso\Contracts\TransporterContract;
use Conesso\Exceptions\ErrorException;
use Conesso\Exceptions\UnserializableResponse;
use Conesso\ValueObjects\Transporter\BaseUri;
use Conesso\ValueObjects\Transporter\Headers;
use Conesso\ValueObjects\Transporter\Payload;
use Conesso\ValueObjects\Transporter\QueryParams;
use Conesso\ValueObjects\Transporter\Response;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class HttpTransporter implements TransporterContract
{
    private ClientInterface $httpClient;

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

    /**
     * @throws \Conesso\Exceptions\UnserializableResponse
     * @throws \Conesso\Exceptions\ErrorException
     */
    public function requestObject(Payload $payload): Response
    {
        $request = $payload->toRequest($this->baseUri, $this->headers, $this->queryParams);

        $response = $this->sendRequest($request);

        $contents = $response->getBody()->getContents();

        $this->throwIfJsonError($response, $contents);

        try {
            $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new \RuntimeException('Could not decode response body', 0, $e);
        }

        if (isset($data['data'])) {
            $data = $data['data'];
        }

        return Response::from($data, $data['metaData'] ?? null);
    }

    private function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->httpClient->sendRequest($request);
    }

    private function throwIfJsonError(ResponseInterface $response, mixed $contents): void
    {
        if ($response->getStatusCode() < 400) {
            return;
        }

        if (! str_contains($response->getHeaderLine('Content-Type'), 'application/json')) {
            return;
        }

        if ($contents instanceof ResponseInterface) {
            $contents = $contents->getBody()->getContents();
        }

        try {
            $response = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

            if (isset($response['error'])) {
                throw new ErrorException($response['error']);
            }
        } catch (\JsonException $jsonException) {
            throw new UnserializableResponse($jsonException);
        }
    }
}
