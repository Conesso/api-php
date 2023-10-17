<?php

declare(strict_types=1);

namespace Conesso\Responses\Carts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class CreateResponse implements ResponseContract
{
    use ArrayAccessible;

    public string $id;

    public string $customerEmail;

    public string $apiReferenceId;

    public bool $customerIsGuest;

    public array $cartProducts;

    public ?int $contactId;

    public ?string $orderId;

    public ?string $apiIntegration;

    public ?string $apiResource;

    public ?string $createdAt;

    public ?string $updatedAt;

    public ?string $cartCreatedAt;

    public ?string $cartUpdatedAt;

    public ?bool $confirmedIsAbandoned;

    public ?string $dateConfirmedIsAbandoned;

    public ?string $recoverCartUrl;

    public ?string $externalOrderId;

    public ?bool $isActive;

    public ?float $total;

    public ?float $totalIncTax;

    public ?string $isoCurrencyCode;

    public ?int $numberOfProducts;

    public ?float $abandonedTotal;

    public ?float $abandonedTotalWithDiscount;

    public ?float $abandonedTotalDiscount;

    public ?string $customerFirstname;

    public ?string $customerLastname;

    public ?string $customerGender;

    public ?string $customerTelephone;

    public ?string $customerMobile;

    public ?string $customerDob;

    public ?string $customerNotes;

    public ?string $billingFirstname;

    public ?string $billingLastname;

    public ?string $billingAddress1;

    public ?string $billingAddress2;

    public ?string $billingCity;

    public ?string $billingCounty;

    public ?string $billingPostcode;

    public ?string $billingCountry;

    public ?string $shippingFirstname;

    public ?string $shippingLastname;

    public ?string $shippingAddress1;

    public ?string $shippingAddress2;

    public ?string $shippingCity;

    public ?string $shippingCounty;

    public ?string $shippingCountry;

    public ?string $shippingPostcode;

    public ?array $customFields;

    public function __construct(
        string $id,
        string $customerEmail,
        string $apiReferenceId,
        bool $customerIsGuest,
        array $cartProducts,
        int $contactId = null,
        string $orderId = null,
        string $apiIntegration = null,
        string $apiResource = null,
        string $createdAt = null,
        string $updatedAt = null,
        string $cartCreatedAt = null,
        string $cartUpdatedAt = null,
        bool $confirmedIsAbandoned = null,
        string $dateConfirmedIsAbandoned = null,
        string $recoverCartUrl = null,
        string $externalOrderId = null,
        bool $isActive = null,
        float $total = null,
        float $totalIncTax = null,
        string $isoCurrencyCode = null,
        int $numberOfProducts = null,
        float $abandonedTotal = null,
        float $abandonedTotalWithDiscount = null,
        float $abandonedTotalDiscount = null,
        string $customerFirstname = null,
        string $customerLastname = null,
        string $customerGender = null,
        string $customerTelephone = null,
        string $customerMobile = null,
        string $customerDob = null,
        string $customerNotes = null,
        string $billingFirstname = null,
        string $billingLastname = null,
        string $billingAddress1 = null,
        string $billingAddress2 = null,
        string $billingCity = null,
        string $billingCounty = null,
        string $billingPostcode = null,
        string $billingCountry = null,
        string $shippingFirstname = null,
        string $shippingLastname = null,
        string $shippingAddress1 = null,
        string $shippingAddress2 = null,
        string $shippingCity = null,
        string $shippingCounty = null,
        string $shippingCountry = null,
        string $shippingPostcode = null,
        array $customFields = null
    ) {
        $this->id = $id;
        $this->customerEmail = $customerEmail;
        $this->apiReferenceId = $apiReferenceId;
        $this->customerIsGuest = $customerIsGuest;
        $this->cartProducts = $cartProducts;
        $this->contactId = $contactId;
        $this->orderId = $orderId;
        $this->apiIntegration = $apiIntegration;
        $this->apiResource = $apiResource;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->cartCreatedAt = $cartCreatedAt;
        $this->cartUpdatedAt = $cartUpdatedAt;
        $this->confirmedIsAbandoned = $confirmedIsAbandoned;
        $this->dateConfirmedIsAbandoned = $dateConfirmedIsAbandoned;
        $this->recoverCartUrl = $recoverCartUrl;
        $this->externalOrderId = $externalOrderId;
        $this->isActive = $isActive;
        $this->total = $total;
        $this->totalIncTax = $totalIncTax;
        $this->isoCurrencyCode = $isoCurrencyCode;
        $this->numberOfProducts = $numberOfProducts;
        $this->abandonedTotal = $abandonedTotal;
        $this->abandonedTotalWithDiscount = $abandonedTotalWithDiscount;
        $this->abandonedTotalDiscount = $abandonedTotalDiscount;
        $this->customerFirstname = $customerFirstname;
        $this->customerLastname = $customerLastname;
        $this->customerGender = $customerGender;
        $this->customerTelephone = $customerTelephone;
        $this->customerMobile = $customerMobile;
        $this->customerDob = $customerDob;
        $this->customerNotes = $customerNotes;
        $this->billingFirstname = $billingFirstname;
        $this->billingLastname = $billingLastname;
        $this->billingAddress1 = $billingAddress1;
        $this->billingAddress2 = $billingAddress2;
        $this->billingCity = $billingCity;
        $this->billingCounty = $billingCounty;
        $this->billingPostcode = $billingPostcode;
        $this->billingCountry = $billingCountry;
        $this->shippingFirstname = $shippingFirstname;
        $this->shippingLastname = $shippingLastname;
        $this->shippingAddress1 = $shippingAddress1;
        $this->shippingAddress2 = $shippingAddress2;
        $this->shippingCity = $shippingCity;
        $this->shippingCounty = $shippingCounty;
        $this->shippingCountry = $shippingCountry;
        $this->shippingPostcode = $shippingPostcode;
        $this->customFields = $customFields;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['id'],
            $data['customerEmail'],
            $data['apiReferenceId'],
            (bool) $data['customerIsGuest'],
            $data['cartProducts'],
            $data['contactId'] ?? null,
            $data['orderId'] ?? null,
            $data['apiIntegration'] ?? null,
            $data['apiResource'] ?? null,
            $data['createdAt'] ?? null,
            $data['updatedAt'] ?? null,
            $data['cartCreatedAt'] ?? null,
            $data['cartUpdatedAt'] ?? null,
            $data['confirmedIsAbandoned'] ?? null,
            $data['dateConfirmedIsAbandoned'] ?? null,
            $data['recoverCartUrl'] ?? null,
            $data['externalOrderId'] ?? null,
            filter_var($data['isActive'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            $data['total'] ?? null,
            $data['totalIncTax'] ?? null,
            $data['isoCurrencyCode'] ?? null,
            $data['numberOfProducts'] ?? null,
            $data['abandonedTotal'] ?? null,
            $data['abandonedTotalWithDiscount'] ?? null,
            $data['abandonedTotalDiscount'] ?? null,
            $data['customerFirstname'] ?? null,
            $data['customerLastname'] ?? null,
            $data['customerGender'] ?? null,
            $data['customerTelephone'] ?? null,
            $data['customerMobile'] ?? null,
            $data['customerDob'] ?? null,
            $data['customerNotes'] ?? null,
            $data['billingFirstname'] ?? null,
            $data['billingLastname'] ?? null,
            $data['billingAddress1'] ?? null,
            $data['billingAddress2'] ?? null,
            $data['billingCity'] ?? null,
            $data['billingCounty'] ?? null,
            $data['billingPostcode'] ?? null,
            $data['billingCountry'] ?? null,
            $data['shippingFirstname'] ?? null,
            $data['shippingLastname'] ?? null,
            $data['shippingAddress1'] ?? null,
            $data['shippingAddress2'] ?? null,
            $data['shippingCity'] ?? null,
            $data['shippingCounty'] ?? null,
            $data['shippingCountry'] ?? null,
            $data['shippingPostcode'] ?? null,
            $data['customFields'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'customerEmail' => $this->customerEmail,
            'apiReferenceId' => $this->apiReferenceId,
            'customerIsGuest' => $this->customerIsGuest,
            'cartProducts' => $this->cartProducts,
            'contactId' => $this->contactId,
            'orderId' => $this->orderId,
            'apiIntegration' => $this->apiIntegration,
            'apiResource' => $this->apiResource,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'cartCreatedAt' => $this->cartCreatedAt,
            'cartUpdatedAt' => $this->cartUpdatedAt,
            'confirmedIsAbandoned' => $this->confirmedIsAbandoned,
            'dateConfirmedIsAbandoned' => $this->dateConfirmedIsAbandoned,
            'recoverCartUrl' => $this->recoverCartUrl,
            'externalOrderId' => $this->externalOrderId,
            'isActive' => $this->isActive,
            'total' => $this->total,
            'totalIncTax' => $this->totalIncTax,
            'isoCurrencyCode' => $this->isoCurrencyCode,
            'numberOfProducts' => $this->numberOfProducts,
            'abandonedTotal' => $this->abandonedTotal,
            'abandonedTotalWithDiscount' => $this->abandonedTotalWithDiscount,
            'abandonedTotalDiscount' => $this->abandonedTotalDiscount,
            'customerFirstname' => $this->customerFirstname,
            'customerLastname' => $this->customerLastname,
            'customerGender' => $this->customerGender,
            'customerTelephone' => $this->customerTelephone,
            'customerMobile' => $this->customerMobile,
            'customerDob' => $this->customerDob,
            'customerNotes' => $this->customerNotes,
            'billingFirstname' => $this->billingFirstname,
            'billingLastname' => $this->billingLastname,
            'billingAddress1' => $this->billingAddress1,
            'billingAddress2' => $this->billingAddress2,
            'billingCity' => $this->billingCity,
            'billingCounty' => $this->billingCounty,
            'billingPostcode' => $this->billingPostcode,
            'billingCountry' => $this->billingCountry,
            'shippingFirstname' => $this->shippingFirstname,
            'shippingLastname' => $this->shippingLastname,
            'shippingAddress1' => $this->shippingAddress1,
            'shippingAddress2' => $this->shippingAddress2,
            'shippingCity' => $this->shippingCity,
            'shippingCounty' => $this->shippingCounty,
            'shippingCountry' => $this->shippingCountry,
            'shippingPostcode' => $this->shippingPostcode,
            'customFields' => $this->customFields,
        ];
    }
}
