<?php

namespace App\Infrastructure\Transaction\Persistence;

use App\Transaction\Domain\Model\TransactionBlueprintInterface;

class TransactionCsv implements TransactionBlueprintInterface
{
    private int $id;
    private string $code;
    private string $amount;
    private int $userId;

    public function __construct(int $id, string $code, string $amount, int $userId)
    {
        $this->id = $id;
        $this->code = $code;
        $this->amount = $amount;
        $this->userId = $userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }
}
