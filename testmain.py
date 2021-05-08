import os
import threading
import time
from datetime import datetime
from playsound import playsound
import pyttsx3
from pygame import mixer
from pygame import error as sounderror
import csv
import json
import sys

json_path = "/var/www/cleverbell/timetable.json"
tunes_path = "/var/www/cleverbell/jingles/"

log_path = "/var/www/cleverbell/testlog.log"
#logfile = open(log_path, "w+")
#sys.stdout = logfile

def initialize():
    print(" f: initialize" )
    engine = pyttsx3.init()
    engine.say("Clever Bell Initiated")
    print("Clever Bell Initiated")
    engine.runAndWait()
    mixer.init()   

def is_today(days):
    print(" f: is_today" )
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
    print(" f: is_time" )
    localtime = datetime.now().strftime("%H:%M")
    print(localtime)
    print(time)
    return (localtime == time)


def is_now(row):
    print("fun: is now" )
    days = row["days"].capitalize()
    time = row["time"].strip()
    print(' check isnow' )
    if is_today(days) and is_time(time):
        print(" time matches" )
        return True

    return False


def mainloop():
    print(" f:mainloop" )

    while True:
        timetable = readtimetable()

        for index in timetable:
            
            if isinstance(index, str) or isinstance(index, int):
                row = timetable[index]
            elif isinstance(index, dict):
                row = index

            if is_now(row):
                print(" time is now" )
                #soundalarm(row["description"], row["time"],
                #           row["days"], row["jingle"])

                soundalarm("this is a test" , datetime.now().strftime("%H:%M"),
                           "Everyday" , "a.mp3" )
        time.sleep(5)

def testloop():
    print(" f:testloop" )
    row = {"description": "this is a test", "time":datetime.now().strftime("%H:%M"), "days" :"Everyday", "jingle":"a.mp3"}
    while True:
        if is_now(row):
            soundalarm(row["description"], row["time"], row["days"], row["jingle"])

def soundalarm(description, alarmtime, days, sound):
    print(" f:soundalarm" )
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
    print(" f:readtimetable" )
    f = open(json_path)
    print(" read json file" )
    timetable = json.load(f)

    return timetable


def main():
    print(" f:main" )
    initialize()
    mainthread = threading.Thread(target=testloop)
    #mainthread = threading.Thread(target=mainloop)
    mainthread.start()


if __name__ == "__main__":
    main()
