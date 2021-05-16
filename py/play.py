from pygame import mixer
from pygame import error as sounderror

from audioplayer import AudioPlayer

import time
from py.say import say

mixer.init()

def initjingles():
    # if jingles folder does not exist, create it
    pass

def playx(filename):
    jingle = "jingles/"+filename

    try:
        mixer.music.load(jingle)
        mixer.music.play()
        while mixer.music.get_busy():
            time.sleep(1)
    
    except sounderror as errormsg:
        say(errormsg)
        print(errormsg)

    # print("plays " + filename)

def play(filename):
    jingle = "jingles/"+filename
    player = AudioPlayer(jingle)
    player.play(loop=False,block=True)
