""" Reads timetable.json """

import json
import configparser
from json.decoder import JSONDecodeError

json_path = __file__+"/timetable.json"

def readtimetable(p):
    timetable = {}

    f = open(p+"/timetable.json", "r")

    try:
        timetable = json.load(f)
    except JSONDecodeError:
        timetable = {}

    return timetable
