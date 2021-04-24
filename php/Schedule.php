<?php

class Schedule
{
    private static function schedule_array()
    {
        return array(
            "description" => $_POST["description"],
            "time" => $_POST["time"],
            "days" => $_POST["days"],
            "jingle" => $_POST["jingle"]
        );
    }

    public static function add()
    {
        $schedule = self::schedule_array();
        Json::add($schedule);
    }

    public static function edit($index)
    {
        $schedule = self::schedule_array();
        Json::edit($index, $schedule);
    }

    public static function create()
    {
        include('views/schedule/create.php');
    }

    public static function delete($index)
    {
        Json::delete($index);
    }

    public static function duplicate($index)
    {
        Json::duplicate($index);
    }

    public static function getAll()
    {
        return Json::getAll();
    }

    public static function get($index)
    {
        return Json::get($index);
    }
}
