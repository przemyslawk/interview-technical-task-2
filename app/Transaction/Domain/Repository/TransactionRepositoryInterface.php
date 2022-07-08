<?php

declare(strict_types=1);

namespace App\Transaction\Domain\Repository;

use App\Transaction\Domain\Entity\TransactionCollection;

interface TransactionRepositoryInterface
{
    public const ITEMS_PER_PAGE = 20;

    public function getTransactions(int $page): TransactionCollection;
}
