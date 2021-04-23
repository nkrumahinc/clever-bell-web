<?php

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
