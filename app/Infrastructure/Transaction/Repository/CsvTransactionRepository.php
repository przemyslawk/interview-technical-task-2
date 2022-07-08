<?php

declare(strict_types=1);

namespace App\Infrastructure\Transaction\Repository;

use App\Infrastructure\Transaction\Factory\TransactionFactory;
use App\Infrastructure\Transaction\Parser\CsvParser;
use App\Transaction\Domain\Entity\TransactionCollection;
use App\Transaction\Domain\Repository\CsvTransactionRepositoryInterface;

class CsvTransactionRepository implements CsvTransactionRepositoryInterface
{
    private TransactionFactory $transactionFactory;
    private CsvParser $csvParser;

    public function __construct(TransactionFactory $transactionFactory, CsvParser $csvParser)
    {
        $this->transactionFactory = $transactionFactory;
        $this->csvParser = $csvParser;
    }

    public function getTransactions(int $page): TransactionCollection
    {
        $offset = $page > 1 ? ($page - 1) * self::ITEMS_PER_PAGE + 1 : 0;
        $models = $this->csvParser->parse(base_path('transactions.csv'), $offset, self::ITEMS_PER_PAGE);

        return $this->transactionFactory->createCollection($models);
    }
}
