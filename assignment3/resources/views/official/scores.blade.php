<?php
    $scoresPW = [];
    $scoresMi = [];
    $scoresMa = [];
    foreach($scorePairsPW as $sP){
        if(count($sP) == 1){
            $scoresPW[] = $sP;
        }else{
            if($sP[0]->home_score != $sP[1]->home_score || $sP[0]->away_score != $sP[1]->away_score){
                $scoresPW[] = $sP;
            }
        }

    }
    foreach($scorePairsMi as $sP){
        if(count($sP) == 1){
            $scoresMi[] = $sP;
        }else{
            if($sP[0]->home_score != $sP[1]->home_score || $sP[0]->away_score != $sP[1]->away_score){
                $scoresMi[] = $sP;
            }
        }

    }
    foreach($scorePairsMa as $sP){
        if(count($sP) == 1){
            $scoresMa[] = $sP;
        }else{
            if($sP[0]->home_score != $sP[1]->home_score || $sP[0]->away_score != $sP[1]->away_score){
                $scoresMa[] = $sP;
            }
        }

    }
?>
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="../css/add_schedule.css" >
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Entered Scores</h4></div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <th>Game</th>
                            <th>Score (A-H)</th>
                            <th>Which is incorrect?</th>
                        </tr>
                        <tr>
                            <td><h4>Pee-Wee</h4></td>
                        </tr>
                            @foreach($scoresPW as $game)
                                <tr>
                                    <td>
                                        @foreach($game as $g)
                                            <p>{{$g->away_team}} at {{$g->home_team}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($game as $g)
                                            <p>{{$g->away_score}} - {{$g->home_score}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(count($game) > 1)
                                            @foreach($game as $g)
                                            {!! Form::open(['url' => '/scores']) !!}
                                                {!! Form::hidden('score_id', $g->id) !!}
                                                {!! Form::submit('Incorrect', ['class' => 'btn btn-primary', 'name' => 'incorrect']) !!}
                                            {!! Form::close() !!}
                                        @endforeach
                                        @endif
                                        @if(count($game) == 1)
                                            @foreach($game as $g)
                                            {!! Form::open(['url' => '/scores']) !!}
                                                {!! Form::hidden('score_id', $g->id) !!}
                                                {!! Form::submit('Correct', ['class' => 'btn btn-primary', 'name' => 'correct']) !!}
                                            {!! Form::close() !!}
                                        @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        <tr>
                            <td><h4>Minors</h4></td>
                        </tr>
                            @foreach($scoresMi as $game)
                                <tr>
                                    <td>
                                        @foreach($game as $g)
                                            <p>{{$g->away_team}} at {{$g->home_team}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($game as $g)
                                            <p>{{$g->away_score}} - {{$g->home_score}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(count($game) > 1)
                                            @foreach($game as $g)
                                            {!! Form::open(['url' => '/scores']) !!}
                                                {!! Form::hidden('score_id', $g->id) !!}
                                                {!! Form::submit('Incorrect', ['class' => 'btn btn-primary', 'name' => 'incorrect']) !!}
                                            {!! Form::close() !!}
                                        @endforeach
                                        @endif
                                        @if(count($game) == 1)
                                            @foreach($game as $g)
                                            {!! Form::open(['url' => '/scores']) !!}
                                                {!! Form::hidden('score_id', $g->id) !!}
                                                {!! Form::submit('Correct', ['class' => 'btn btn-primary', 'name' => 'correct']) !!}
                                            {!! Form::close() !!}
                                        @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                            <td><h4>Majors</h4></td>
                        </tr>
                            @foreach($scoresMa as $game)
                                <tr>
                                    <td>
                                        @foreach($game as $g)
                                            <p>{{$g->away_team}} at {{$g->home_team}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($game as $g)
                                            <p>{{$g->away_score}} - {{$g->home_score}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(count($game) > 1)
                                            @foreach($game as $g)
                                            {!! Form::open(['url' => '/scores']) !!}
                                                {!! Form::hidden('score_id', $g->id) !!}
                                                {!! Form::submit('Incorrect', ['class' => 'btn btn-primary', 'name' => 'incorrect']) !!}
                                            {!! Form::close() !!}
                                        @endforeach
                                        @endif
                                        @if(count($game) == 1)
                                            @foreach($game as $g)
                                            {!! Form::open(['url' => '/scores']) !!}
                                                {!! Form::hidden('score_id', $g->id) !!}
                                                {!! Form::submit('Correct', ['class' => 'btn btn-primary', 'name' => 'correct']) !!}
                                            {!! Form::close() !!}
                                        @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
