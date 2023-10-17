<?php

declare(strict_types=1);

namespace Conesso\ValueObjects\Transporter;

use Conesso\ValueObjects\ResourceUri;
use Http\Discovery\Psr17Factory as RequestFactory;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

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

    public static function create(string $resource, array $parameters): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'POST';
        $uri = ResourceUri::create($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    public static function list(string $resource, array $parameters = []): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'GET';
        $uri = ResourceUri::list($resource);

        return new self($contentType, $method, $uri, $parameters);
    }

    public static function retrieve(string $resource, string $id, string $suffix = null): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'GET';
        $uri = ResourceUri::retrieve($resource, $id, $suffix);

        return new self($contentType, $method, $uri);
    }

    public static function update(string $resource, string $id, array $parameters): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'PUT';
        $uri = ResourceUri::update($resource, $id);

        return new self($contentType, $method, $uri, $parameters);
    }

    public static function delete(string $string, int $id): self
    {
        $contentType = 'application/json; charset=utf-8';
        $method = 'DELETE';
        $uri = ResourceUri::delete($string, (string) $id);

        return new self($contentType, $method, $uri);
    }

    public function toRequest(BaseUri $baseUri, Headers $headers, QueryParams $queryParams): RequestInterface
    {
        $requestFactory = new RequestFactory();

        $body = null;

        $uri = $baseUri->toString().$this->uri->toString();

        $queryParams = $queryParams->toArray();

        if ($this->method === 'GET') {
            $queryParams = [...$queryParams, ...$this->parameters];
        }

        if ($queryParams !== []) {
            $uri .= '?'.http_build_query($queryParams);
        }

        $headers = $headers->withContentType($this->contentType);

        if ($this->method === 'POST' || $this->method === 'PUT') {
            $body = $requestFactory->createStream(json_encode($this->parameters, JSON_THROW_ON_ERROR));
        }

        $request = $requestFactory->createRequest($this->method, $uri);

        if ($body instanceof StreamInterface) {
            $request = $request->withBody($body);
        }

        foreach ($headers->toArray() as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $request;
    }
}
