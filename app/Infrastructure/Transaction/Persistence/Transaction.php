<?php

declare(strict_types=1);

namespace App\Infrastructure\Transaction\Persistence;

use App\Transaction\Domain\Model\TransactionBlueprintInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $amount
 * @property int $user_id
 */
class Transaction extends Model implements TransactionBlueprintInterface
{
    public $timestamps = false;

    protected $table = 'transactions';

    protected $fillable = [
        'code',
        'amount',
        'user_id',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }
}
