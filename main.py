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

    while True:
        timetable = readtimetable(p)

        for row in timetable:
            if is_now(row):
                # print(" time is now" )
                soundalarm(row,p)

        time.sleep(5)

def startloop():
    mainthread = threading.Thread(target=mainloop)
    mainthread.start()

def main():
    # say("friday night yes")
    initialize()
    startloop()

if __name__ == "__main__":
    main()
