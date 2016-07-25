@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="../css/home.css" >
@endsection
@section('content')
<div class="container main_section">
    <div class="row">
        <img src='../images/field.jpg' alt='Ball Field' class='mainImage' />
    </div>
</div>

<div class='container leagues'>
    <div class='row'>
        <div class="col-md-4 league">
            <h3>Pee-Wee League News</h3>
        </div>
        <div class="col-md-4 league">
            <h3>Minor League News</h3>
        </div>
        <div class="col-md-4 league">
            <h3>Major League News</h3>
        </div>
    </div>
</div>
@endsection
