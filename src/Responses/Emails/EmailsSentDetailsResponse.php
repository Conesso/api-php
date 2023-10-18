<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Contracts\ResponseContract;
use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsSentDetailsResponse implements ResponseContract
{
    use ArrayAccessible;

    public int $totalContacts;

    public int $deliveredToCount;

    public int $bouncedCount;

    public int $droppedCount;

    public int $totalOpens;

    public int $totalUniqueOpens;

    public int $totalClickThroughs;

    public int $totalUniqueClickThroughs;

    public int $unsubscribeCount;

    public int $complaintsCount;

    public function __construct(
        int $totalContacts,
        int $deliveredToCount,
        int $bouncedCount,
        int $droppedCount,
        int $totalOpens,
        int $totalUniqueOpens,
        int $totalClickThroughs,
        int $totalUniqueClickThroughs,
        int $unsubscribeCount,
        int $complaintsCount
    ) {
        $this->totalContacts = $totalContacts;
        $this->deliveredToCount = $deliveredToCount;
        $this->bouncedCount = $bouncedCount;
        $this->droppedCount = $droppedCount;
        $this->totalOpens = $totalOpens;
        $this->totalUniqueOpens = $totalUniqueOpens;
        $this->totalClickThroughs = $totalClickThroughs;
        $this->totalUniqueClickThroughs = $totalUniqueClickThroughs;
        $this->unsubscribeCount = $unsubscribeCount;
        $this->complaintsCount = $complaintsCount;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['totalContacts'],
            $data['deliveredToCount'],
            $data['bouncedCount'],
            $data['droppedCount'],
            $data['totalOpens'],
            $data['totalUniqueOpens'],
            $data['totalClickThroughs'],
            $data['totalUniqueClickThroughs'],
            $data['unsubscribeCount'],
            $data['complaintsCount'],
        );
    }

    public function toArray(): array
    {
        return [
            'totalContacts' => $this->totalContacts,
            'deliveredToCount' => $this->deliveredToCount,
            'bouncedCount' => $this->bouncedCount,
            'droppedCount' => $this->droppedCount,
            'totalOpens' => $this->totalOpens,
            'totalUniqueOpens' => $this->totalUniqueOpens,
            'totalClickThroughs' => $this->totalClickThroughs,
            'totalUniqueClickThroughs' => $this->totalUniqueClickThroughs,
            'unsubscribeCount' => $this->unsubscribeCount,
            'complaintsCount' => $this->complaintsCount,
        ];
    }
}
