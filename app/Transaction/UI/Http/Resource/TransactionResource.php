<?php

declare(strict_types=1);

namespace App\Transaction\UI\Http\Resource;

use App\Transaction\Domain\Entity\Transaction;
use Illuminate\Http\Resources\Json\JsonResource as Resource;

class TransactionResource extends Resource
{
    /** @var Transaction */
    public $resource;

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->resource->getId(),
            'code' => $this->resource->getCode(),
            'amount' => $this->resource->getAmount(),
            'userId' => $this->resource->getUserId(),
        ];
    }
}
