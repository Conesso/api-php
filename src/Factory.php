<?php

declare(strict_types=1);

namespace Conesso;

use Conesso\Contracts\TransporterContract;
use Conesso\ValueObjects\Transporter\BaseUri;
use Conesso\ValueObjects\Transporter\Headers;
use Conesso\ValueObjects\Transporter\QueryParams;

final class Factory
{
    private ?TransporterContract $transporter;

    private ?string $apiKey = null;
    private ?string $baseUri = null;

    private array $headers = [];

    private array $queryParams = [];

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

    public function withTransporter(TransporterContract $transporter): self
    {
        $this->transporter = $transporter;

        return $this;
    }

    public function withHttpClient($httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function make(): Client
    {
        $headers = Headers::create();
        $baseUri = BaseUri::from($this->baseUri ?: 'api.conesso.io');
        $queryParams = QueryParams::create();
        $httpClient = $this->httpClient ??= null; //@todo implement http client discovery

        if (! is_null($this->apiKey)) {
            $headers = $headers->withAuthorization($this->apiKey);
        }

        foreach ($this->headers as $name => $value) {
            $headers = $headers->withHeader($name, $value);
        }

        foreach ($this->queryParams as $name => $value) {
            $queryParams = $queryParams->withParam($name, $value);
        }

        if (! $this->transporter instanceof TransporterContract) {
            $this->transporter = new Transporter($httpClient, $baseUri, $headers, $queryParams);
        }

        return new Client($this->transporter);
    }
}
