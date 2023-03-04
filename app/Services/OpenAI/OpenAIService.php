<?php

declare(strict_types=1);

namespace App\Services\OpenAI;

use Exception;
use Orhanerday\OpenAi\OpenAi;
use RuntimeException;

class OpenAIService
{
    private const DEFAULT_MODEL = 'text-davinci-003';
    private const DEFAULT_TEMPERATURE = 0.9;
    private const DEFAULT_FREQUENCY_PENALTY = 0;
    private const DEFAULT_PRESENCE_PENALTY = 0.6;
    private const DEFAULT_MAX_TOKENS = 50;

    private OpenAi $openAi;

    public function __construct(OpenAi $openAi)
    {
        $this->openAi = $openAi;
    }

    /**
     * @throws Exception
     */
    public function getCompletion(string $prompt): string
    {
        $completion = $this->openAi->completion([
            'model' => self::DEFAULT_MODEL,
            'max_tokens' => self::DEFAULT_MAX_TOKENS,
            'prompt' => $prompt,
            'temperature' => self::DEFAULT_TEMPERATURE,
            'frequency_penalty' => self::DEFAULT_FREQUENCY_PENALTY,
            'presence_penalty' => self::DEFAULT_PRESENCE_PENALTY
        ]);

        $response = json_decode($completion, true);

        if (!isset($response['choices'][0]['text'])) {
            throw new RuntimeException($response['error']['message']);
        }

        return trim($response['choices'][0]['text']);
    }
}
