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
                <div class="panel-heading">Add a Team!</div>

                <div class="panel-body">
                    {!! Form::open(['url' => '/addTeams', 'id' => 'add_team']) !!}
                        <h4>What League is this team in?</h4>
                        <?php $league_list = ['Pee-Wee', 'Minor', 'Major']; ?>
                        <select name='league' class='form-control league'>
                            @foreach($league_list as $l)
                                <option value='{{$l}}'>{{$l}}</option>
                            @endforeach
                        </select><br />
                        <h4>What is the Team Name?</h4>
                        {!! Form::text('team', null, ['class' => 'form-control team']) !!}<br />
                        <h4>How many games will be played?</h4>
                        <input type='number' min=1 value=1 class='form-control gamesPlayed' name='games'>
                        <br />
                        <h4>Do you have more teams?</h4>
                        {!! Form::submit('Yes', ['class' => 'btn btn-primary', 'name' => 'yes']) !!}
                        {!! Form::submit('No', ['class' => 'btn btn-primary', 'name' => 'no']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
