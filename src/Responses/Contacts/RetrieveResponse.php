<?php

declare(strict_types=1);

namespace Conesso\Responses\Contacts;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class RetrieveResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $uid;

    public string $email;

    public string $firstName;

    public string $lastName;

    public string $name;

    public string $preferredName;

    public string $suppressed;

    public string $createdAt;

    public string $createdBy;

    public string $updatedAt;

    public string $updatedBy;

    public string $optInStatus;

    public string $source;

    public string $systemSource;

    public int $engagementScore;

    public bool $isMarketable;

    public ?string $apiIntegration;

    public ?string $apiResource;

    public ?string $gender;

    public ?string $company;

    public ?string $jobTitle;

    public ?string $address;

    public ?string $address2;

    public ?string $city;

    public ?string $county;

    public ?string $postcode;

    public ?string $country;

    public ?string $countryCode;

    public ?array $tags;

    public ?string $industry;

    public ?string $website;

    public ?string $employmentStatus;

    public ?string $ethnicGroup;

    public ?string $device;

    public ?string $apiReferenceId;

    public ?string $optInAt;

    public ?string $optInEmail;

    public ?string $optInConfTime;

    public ?string $phoneNumber;

    public ?string $dateOfBirth;

    public ?string $importId;

    public ?string $lastEmailed;

    public ?string $lastResubscribeEmailSentDate;

    public ?string $lastClicked;

    public ?string $lastIp;

    public ?string $statusLog;

    public ?string $statusAt;

    public ?string $lastOpened;

    public ?string $optOutAt;

    public ?string $contentLocale;

    public ?string $externalCreateAt;

    public ?string $optInSentByUserDate;

    public ?array $customFields;

    public ?array $lists;

    public ?array $suppressedLists;

    public function __construct(
        int $id,
        string $uid,
        string $email,
        string $firstName,
        string $lastName,
        string $name,
        string $preferredName,
        string $suppressed,
        string $createdAt,
        string $createdBy,
        string $updatedAt,
        string $updatedBy,
        string $optInStatus,
        string $source,
        string $systemSource,
        int $engagementScore,
        bool $isMarketable,
        string $apiIntegration = null,
        string $apiResource = null,
        string $gender = null,
        string $company = null,
        string $jobTitle = null,
        string $address = null,
        string $address2 = null,
        string $city = null,
        string $county = null,
        string $postcode = null,
        string $country = null,
        string $countryCode = null,
        ?array $tags = [],
        string $industry = null,
        string $website = null,
        string $employmentStatus = null,
        string $ethnicGroup = null,
        string $device = null,
        string $apiReferenceId = null,
        string $optInAt = null,
        string $optInEmail = null,
        string $optInConfTime = null,
        string $phoneNumber = null,
        string $dateOfBirth = null,
        string $importId = null,
        string $lastEmailed = null,
        string $lastResubscribeEmailSentDate = null,
        string $lastClicked = null,
        string $lastIp = null,
        string $statusLog = null,
        string $statusAt = null,
        string $lastOpened = null,
        string $optOutAt = null,
        string $contentLocale = null,
        string $externalCreateAt = null,
        string $optInSentByUserDate = null,
        ?array $customFields = [],
        ?array $lists = [],
        array $suppressedLists = null
    ) {
        $this->id = $id;
        $this->uid = $uid;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->name = $name;
        $this->preferredName = $preferredName;
        $this->suppressed = $suppressed;
        $this->createdAt = $createdAt;
        $this->createdBy = $createdBy;
        $this->updatedAt = $updatedAt;
        $this->updatedBy = $updatedBy;
        $this->optInStatus = $optInStatus;
        $this->source = $source;
        $this->systemSource = $systemSource;
        $this->engagementScore = $engagementScore;
        $this->isMarketable = $isMarketable;
        $this->apiIntegration = $apiIntegration;
        $this->apiResource = $apiResource;
        $this->gender = $gender;
        $this->company = $company;
        $this->jobTitle = $jobTitle;
        $this->address = $address;
        $this->address2 = $address2;
        $this->city = $city;
        $this->county = $county;
        $this->postcode = $postcode;
        $this->country = $country;
        $this->countryCode = $countryCode;
        $this->tags = $tags;
        $this->industry = $industry;
        $this->website = $website;
        $this->employmentStatus = $employmentStatus;
        $this->ethnicGroup = $ethnicGroup;
        $this->device = $device;
        $this->apiReferenceId = $apiReferenceId;
        $this->optInAt = $optInAt;
        $this->optInEmail = $optInEmail;
        $this->optInConfTime = $optInConfTime;
        $this->phoneNumber = $phoneNumber;
        $this->dateOfBirth = $dateOfBirth;
        $this->importId = $importId;
        $this->lastEmailed = $lastEmailed;
        $this->lastResubscribeEmailSentDate = $lastResubscribeEmailSentDate;
        $this->lastClicked = $lastClicked;
        $this->lastIp = $lastIp;
        $this->statusLog = $statusLog;
        $this->statusAt = $statusAt;
        $this->lastOpened = $lastOpened;
        $this->optOutAt = $optOutAt;
        $this->contentLocale = $contentLocale;
        $this->externalCreateAt = $externalCreateAt;
        $this->optInSentByUserDate = $optInSentByUserDate;
        $this->customFields = $customFields;
        $this->lists = $lists;
        $this->suppressedLists = $suppressedLists;
    }

    public static function from(array $attributes): self
    {
        return new self(
            $attributes['id'],
            $attributes['uid'],
            $attributes['email'],
            $attributes['firstName'] ?? '',
            $attributes['lastName'] ?? '',
            $attributes['name'] ?? '',
            $attributes['preferredName'] ?? '',
            $attributes['suppressed'],
            $attributes['createdAt'],
            $attributes['createdBy'],
            $attributes['updatedAt'],
            $attributes['updatedBy'],
            $attributes['optInStatus'],
            $attributes['source'] ?? '',
            $attributes['systemSource'],
            $attributes['engagementScore'],
            $attributes['isMarketable'],
            $attributes['apiIntegration'],
            $attributes['apiResource'],
            $attributes['gender'],
            $attributes['company'],
            $attributes['jobTitle'],
            $attributes['address'],
            $attributes['address2'],
            $attributes['city'],
            $attributes['county'],
            $attributes['postcode'],
            $attributes['country'],
            $attributes['countryCode'],
            $attributes['tags'],
            $attributes['industry'],
            $attributes['website'],
            $attributes['employmentStatus'],
            $attributes['ethnicGroup'],
            $attributes['device'],
            $attributes['apiReferenceId'],
            $attributes['optInAt'],
            $attributes['optInEmail'],
            $attributes['optInConfTime'],
            $attributes['phoneNumber'],
            $attributes['dateOfBirth'],
            $attributes['importId'],
            $attributes['lastEmailed'],
            $attributes['lastResubscribeEmailSentDate'],
            $attributes['lastClicked'],
            $attributes['lastIp'],
            $attributes['statusLog'],
            $attributes['statusAt'],
            $attributes['lastOpened'],
            $attributes['optOutAt'],
            $attributes['contentLocale'],
            $attributes['externalCreateAt'],
            $attributes['optInSentByUserDate'],
            $attributes['customFields'],
            $attributes['lists'] ?? [],
            $attributes['suppressedLists'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'name' => $this->name,
            'preferredName' => $this->preferredName,
            'suppressed' => $this->suppressed,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
            'optInStatus' => $this->optInStatus,
            'source' => $this->source,
            'systemSource' => $this->systemSource,
            'engagementScore' => $this->engagementScore,
            'isMarketable' => $this->isMarketable,
            'apiIntegration' => $this->apiIntegration,
            'apiResource' => $this->apiResource,
            'gender' => $this->gender,
            'company' => $this->company,
            'jobTitle' => $this->jobTitle,
            'address' => $this->address,
            'address2' => $this->address2,
            'city' => $this->city,
            'county' => $this->county,
            'postcode' => $this->postcode,
            'country' => $this->country,
            'countryCode' => $this->countryCode,
            'tags' => $this->tags,
            'industry' => $this->industry,
            'website' => $this->website,
            'employmentStatus' => $this->employmentStatus,
            'ethnicGroup' => $this->ethnicGroup,
            'device' => $this->device,
            'apiReferenceId' => $this->apiReferenceId,
            'optInAt' => $this->optInAt,
            'optInEmail' => $this->optInEmail,
            'optInConfTime' => $this->optInConfTime,
            'phoneNumber' => $this->phoneNumber,
            'dateOfBirth' => $this->dateOfBirth,
            'importId' => $this->importId,
            'lastEmailed' => $this->lastEmailed,
            'lastResubscribeEmailSentDate' => $this->lastResubscribeEmailSentDate,
            'lastClicked' => $this->lastClicked,
            'lastIp' => $this->lastIp,
            'statusLog' => $this->statusLog,
            'statusAt' => $this->statusAt,
            'lastOpened' => $this->lastOpened,
            'optOutAt' => $this->optOutAt,
            'contentLocale' => $this->contentLocale,
            'externalCreateAt' => $this->externalCreateAt,
            'optInSentByUserDate' => $this->optInSentByUserDate,
            'customFields' => $this->customFields,
            'lists' => $this->lists,
            'suppressedLists' => $this->suppressedLists,
        ];
    }
}
