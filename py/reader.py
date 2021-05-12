""" Reads timetable.json """

import json
import configparser
from json.decoder import JSONDecodeError

def parsepaths(json_path, tunes_path, log_path):
    config = configparser.ConfigParser()
    config.read('config.ini')
    lepath = config['DEFAULT']['path']
    json_path = lepath + json_path
    tunes_path = lepath + tunes_path
    log_path = lepath + log_path

json_path = "./timetable.json"

def readtimetable():
    timetable = {}

    f = open(json_path, "w+")
    print("reading json file" )

    try:
        timetable = json.load(f)
    except JSONDecodeError:
        json.dump(timetable, f)

    return timetable
