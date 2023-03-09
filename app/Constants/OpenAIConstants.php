<?php

declare(strict_types=1);

namespace App\Constants;

final class OpenAIConstants
{
    public const PROMPT_TYPE_SUGGEST = 'suggest';
    public const PROMPT_TYPE_GENERATE = 'generate';

    public const PROMPT_TYPES = [
        self::PROMPT_TYPE_SUGGEST,
        self::PROMPT_TYPE_GENERATE
    ];
}
