<?php

declare(strict_types=1);

use App\Constants\OpenAIConstants;
use App\Services\OpenAI\OpenAIService;
use Orhanerday\OpenAi\OpenAi;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OpenAIServiceTest extends TestCase
{
    private OpenAi|MockObject $openAiMock;
    private OpenAIService $openAiService;
    private string $content;

    protected function setUp(): void
    {
        parent::setUp();
        $this->openAiMock = $this->createMock(OpenAi::class);
        $this->openAiService = new OpenAIService($this->openAiMock);
        $this->content = 'This is some text';
    }

    public function testGeneratePromptReturnsContentWhenNoTypeProvided(): void
    {
        $expectedPrompt = 'This is some text';
        $actualPrompt = $this->openAiService->generatePrompt($this->content, null);
        $this->assertSame($expectedPrompt, $actualPrompt);
    }

    public function testGeneratePromptReturnsSuggestPrompt(): void
    {
        $expectedPrompt = 'Provide a list of improvements for this content: This is some text';
        $actualPrompt = $this->openAiService->generatePrompt($this->content, OpenAIConstants::PROMPT_TYPE_SUGGEST);
        $this->assertSame($expectedPrompt, $actualPrompt);
    }

    public function testGeneratePromptReturnsGeneratePrompt(): void
    {
        $expectedPrompt = 'Please re-write the text using patterns that are sought out by human resources: This is some text';
        $actualPrompt = $this->openAiService->generatePrompt($this->content, OpenAIConstants::PROMPT_TYPE_GENERATE);
        $this->assertSame($expectedPrompt, $actualPrompt);
    }

    public function testGeneratePromptWithInvalidType()
    {
        $this->expectException(RuntimeException::class);
        $this->openAiService->generatePrompt('prompt content', 'invalid');
    }

    /**
     * @throws Exception
     */
    public function testGetCompletionSuccessful()
    {
        // Arrange
        $this->openAiMock->method('completion')
            ->willReturn(json_encode([
                'choices' => [
                    [
                        'text' => 'Some completion text'
                    ]
                ]
            ]));

        // Act
        $result = $this->openAiService->getCompletion('Sample content', OpenAIConstants::PROMPT_TYPE_GENERATE);

        // Assert
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }
}
