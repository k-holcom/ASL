@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="../css/standings.css" >
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Standings for Minors</div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <th>Team</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Total Games</th>
                            <th>Games Left</th>
                            <th>PF</th>
                            <th>PA</th> 
                        </tr>
                        @foreach($teams as $t)
                            @if($t->league == 'Minor')
                                <tr>
                                    <td>{{$t->team}}</td>
                                    <td>{{$t->wins}}</td>
                                    <td>{{$t->loss}}</td>
                                    <td>{{$t->total_games}}</td>
                                    <td>{{$t->games_left}}</td>
                                    <td>{{$t->pf}}</td>
                                    <td>{{$t->pa}}</td>
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
