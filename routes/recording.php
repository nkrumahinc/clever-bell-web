<?php

const RECORDINGPAGE = "Location: /recording";

// recording
Route::add('/recording', function () {
    View::recordingHome();
}, 'get');

Route::add('/recording/delete/([0-9]*)', function ($id) {
    Recording::delete($id);
    header(RECORDINGPAGE);
});

Route::add('/recording/view/([0-9]*)', function ($id) {
    Recording::get($id);
    View::recordingRead($id);
});

Route::add(
    '/recording',
    function () {
        Recording::upload();
        header(RECORDINGPAGE);
    },
    'post'
);
