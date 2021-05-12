""" Reads timetable.json """

import json
import configparser


lepath = "./"


def parsepaths(json_path, tunes_path, log_path):
    config = configparser.ConfigParser()
    config.read('config.ini')
    lepath = config['DEFAULT']['path']
    json_path = lepath + json_path
    tunes_path = lepath + tunes_path
    log_path = lepath + log_path

json_path = "timetable.json"
tunes_path = "jingles/"
log_path = "log.log"

logfile = open(log_path, "w+")


def readtimetable():
    f = open(json_path)
    print(" read json file" )
    timetable = json.load(f)

    return timetable
