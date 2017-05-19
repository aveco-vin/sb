<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FightBet extends Model
{
    protected $fillable = [
        'action',
        'amt',
        'event',
        'fight',
        'odd',
        'side',
        'user'
    ];
}
