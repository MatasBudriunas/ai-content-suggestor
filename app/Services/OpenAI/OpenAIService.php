<?php

declare(strict_types=1);

namespace App\Services\OpenAI;

use Exception;
use Orhanerday\OpenAi\OpenAi;
use RuntimeException;

class OpenAIService
{
    private const DEFAULT_MODEL = 'text-davinci-003';
    private const DEFAULT_MAX_TOKENS = '10';

    private OpenAi $openAi;

    public function __construct(OpenAi $openAi){
        $this->openAi = $openAi;
    }

    /**
     * @throws Exception
     */
    public function getCompletion(): string
    {
        $completion = $this->openAi->completion([
            'model' => self::DEFAULT_MODEL,
            'max_tokens' => self::DEFAULT_MAX_TOKENS,
            'prompt' => 'Is the sky blue?',
        ]);

        $response = json_decode($completion, true);

        try {
            $result = stripslashes($response['choices'][0]['text']);
        } catch (Exception $exception) {
            throw new RuntimeException($response['error']['message']);
        }

        return $result;
    }
}
