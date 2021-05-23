<?php
include('php/View.php');
include('php/Json.php');
include('php/Jingle.php');
include('php/Route.php');
include('php/Schedule.php');
include('php/Recording.php');

include('routes/jingle.php');
include('routes/schedule.php');
include('routes/recording.php');

// Add base route(startpage)
Route::add('/', function () {
    View::home();
});

Route::run('/');
