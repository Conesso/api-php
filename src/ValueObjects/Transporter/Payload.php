<?php

declare(strict_types=1);

namespace Conesso\ValueObjects\Transporter;

use Conesso\ValueObjects\ResourceUri;
use Http\Discovery\Psr17Factory as RequestFactory;
use Psr\Http\Message\RequestInterface;

final class Payload
{
    private string $contentType;

    private string $method;

    private ResourceUri $uri;

    private array $parameters;

    public function __construct(
        string $contentType,
        string $method,
        ResourceUri $uri,
        array $parameters = []
    ) {
        $this->contentType = $contentType;
        $this->method = $method;
        $this->uri = $uri;
        $this->parameters = $parameters;
    }

    public static function list(string $string, array $parameters = []): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'GET';
        $uri = ResourceUri::list($string);

        return new self($contentType, $method, $uri, $parameters);
    }

    public static function retrieve(string $resource, int $id): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'GET';
        $uri = ResourceUri::retrieve($resource, (string) $id, null);

        return new self($contentType, $method, $uri);
    }

    public function toRequest(BaseUri $baseUri, Headers $headers, QueryParams $queryParams): RequestInterface
    {
        $requestFactory = new RequestFactory();

        $uri = $baseUri->toString().$this->uri->toString();

        $queryParams = $queryParams->toArray();

        if ($this->method === 'GET') {
            $queryParams = [...$queryParams, ...$this->parameters];
        }

        if ($queryParams !== []) {
            $uri .= '?'.http_build_query($queryParams);
        }

        $headers = $headers->withContentType($this->contentType);

        $request = $requestFactory->createRequest($this->method, $uri);

        foreach ($headers->toArray() as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
