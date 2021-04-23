<?php

class Json
{
    private $path = "timetable.json";
    private $file_error = "error opening file";

    // private static function schedule_array($schedule)
    // {
    //     return array($schedule["description"], $schedule["time"], $schedule["days"], $schedule["jingle"]);

    // }

    public static function addSchedule($schedule)
    {
        $schedules = self::readFile();
        array_push($schedules, $schedule);
        self::writeFile($schedules);
    }

    public static function addSchedules($schedules)
    {
        self::writeFile($schedules);
    }

    public static function getSchedules()
    {
        return self::readFile();
    }

    private static function writeFile($schedules)
    {
        $input =  json_encode($schedules);
        $handle = fopen(self::$path, "w") or die(self::$file_error);
        fwrite($handle, $input);
        fclose($handle);
    }

    private static function readFile()
    {
        $output = file_get_contents(self::$path);
        $schedules = json_decode($output);
        return $schedules;
    }
}
