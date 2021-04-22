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

    public static function scheduleHome()
    {
        include('views/schedule/home.php');
    }

    public static function scheduleUpdate($index)
    {
        $schedule = Csv::getSchedule($index);
        include('views/schedule/update.php');
    }

    public static function readSchedule($index)
    {
        $schedule = Csv::getSchedule($index);
        include('views/schedule/read.php');
    }

    public static function scheduleCreate()
    {
        include('views/schedule/create.php');
    }

    public static function jingleRead()
    {
        include('views/jingle/read.php');
    }
}
