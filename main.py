import os
import threading
import time
from datetime import datetime
from playsound import playsound
import pyttsx3
from pygame import mixer
from pygame import error as sounderror
import csv
import codecs

csv_path = "/var/www/cleverbell/timetable.csv"
tunes_path = "/var/www/cleverbell/jingles/"


def initialize():
    # get current working directory
    path = os.getcwd()
    #tunes_path = path + "\\alarm_tunes"


def target():
    initialize()

    while True:
        localtime = datetime.now().strftime("%H:%M")
        dayofweek = datetime.now().strftime("%A")
        dateoftoday = datetime.now().strftime("%d-%m-%Y")
        timetable = readtimetable()

        for index in range(1, len(timetable)):
            row = timetable[index]
            if len(row) > 0:
                # check if today is among
                if(row[2].capitalize() == "Everyday" or row[2].capitalize() == dayofweek or row[2] == dateoftoday or row[2] == ''):
                    if(localtime == row[1].strip()):
                        soundalarm(row[0], row[1], row[2], row[3])

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
        reader = csv.reader((line.replace('\0','') for line in csvfile), delimiter=',', quotechar='|')
        for row in reader:
            timetable.append(row)

    return timetable


def main():
    initialize()
    engine = pyttsx3.init()
    engine.say("Clever Bell Initiated")
    engine.runAndWait()
    mainthread = threading.Thread(target=target)
    mainthread.start()


if __name__ == "__main__":
    main()
