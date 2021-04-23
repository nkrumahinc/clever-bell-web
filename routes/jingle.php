<?php

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
