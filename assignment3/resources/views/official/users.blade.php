@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome, {{$user->name}}</div>

                <div class="panel-body">
                    <p>You are able to see this because you are an <?php echo ucfirst($user->role); ?> in this league.</p>

                    <h4>These are the current users that are registered and their level. Most recent first.</h4>
                    <h5 style='text-decoration:underline'>Officials</h5>
                    @foreach($users as $u)
                        @if($u->role == "official")
                            <p><a href="{{action('OfficialController@userLevel', $u->id)}}">{{$u->name}}</a></p>
                        @endif
                    @endforeach
                    <h5 style='text-decoration:underline'>Team Representatives</h5>
                    @foreach($users as $u)
                        @if($u->role == "teamRep")
                            <p><a href="{{action('OfficialController@userLevel', $u->id)}}">{{$u->name}}</a></p>
                        @endif
                    @endforeach
                    <h5 style='text-decoration:underline'>Users</h5>
                    @foreach($users as $u)
                        @if($u->role == "user")
                            <p><a href="{{action('OfficialController@userLevel', $u->id)}}">{{$u->name}}</a></p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
