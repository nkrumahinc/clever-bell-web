<?php
include('php/View.php');
include('php/Csv.php');
include('php/Jingle.php');
include('php/Route.php');
include('php/Schedule.php');

include('routes/jingle.php');
include('routes/schedule.php');

// Add base route(startpage)
Route::add('/', function () {
    View::home();
});




Route::run('/');
