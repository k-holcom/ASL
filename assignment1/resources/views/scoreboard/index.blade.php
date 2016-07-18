@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Score Your Game!</div>

                <div class="panel-body">
                    <div id='score'>    
                        <div class='away'>
                            <h2>Away</h2>
                            <p class="score" id='away'>0</p>
                            <p><button class='btn btn-primary awayscore'>Away</button></p>
                        </div>
                        <div class='inning'>
                            <h2>Inning</h2>
                            <div class='arrows'>
                                <div class='up'>
                                    <a href="#" class='arrowlink arrowup'><span id='up'><</span></a>
                                </div>
                                <div class='down' >
                                    <a href="#" class='arrowlink arrowdown'><i class='fa fa-caret-down arrow'></i></a>
                                </div>
                            </div>
                            <div class='number'>
                                <p id='inning' class='score'>1</p>
                            </div>
                        </div>
                        <div class='home'>
                            <h2>Home</h2>
                            <p class="score" id='home'>0</p>
                            <p><button class='btn btn-primary homescore'>Home</button></p>
                        </div>
                    </div>
                    <div class='info'>
                        <div class='balls'>
                            <h3>Balls</h3>
                            <div style="padding:1%; overflow: auto;">
                                <div class='ball1'><img src='../images/empty.png'></div>
                                <div class='ball2'><img src='../images/empty.png'></div>
                                <div class='ball3'><img src='../images/empty.png'></div>
                            </div>
                        </div>
                        <div class='strikes'>
                            <h3>Strikes</h3>
                            <div style="padding:1%;">
                                <div class='strike1'><img src='../images/empty.png'></div>
                                <div class='strike2'><img src='../images/empty.png'></div>
                            </div>
                        </div>
                        <div class='outs'>
                            <h3>Outs</h3>
                            <div style="padding:1%;">
                                <div class='out1'><img src='../images/empty.png'></div>
                                <div class='out2'><img src='../images/empty.png'></div>
                            </div>
                        </div>
                    </div>

                    <div class='buttons'>
                        <div class='btns'>
                            <button class='btn btn-primary button' id='ball'>Ball</button>
                        </div>
                        <div class='btns'>
                            <button class='btn btn-primary button' id='strike'>Strikes</button>
                        </div>
                        <div class='btns'>
                            <button class='btn btn-primary button' id='out'>Out</button>
                        </div>
                        <div class='btns'>
                            <button class='btn btn-primary button' id='reset'>Reset</button>
                        </div>
                    </div>
                    <div>
                        <p>** Reset button resets balls and strikes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='../js/scoreboard.js'></script>
@endsection
