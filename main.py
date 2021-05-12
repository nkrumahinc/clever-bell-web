import os
import threading
import time
from datetime import datetime
import pyttsx3
from pygame import mixer
from pygame import error as sounderror
import csv
import json
import sys

json_path = "/var/www/cleverbell/timetable.json"
tunes_path = "/var/www/cleverbell/jingles/"

log_path = "/var/www/cleverbell/log.log"
logfile = open(log_path, "w+")
sys.stdout = logfile

def initialize():
    engine = pyttsx3.init()
    engine.say("Clever Bell Initiated")
    print("Clever Bell Initiated")
    engine.runAndWait()
    mixer.init()   

def is_today(days):
    dayofweek = datetime.now().strftime("%A")

    if(days == "Everyday"):
        return True

    if(days == "Weekday" and (
        dayofweek == "Monday" or
        dayofweek == "Tuesday" or
        dayofweek == "Wednesday" or
        dayofweek == "Thursday" or
        dayofweek == "Friday"
    )
    ):
        return True

    if(days == "Weekends" and (
        dayofweek == "Saturday" or
        dayofweek == "Sunday"
    )):
        return True

    if(days == dayofweek):
        return True

    return False


def is_time(time):
    localtime = datetime.now().strftime("%H:%M")
    return (localtime == time)


def is_now(row):
    days = row["days"].capitalize()
    time = row["time"].strip()
    print(' check isnow' )
    if is_today(days) and is_time(time):
        print(" time matches" )
        return True

    return False


def mainloop():

    while True:
        timetable = readtimetable()

        for index in timetable:
            
            if isinstance(index, str) or isinstance(index, int):
                row = timetable[index]
            elif isinstance(index, dict):
                row = index

            if is_now(row):
                print(" time is now" )
                soundalarm(row["description"], row["time"],
                           row["days"], row["jingle"])

        time.sleep(5)


def soundalarm(description, alarmtime, days, sound):
    engine = pyttsx3.init()
    engine.say("The time is " + alarmtime)
    engine.say("Time for " + description)
    engine.runAndWait()
    print(alarmtime, description)  

    try:
       print(" playing sound" )
       mixer.init()
       mixer.music.load(tunes_path + sound.strip())
       mixer.music.play()
       print(" timer sleep 60 seconds" )
       time.sleep(60)
       print(" sleep awake" )

    except sounderror as errormsg:
        print(errormsg)
        engine.say(errormsg)
        engine.runAndWait()


def readtimetable():
    f = open(json_path)
    print(" read json file" )
    timetable = json.load(f)

    return timetable


def main():
    initialize()
    mainthread = threading.Thread(target=mainloop)
    mainthread.start()


if __name__ == "__main__":
    main()
