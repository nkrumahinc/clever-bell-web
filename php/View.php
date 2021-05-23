<?php

class View
{
    public static function home()
    {
        self::scheduleHome();
    }

    public static function jingleHome()
    {
        include('views/jingle/home.php');
    }

    public static function recordingHome()
    {
        include('views/recording/home.php');
    }

    public static function scheduleHome()
    {
        include('views/schedule/home.php');
    }

    public static function scheduleUpdate($index)
    {
        $schedule = Json::get($index);
        include('views/schedule/update.php');
    }

    public static function readSchedule($index)
    {
        $schedule = Json::get($index);
        include('views/schedule/read.php');
    }

    public static function scheduleCreate()
    {
        include('views/schedule/create.php');
    }

    public static function jingleRead($id)
    {
        $jingle = Jingle::get($id);
        include('views/jingle/read.php');
    }

    public static function recordingRead($id)
    {
        $recording = Recording::get($id);
        include('views/recording/read.php');
    }
}
