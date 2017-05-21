<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = [
        'transaction',
        'game_id',
        'user_id',
        'amount',
        'side',
        'odds'
    ];

    protected function barcodeNumberExists($tranId)
    {
        return Bet::whereTransaction($tranId)->exists();
    }

    public function generateTransactionId()
    {
        $tranId = uniqid('ast-' . date('Ymd') .'-');
        if ($this->barcodeNumberExists($tranId)) {
            return $this->generateTransactionId();
        }
        return $tranId;
    }

}
