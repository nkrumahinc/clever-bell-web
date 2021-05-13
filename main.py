from py.checker import is_now
from py.reader import readtimetable, initjson
from py.ringer import soundalarm

from py.say import say
from py.play import initjingles

import threading
import time

def initialize():
    initjson()
    initjingles()
    say("cleverbell initiated")
    print("Clever Bell Initiated")

def mainloop():

    while True:
        timetable = readtimetable()

        for row in timetable:
            if is_now(row):
                print(" time is now" )
                soundalarm(row)

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
