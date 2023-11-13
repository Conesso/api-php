<?php

declare(strict_types=1);

namespace Conesso\Responses\Products;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class ProductImageResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $id;

    public string $productId;

    public string $uri;

    public ?string $uriImageMd5;

    public ?string $s3Url;

    public ?string $s3ImageMd5;

    public ?string $dateS3Built;

    public ?string $imageName;

    public ?string $position;

    public function __construct(
        string $id,
        string $productId,
        string $uri,
        ?string $uriImageMd5,
        ?string $s3Url,
        ?string $s3ImageMd5,
        ?string $dateS3Built,
        ?string $imageName,
        ?string $position
    ) {
        $this->id = $id;
        $this->productId = $productId;
        $this->uri = $uri;
        $this->uriImageMd5 = $uriImageMd5;
        $this->s3Url = $s3Url;
        $this->s3ImageMd5 = $s3ImageMd5;
        $this->dateS3Built = $dateS3Built;
        $this->imageName = $imageName;
        $this->position = $position;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['id'],
            $data['productId'],
            $data['uri'],
            $data['uriImageMd5'] ?? null,
            $data['s3Url'] ?? null,
            $data['s3ImageMd5'] ?? null,
            $data['dateS3Built'] ?? null,
            $data['imageName'] ?? null,
            $data['position'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'productId' => $this->productId,
            'uri' => $this->uri,
            'uriImageMd5' => $this->uriImageMd5,
            's3Url' => $this->s3Url,
            's3ImageMd5' => $this->s3ImageMd5,
            'dateS3Built' => $this->dateS3Built,
            'imageName' => $this->imageName,
            'position' => $this->position,
        ];
    }
}
