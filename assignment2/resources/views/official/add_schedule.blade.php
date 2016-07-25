<?php
$month_num = [];
$day_num = [];
$i = 1;
while($i < 13){
    $month_num[] = $i;
    $i++;
}
$j = 1;
while($j < 32){
    $day_num[] = $j;
    $j++;
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
                <div class="panel-heading">Add a game to the schedule!</div>

                <div class="panel-body">
                    {!! Form::open(['url' => '/schedules', 'id' => 'add_game']) !!}
                        <h4>What League is this game in?</h4>
                        <?php $league_list = ['Pee-Wee', 'Minor', 'Major']; ?>
                        <select name='league' class='form-control league'>
                            @foreach($league_list as $l)
                                <option value='{{$l}}'>{{$l}}</option>
                            @endforeach
                        </select><br /><br />
                        <h4>Who is the Home Team?</h4>
                        {!! Form::text('home_team', null, ['class' => 'form-control team']) !!}
                        <h4>Who is the Away Team?</h4>
                        {!! Form::text('away_team', null, ['class' => 'form-control team']) !!}
                        <br /><br />
                        <h4>Date of Game</h4>
                        <select name='month' class='form-control month'>
                            @foreach($month_num as $m)
                                <option value='{{$m}}'>{{$m}}</option>
                            @endforeach
                        </select>
                        <select name='day' class='form-control day'>
                            @foreach($day_num as $d)
                                <option value='{{$d}}'>{{$d}}</option>
                            @endforeach
                        </select>
                        <br /> <br />
                        <h4>Do you have more games?</h4>
                        {!! Form::submit('Yes', ['class' => 'btn btn-primary', 'name' => 'yes']) !!}
                        {!! Form::submit('No', ['class' => 'btn btn-primary', 'name' => 'no']) !!}
                    {!! Form::close() !!}
                    <br />
                    <br />
                    <h3>Games Scheduled</h3>
                    <h4 class='level'>Pee-Wee</h4>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Away Team</th>
                            <th>Home Team</th>
                        </tr>
                        @foreach($games as $g)
                            @if($g->league == 'Pee-Wee')
                                <tr>
                                    <td>{{$g->month}}/{{$g->day}}</td>
                                    <td>{{$g->away}}</td>
                                    <td>{{$g->home}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <h4 class='level'>Minor</h4>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Away Team</th>
                            <th>Home Team</th>
                        </tr>
                        @foreach($games as $g)
                            @if($g->league == 'Minor')
                                <tr>
                                    <td>{{$g->month}}/{{$g->day}}</td>
                                    <td>{{$g->away}}</td>
                                    <td>{{$g->home}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <h4 class='level'>Major</h4>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Away Team</th>
                            <th>Home Team</th>
                        </tr>
                        @foreach($games as $g)
                            @if($g->league == 'Major')
                                <tr>
                                    <td>{{$g->month}}/{{$g->day}}</td>
                                    <td>{{$g->away}}</td>
                                    <td>{{$g->home}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
