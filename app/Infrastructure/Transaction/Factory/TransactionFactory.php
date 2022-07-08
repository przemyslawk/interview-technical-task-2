<?php

namespace App\Infrastructure\Transaction\Factory;

use App\Transaction\Domain\Entity\Transaction;
use App\Transaction\Domain\Entity\TransactionCollection;
use App\Transaction\Domain\Model\TransactionBlueprintInterface;
use Illuminate\Support\Collection;

class TransactionFactory
{
    public function create(TransactionBlueprintInterface $transactionModel): Transaction
    {
        return new Transaction(
            $transactionModel->getId(),
            $transactionModel->getCode(),
            $transactionModel->getAmount(),
            $transactionModel->getUserId()
        );
    }

    public function createCollection(Collection $models): TransactionCollection
    {
        $collection = new TransactionCollection();

        /** @var TransactionBlueprintInterface $model */
        foreach ($models as $model) {
            $collection->addElement($this->create($model));
        }
        return $collection;
    }
}
