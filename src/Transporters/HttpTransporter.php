<?php

declare(strict_types=1);

namespace Conesso\Transporters;

use Conesso\Contracts\TransporterContract;
use Conesso\ValueObjects\Transporter\BaseUri;
use Conesso\ValueObjects\Transporter\Headers;
use Conesso\ValueObjects\Transporter\QueryParams;

class HttpTransporter implements TransporterContract
{
    private $httpClient;
    /**
     * @var \Conesso\ValueObjects\Transporter\BaseUri
     */
    private BaseUri $baseUri;
    /**
     * @var \Conesso\ValueObjects\Transporter\Headers
     */
    private Headers $headers;
    /**
     * @var \Conesso\ValueObjects\Transporter\QueryParams
     */
    private QueryParams $queryParams;

    public function __construct(
        $httpClient,
        BaseUri $baseUri,
        Headers $headers,
        QueryParams $queryParams
    ) {
        $this->httpClient = $httpClient;
        $this->baseUri = $baseUri;
        $this->headers = $headers;
        $this->queryParams = $queryParams;
    }

    public function requestObject(): mixed
    {
        // TODO: Implement requestObject() method.
    }
}
