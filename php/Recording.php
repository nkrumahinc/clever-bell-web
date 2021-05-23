<?php

class Recording
{

    private static function recordingsdir(){
	    return getcwd()."/recordings/";
    }

    private static function createdir(){
        if(!file_exists(self::recordingsdir())){
            mkdir(self::recordingsdir(), 0777, true);
        }
    }

    public static function getAll()
    {
        $recordings = [];
        self::createdir();
        $files = scandir(self::recordingsdir());
	if($files){
        foreach ($files as $key => $f) {
            if ($f != "." && $f != "..") {
                array_push($recordings, $f);
            }
        }
	}
        return $recordings;
    }

    public static function get($id)
    {
        $recordings = self::getAll();
        return $recordings[$id];
    }

    public static function delete($id)
    {
        $recordings = self::getAll();
        unlink(self::recordingsdir() . $recordings[$id]);
    }


    public static function upload()
    {
        self::createdir();
        $audiofile = $_FILES["recording"];
        $filesize = $audiofile["size"];
//        if ($filesize < 8388608) {
            $status = move_uploaded_file($audiofile["tmp_name"], self::recordingsdir() . $audiofile["name"]);
            if (!$status) {
                echo "upload error";
            }
//        } else {
//            echo "file too big";
//        }
    }
}
