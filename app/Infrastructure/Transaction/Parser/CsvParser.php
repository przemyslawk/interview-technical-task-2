<?php

declare(strict_types=1);

namespace App\Infrastructure\Transaction\Parser;

use App\Infrastructure\Transaction\Persistence\TransactionCsv;
use Illuminate\Support\Collection;

class CsvParser
{
    public function parse(string $filePath, int $offset, int $limit): Collection
    {
        $transactions = new Collection();
        $csv = array_map('str_getcsv', file($filePath));
        $header = null;
        foreach ($csv as $row) {
            if (is_null($header)) {
                $header = $row;
            } else {
                $transaction = \array_combine($header, $row);

                if ((int)$transaction['id'] < $offset) {
                    continue;
                }

                if ((int)$transaction['id'] > ($offset + $limit)) {
                    break;
                }

                $transaction['id'] = (int)$transaction['id'];
                $transaction['user_id'] = (int)$transaction['user_id'];
                $transactionModel = new TransactionCsv(
                    (int) $transaction['id'],
                    $transaction['code'],
                    $transaction['amount'],
                    (int) $transaction['user_id'],
                );
                $transactions->add($transactionModel);
            }
        }

        return $transactions;
    }
}
