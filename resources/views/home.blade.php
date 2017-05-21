@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
            <ast-bet-on-odd banker-odd="110" player-odd="110" v-on:bet="onBet"></ast-bet-on-odd>

        </div>
    </div>
</div>
@endsection
