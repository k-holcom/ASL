@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="../css/add_schedule.css" >
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><b>Major Game Schedule</b></h4></div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Away Team</th>
                            <th>Home Team</th>
                            <th> </th>
                        </tr>
                        @foreach($games as $g)
                            @if($g->league == 'Major')
                                <tr>
                                    <td>{{$g->month}}/{{$g->day}}</td>
                                    <td>{{$g->away}}</td>
                                    <td>{{$g->home}}</td>
                                    <td>
                                        {!! Form::open(['url' => '/scoregame', 'id' => 'majorSchedule']) !!}
                                            {!! Form::hidden('gameId', $g->id) !!}
                                            {!! Form::hidden('home', $g->home) !!}
                                            {!! Form::hidden('away', $g->away) !!}
                                            {!! Form::hidden('dateM', $g->month) !!}
                                            {!! Form::hidden('dateD', $g->day) !!}
                                            {!! Form::submit('Score Game', ['class' => 'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </td>
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
