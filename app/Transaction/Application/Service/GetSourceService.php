<?php

declare(strict_types=1);

namespace App\Transaction\Application\Service;

use App\Transaction\Domain\Entity\TransactionCollection;
use App\Transaction\Domain\Repository\CsvTransactionRepositoryInterface;
use App\Transaction\Domain\Repository\DatabaseTransactionRepositoryInterface;
use App\Transaction\Domain\Repository\TransactionRepositoryInterface;

class GetSourceService
{
    private const CSV_SOURCE = 'csv';
    private const DB_SOURCE = 'db';

    private ?TransactionRepositoryInterface $source = null;
    private DatabaseTransactionRepositoryInterface $databaseTransactionRepository;
    private CsvTransactionRepositoryInterface $csvTransactionRepository;

    public function __construct(
        DatabaseTransactionRepositoryInterface $databaseTransactionRepository,
        CsvTransactionRepositoryInterface $csvTransactionRepository
    ) {
        $this->databaseTransactionRepository = $databaseTransactionRepository;
        $this->csvTransactionRepository = $csvTransactionRepository;
    }

    public function determinateSource(string $source)
    {
        switch ($source) {
            case self::DB_SOURCE:
                $this->source = $this->databaseTransactionRepository;
                break;
            case self::CSV_SOURCE:
                $this->source = $this->csvTransactionRepository;
                break;
            default:
                break;
        }
    }

    public function getTransactions(int $page): TransactionCollection
    {
        return $this->source->getTransactions($page);
    }
}
