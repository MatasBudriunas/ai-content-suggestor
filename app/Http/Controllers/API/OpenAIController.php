<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpenAIRequest;
use App\Services\OpenAI\OpenAIService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OpenAIController extends Controller
{
    private OpenAIService $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    /**
     * @throws Exception
     */
    public function index(OpenAIRequest $request): JsonResponse
    {
        return response()->json(
            [
                'output' => $this->openAIService->getCompletion($request->get('input'))
            ], Response::HTTP_OK);
    }
}
