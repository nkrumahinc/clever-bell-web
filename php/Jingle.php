<?php

class Jingle
{

    private static function jinglesdir(){
	    return getcwd()."/jingles/";
}

    public static function getAll()
    {
        $jingles = [];

        $files = scandir(self::jinglesdir());
	if($files){
        foreach ($files as $key => $f) {
            if ($f != "." && $f != "..") {
                array_push($jingles, $f);
            }
        }
	}
        return $jingles;
    }

    public static function get($id)
    {
        $jingles = self::getAll();
        return $jingles[$id];
    }

    public static function delete($id)
    {
        $jingles = self::getAll();
        unlink(self::jinglesdir() . $jingles[$id]);
    }


    public static function upload()
    {
        $audiofile = $_FILES["jingle"];
        $filesize = $audiofile["size"];
//        if ($filesize < 8388608) {
            $status = move_uploaded_file($audiofile["tmp_name"], self::jinglesdir() . $audiofile["name"]);
            if (!$status) {
                echo "upload error";
            }
//        } else {
//            echo "file too big";
//        }
    }
}
