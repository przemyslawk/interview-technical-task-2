<?php

declare(strict_types=1);

namespace App\Transaction\Domain\Entity;

use Carbon\Carbon;

class Transaction
{
    private int $id;
    private string $code;
    private string $amount;
    private int $userId;

    public function __construct(
        int $id,
        string $code,
        string $amount,
        int $userId
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->amount = $amount;
        $this->userId = $userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
