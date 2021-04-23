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

# csv_path = "/var/www/cleverbell/timetable.csv"
# tunes_path = "/var/www/cleverbell/jingles/"

csv_path = "./timetable.csv"
json_path = "./timetable.json"
tunes_path = "./jingles/"


def initialize():
    # get current working directory
    path = os.getcwd()
    #tunes_path = path + "\\alarm_tunes"


def is_today(days):
    dayofweek = datetime.now().strftime("%A")
    return (days == "Everyday" or days == dayofweek or days or days == '')


def is_time(time):
    localtime = datetime.now().strftime("%H:%M")
    return (localtime == time)


def is_now(row):
    # check if today is among
    days = row[2].capitalize()
    time = row[1].strip()

    if is_today(days) and is_time(time):
        return True

    return False


def mainloop():
    initialize()

    while True:
        timetable = readtimetable()

        for index in range(len(timetable)):

            row = timetable[index]

            print(row[0], row[1], row[2], row[3])

            if is_now(row):
                soundalarm(row[0], row[1],
                           row[2], row[3])

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
    timetable = []
    with open(csv_path, 'rt') as csvfile:
        reader = csv.reader((line.replace('\0', '')
                             for line in csvfile), delimiter=',', quotechar='|')
        for row in reader:
            timetable.append(row)

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
