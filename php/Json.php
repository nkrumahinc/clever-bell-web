<?php

include_once("Files.php");
class Json
{

    public static function add($schedule)
    {
        $schedules = Files::readFile();
        array_push($schedules, $schedule);
        Files::writeFile($schedules);
    }

    public static function edit($index, $schedule)
    {
        $schedules = Files::readFile();
        $schedules[$index] = $schedule;
        Files::writeFile($schedules);
    }

    public static function delete($index)
    {
        $schedules = Files::readFile();
        unset($schedules[$index]);
        Files::writeFile($schedules);
    }

    public static function getAll()
    {
        return Files::readFile();
    }

    public static function get($index)
    {
        $schedules = Files::readFile();
        return $schedules[$index];
    }

    public static function duplicate($index)
    {
        $schedules = Files::readFile();
        $schedule = $schedules[$index];
        array_push($schedules, $schedule);
        Files::writeFile($schedules);
    }
}
