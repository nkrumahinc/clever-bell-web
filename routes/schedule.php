<?php

const SCHEDULEPAGE = "Location: /";


Route::add('/schedule', function () {
    View::scheduleHome();
});

Route::add('/schedule/create', function () {
    View::scheduleCreate();
}, 'get');

Route::add(
    '/schedule/create',
    function () {
        Schedule::add();
        header(SCHEDULEPAGE);
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
        header(SCHEDULEPAGE);
    },
    'get'
);

Route::add(
    '/schedule/update/([0-9]*)',
    function ($index) {
        Schedule::edit($index);
        header(SCHEDULEPAGE);
    },
    'post'
);

Route::add(
    '/schedule/delete/([0-9]*)',
    function ($index) {
        # delete
        Schedule::delete($index);
        header(SCHEDULEPAGE);
    },
    'get'
);
