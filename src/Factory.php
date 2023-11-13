<?php

declare(strict_types=1);

namespace Conesso;

use Conesso\Transporters\HttpTransporter;
use Conesso\ValueObjects\ApiKey;
use Conesso\ValueObjects\Transporter\BaseUri;
use Conesso\ValueObjects\Transporter\Headers;
use Conesso\ValueObjects\Transporter\QueryParams;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;

final class Factory
{
    private ?string $apiKey = null;

    private ?string $baseUri = null;

    private array $headers = [];

    private array $queryParams = [];

    private ClientInterface $httpClient;

    public function withApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function withBaseUri(string $uri): self
    {
        $this->baseUri = $uri;

        return $this;
    }

    public function withHttpHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function withQueryParam(string $name, string $value): self
    {
        $this->queryParams[$name] = $value;

        return $this;
    }

    public function withHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function make(): Client
    {
        $headers = Headers::create();
        $baseUri = BaseUri::from($this->baseUri ?: 'api.conesso.io');
        $queryParams = QueryParams::create();
        $httpClient = $this->httpClient ??= Psr18ClientDiscovery::find();

        if (! is_null($this->apiKey)) {
            $headers = $headers->withAuthorization(ApiKey::from($this->apiKey));
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withHeader($name, $value);
        }

        foreach ($this->queryParams as $name => $value) {
            $queryParams = $queryParams->withParam($name, $value);
        }

        $transporter = new HttpTransporter($httpClient, $baseUri, $headers, $queryParams);

        return new Client($transporter);
    }
}
