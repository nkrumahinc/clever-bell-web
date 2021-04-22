<?php
include('php/View.php');
include('php/Csv.php');
include('php/Jingle.php');
include('php/Route.php');
include('php/Schedule.php');


// Add base route(startpage)
Route::add('/', function () {
    View::home();
});

Route::add('/schedule/create', function () {
    View::scheduleCreate();
}, 'get');

Route::add(
    '/schedule/create',
    function () {
        Schedule::add();
        View::scheduleHome();
    },
    'post'
);

Route::add('/schedule/view/([0-9]*)', function ($index) {
    View::readSchedule($index);
}, 'get');

Route::add(
    '/schedule/update/([0-9]*)',
    function ($index) {
        #edit
        View::scheduleUpdate($index);
    },
    'get'
);

Route::add(
    '/schedule/duplicate/([0-9]*)',
    function ($index) {
        #edit
        Schedule::duplicate($index);
        View::home();
    },
    'get'
);

Route::add(
    '/schedule/update/([0-9]*)',
    function ($index) {
        Schedule::edit($index);
	View::scheduleHome();
    },
    'post'
);

Route::add(
    '/schedule/delete/([0-9]*)',
    function ($index) {
        # delete
        Schedule::delete($index);
        View::home();
    },
    'get'
);

// Post route example
Route::add('/schedule', function () {
    Schedule::add();
    View::scheduleHome();
}, 'post');



// jingle
Route::add('/jingle', function () {
    View::jingleHome();
}, 'get');

Route::add('/jingle/delete/([0-9]*)', function ($id) {
    Jingle::delete($id);
    View::jingleHome();
});

Route::add('/jingle/view/([0-9]*)', function ($id) {
    Jingle::get($id);
    View::jingleRead($id);
});

Route::add(
    '/jingle',
    function () {
        Jingle::upload();
        View::jingleHome();
    },
    'post'
);

Route::run('/');
