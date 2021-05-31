from py.checker import is_now
from py.reader import readtimetable
from py.ringer import soundalarm

from py.say import say
from py.play import initjingles

import threading
import time

import os

p = os.path.dirname(os.path.realpath(__file__))


def initialize():
    initjingles()
    say("cleverbell initiated")
    print("Clever Bell Initiated")


def mainloop():
    print("thread started")

    while True:
        print("..")

        timetable = readtimetable(p)

        for row in timetable:
            print(row.get('description'))
            if is_now(row['days'], row['time']):
                soundalarm(row, p)
            else:
                print("not this time")

        time.sleep(5)


def printdict(d):
    print(d.keys())


def startloop():
    mainthread = threading.Thread(target=mainloop)
    print("starting thread")
    mainthread.start()


def testtimetable():
    print("\n")
    t = readtimetable(p)
    for i in t:
        print(i)
        print(type(i))
        print(i["description"])
        print("\n")


def main():
    initialize()
    startloop()
    # testtimetable()


if __name__ == "__main__":
    main()
