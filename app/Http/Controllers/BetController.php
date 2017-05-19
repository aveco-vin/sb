<?php

namespace App\Http\Controllers;

use App\FightBet;
use Barryvdh\Debugbar\Middleware\Debugbar;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function placeBet(Request $request)
    {
        $obj = $request->json('data.amt');

        return $obj;

//        $request->input('amt');

//        FightBet::create($request->all());
//        $fb = new FightBet();
//        $fb->action = 'bet';
//        $fb->amt = '50';
//        $fb->event = '1';
//        $fb->fight = '1';
//        $fb->odd = '110';
//        $fb->side = 'b';
//        $fb->user = '1';
//        $fb->save();
    }
}
