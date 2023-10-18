<?php

declare(strict_types=1);

namespace Conesso\Responses\Emails;

use Conesso\Responses\Concerns\ArrayAccessible;

final class EmailsBodyContentResponse implements EmailBodyContentContract
{
    use ArrayAccessible;

    public string $jsonContent;

    public string $htmlContent;

    public string $txtContent;

    public function __construct(
        string $jsonContent,
        string $htmlContent,
        string $txtContent
    ) {
        $this->jsonContent = $jsonContent;
        $this->htmlContent = $htmlContent;
        $this->txtContent = $txtContent;
    }

    public static function from(array $data): self
    {
        return new self(
            $data['jsonContent'],
            $data['htmlContent'],
            $data['txtContent']
        );
    }

    public function toArray(): array
    {
        return [
            'jsonContent' => $this->jsonContent,
            'htmlContent' => $this->htmlContent,
            'txtContent' => $this->txtContent,
        ];
    }

    public function getContent(): string
    {
        return $this->htmlContent;
    }
}
