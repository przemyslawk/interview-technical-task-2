<?php

declare(strict_types=1);

namespace App\Infrastructure\Transaction\Provider;

use App\Infrastructure\Transaction\Repository\CsvTransactionRepository;
use App\Infrastructure\Transaction\Repository\DatabaseTransactionRepository;
use App\Transaction\Domain\Repository\CsvTransactionRepositoryInterface;
use App\Transaction\Domain\Repository\DatabaseTransactionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            DatabaseTransactionRepositoryInterface::class,
            DatabaseTransactionRepository::class
        );

        $this->app->bind(
            CsvTransactionRepositoryInterface::class,
            CsvTransactionRepository::class
        );
    }
}
