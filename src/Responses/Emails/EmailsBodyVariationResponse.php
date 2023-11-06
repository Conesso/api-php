<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsBodyVariationResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $id;

    public string $uid;

    public string $activeVersion;

    public int $versionsCount;

    public array $versions;

    public array $rowVariations;

    public function __construct(
        int $id,
        string $uid,
        string $activeVersion,
        int $versionsCount,
        array $versions,
        array $rowVariations = []
    ) {
        $this->id = $id;
        $this->uid = $uid;
        $this->activeVersion = $activeVersion;
        $this->versionsCount = $versionsCount;
        $this->versions = $versions;
        $this->rowVariations = $rowVariations;
    }

    public static function from(array $data): self
    {
        $versions = array_map(fn (array $version): EmailsBodyVersionResponse => EmailsBodyVersionResponse::from(
            $version
        ), $data['versions']);

        return new self(
            $data['id'],
            $data['uid'],
            $data['activeVersion'],
            $data['versionsCount'],
            $versions,
            $data['rowVariations']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'activeVersion' => $this->activeVersion,
            'versionsCount' => $this->versionsCount,
            'versions' => array_map(fn (EmailsBodyVersionResponse $version): array => $version->toArray(), $this->versions),
            'rowVariations' => $this->rowVariations,
        ];
    }
}
