""" Reads timetable.json """

import json
import os
import configparser
from json.decoder import JSONDecodeError

json_path = "./timetable.json"

def initjson():
    # if file does not exit, create it.
    file = open(json_path, 'w')
    # if file is empty, init it.
    if os.stat(json_path).st_size == 0:
        json.dump({},file)
    file.close()
    

def readtimetable():
    timetable = {}

    f = open(json_path, "r")
    timetable = json.load(f)

    return timetable


def parsepaths(json_path, tunes_path, log_path):
    config = configparser.ConfigParser()
    config.read('config.ini')
    lepath = config['DEFAULT']['path']
    json_path = lepath + json_path
    tunes_path = lepath + tunes_path
    log_path = lepath + log_path
