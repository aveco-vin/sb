@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ast-bet-on-odd banker-odd="110" player-odd="110" v-on:bet="onBet"></ast-bet-on-odd>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
