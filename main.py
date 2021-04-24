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

json_path = "/var/www/cleverbell/timetable.json"
tunes_path = "/var/www/cleverbell/jingles/"



def initialize():
    # get current working directory
    path = os.getcwd()


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
    # check if today is among

    days = row["days"].capitalize()
    time = row["time"].strip()

    if is_today(days) and is_time(time):
        return True

    return False


def mainloop():
    initialize()

    while True:
        timetable = readtimetable()

        for index in range(len(timetable)):

            row = timetable[index]
            if is_now(row):
                soundalarm(row["description"], row["time"],
                           row["days"], row["jingle"])

        time.sleep(5)


def soundalarm(description, alarmtime, days, sound):
    engine = pyttsx3.init()
    engine.say("The time is " + alarmtime)
    engine.say("Time for " + description)
    engine.runAndWait()

    try:
        mixer.init()
        mixer.music.load(tunes_path + sound.strip())
        mixer.music.play()
        time.sleep(60)

    except sounderror as errormsg:
        print(errormsg)
        engine.say(errormsg)
        engine.runAndWait()


def readtimetable():
    f = open(json_path)
    timetable = json.load(f)

    return timetable


def main():
    initialize()
    engine = pyttsx3.init()
    engine.say("Clever Bell Initiated")
    engine.runAndWait()
    mainthread = threading.Thread(target=mainloop)
    mainthread.start()


if __name__ == "__main__":
    main()
