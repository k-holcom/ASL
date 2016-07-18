@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$userinfo->name}}</div>

                <div class="panel-body">
                    <p><b>Email: </b> {{$userinfo->email}}</p>
                    <p><b>Current Level: </b> {{$userinfo->role}}</p>
                    <p>Do you want to change their role?</p>
                    {!! Form::open(['method' => 'PATCH', 'action' => ['OfficialController@userLevelUpdate', $userinfo->id]]) !!}
                    <?php $userLevels = ['user' => 'user', 'teamRep' => 'teamRep', 'official' => 'official']; ?>
                        {!! Form::select('level', $userLevels, ['class' => 'form-control']) !!}<br /><br />
                        {!! Form::submit('Change Level', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
