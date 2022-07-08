<?php

declare(strict_types=1);

namespace App\Transaction\UI\Http\Controller;

use App\Transaction\Application\Service\GetSourceService;
use App\Transaction\UI\Http\Request\TransactionRequest;
use App\Transaction\UI\Http\Resource\TransactionResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class TransactionController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private GetSourceService $getSourceService;

    public function __construct(GetSourceService $getSourceService)
    {
        $this->getSourceService = $getSourceService;
    }

    public function list(TransactionRequest $request): JsonResponse
    {
        $this->getSourceService->determinateSource($request->getSource());
        return response()->json(
            TransactionResource::collection($this->getSourceService->getTransactions($request->getPage()))
        );
    }
}
