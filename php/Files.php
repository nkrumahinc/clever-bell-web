<?php

class Files
{
    private static $path = "timetable.json";
    private static $file_error = "error opening file";

    public static function writeFile($schedules)
    {
        $input =  json_encode($schedules);
        $handle = fopen(self::$path, "w") or die(self::$file_error);
        fwrite($handle, $input);
        fclose($handle);
    }

    public static function readFile()
    {
        $output = file_get_contents(self::$path);
        return json_decode($output, true);
    }
}
