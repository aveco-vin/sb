<?php

namespace App\Http\Controllers;

use App\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function placeBet(Request $request)
    {
        $bet = new Bet();
//        $bet->transaction   = $request->input('1000001');
        $bet->transaction   = $bet->generateTransactionId();
        $bet->game_id       = $request->input('gameId');
        $bet->user_id       = $request->input('userId');
        $bet->bet_on        = $request->input('betOn');
        $bet->odds          = $request->input('odd');
        $bet->amount        = $request->input('amount');
        $bet->save();
    }
}
