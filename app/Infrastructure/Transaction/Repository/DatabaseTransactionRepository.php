<?php

declare(strict_types=1);

namespace App\Infrastructure\Transaction\Repository;

use App\Infrastructure\Transaction\Factory\TransactionFactory;
use App\Infrastructure\Transaction\Persistence\Transaction;
use App\Transaction\Domain\Entity\TransactionCollection;
use App\Transaction\Domain\Repository\DatabaseTransactionRepositoryInterface;

class DatabaseTransactionRepository implements DatabaseTransactionRepositoryInterface
{
    private TransactionFactory $transactionFactory;

    public function __construct(TransactionFactory $transactionFactory)
    {
        $this->transactionFactory = $transactionFactory;
    }

    public function getTransactions(int $page): TransactionCollection
    {
        $offset = $page > 1 ? (($page - 1) * self::ITEMS_PER_PAGE) - 1 : 0;
        $models = Transaction::query()->orderBy('id')->offset($offset)->limit(self::ITEMS_PER_PAGE)->get();

        return $this->transactionFactory->createCollection($models);
    }
}
