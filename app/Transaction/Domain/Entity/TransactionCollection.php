<?php

declare(strict_types=1);

namespace App\Transaction\Domain\Entity;

use Illuminate\Support\Collection;

class TransactionCollection extends Collection
{
    public function addElement(Transaction $transaction)
    {
        $this->add($transaction);
    }
}
