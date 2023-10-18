<?php

declare(strict_types=1);

namespace Conesso\Responses\Products;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $id;

    public string $apiReferenceId;

    public string $name;

    public string $sku;

    public string $groupType;

    public float $priceIncTax;

    public float $price;

    public string $visibility;

    public string $status;

    public ?string $createdAt;

    public ?string $updatedAt;

    public ?string $dateCreated;

    public ?string $dateUpdated;

    public ?string $description;

    public ?string $barcode;

    public ?string $uri;

    public ?float $priceTax;

    public ?float $originalPrice;

    public ?float $weight;

    public ?string $weightUnit;

    public ?int $stockQuantity;

    public ?array $productImages;

    public ?array $productCategories;

    public ?array $productOptions;

    public ?array $productLinks;

    public ?array $childVariation;

    public ?array $parentVariation;

    public ?array $customFields;

    public function __construct(
        string $id,
        string $apiReferenceId,
        string $name,
        string $sku,
        string $groupType,
        float $priceIncTax,
        float $price,
        string $visibility,
        string $status,
        string $createdAt = null,
        string $updatedAt = null,
        string $dateCreated = null,
        string $dateUpdated = null,
        string $description = null,
        string $barcode = null,
        string $uri = null,
        float $priceTax = null,
        float $originalPrice = null,
        float $weight = null,
        string $weightUnit = null,
        int $stockQuantity = null,
        array $productImages = null,
        array $productCategories = null,
        array $productOptions = null,
        array $productLinks = null,
        array $childVariation = null,
        array $parentVariation = null,
        array $customFields = null
    ) {
        $this->id = $id;
        $this->apiReferenceId = $apiReferenceId;
        $this->name = $name;
        $this->sku = $sku;
        $this->groupType = $groupType;
        $this->priceIncTax = $priceIncTax;
        $this->price = $price;
        $this->visibility = $visibility;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->dateCreated = $dateCreated;
        $this->dateUpdated = $dateUpdated;
        $this->description = $description;
        $this->barcode = $barcode;
        $this->uri = $uri;
        $this->priceTax = $priceTax;
        $this->originalPrice = $originalPrice;
        $this->weight = $weight;
        $this->weightUnit = $weightUnit;
        $this->stockQuantity = $stockQuantity;
        $this->productImages = $productImages;
        $this->productCategories = $productCategories;
        $this->productOptions = $productOptions;
        $this->productLinks = $productLinks;
        $this->childVariation = $childVariation;
        $this->parentVariation = $parentVariation;
        $this->customFields = $customFields;
    }

    public static function from(array $data): self
    {
        $images = array_map(fn (array $image): \Conesso\Responses\Products\ProductImageResponse => ProductImageResponse::from($image), $data['productImages']);

        return new self(
            $data['id'],
            $data['apiReferenceId'],
            $data['name'],
            $data['sku'],
            $data['groupType'],
            (float) $data['priceIncTax'],
            (float) $data['price'],
            $data['visibility'],
            $data['status'],
            $data['createdAt'] ?? null,
            $data['updatedAt'] ?? null,
            $data['dateCreated'] ?? null,
            $data['dateUpdated'] ?? null,
            $data['description'] ?? null,
            $data['barcode'] ?? null,
            $data['uri'] ?? null,
            (float) $data['priceTax'] ?? null,
            (float) $data['originalPrice'] ?? null,
            (float) $data['weight'] ?? null,
            $data['weightUnit'] ?? null,
            $data['stockQuantity'] ?? null,
            $images,
            $data['productCategories'] ?? null,
            $data['productOptions'] ?? null,
            $data['productLinks'] ?? null,
            $data['childVariation'] ?? null,
            $data['parentVariation'] ?? null,
            $data['customFields'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'apiReferenceId' => $this->apiReferenceId,
            'name' => $this->name,
            'sku' => $this->sku,
            'groupType' => $this->groupType,
            'priceIncTax' => $this->priceIncTax,
            'price' => $this->price,
            'visibility' => $this->visibility,
            'status' => $this->status,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'dateCreated' => $this->dateCreated,
            'dateUpdated' => $this->dateUpdated,
            'description' => $this->description,
            'barcode' => $this->barcode,
            'uri' => $this->uri,
            'priceTax' => $this->priceTax,
            'originalPrice' => $this->originalPrice,
            'weight' => $this->weight,
            'weightUnit' => $this->weightUnit,
            'stockQuantity' => $this->stockQuantity,
            'productImages' => $this->productImages,
            'productCategories' => $this->productCategories,
            'productOptions' => $this->productOptions,
            'productLinks' => $this->productLinks,
            'childVariation' => $this->childVariation,
            'parentVariation' => $this->parentVariation,
            'customFields' => $this->customFields,
        ];
    }
}
