<?php

declare(strict_types=1);

namespace App\Transaction\Domain\Model;

interface TransactionBlueprintInterface
{
    public function getId(): int;
    public function getCode(): string;
    public function getAmount(): string;
    public function getUserId(): int;
}
