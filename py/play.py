from pygame import mixer

from audioplayer import AudioPlayer

import time
from py.say import say
import os

mixer.init()

def initjingles():
    # if jingles folder does not exist, create it
    pass

def play(filename):
    jingle = os.getcwd() + "/jingles/"+filename
    player = AudioPlayer(jingle)
    player.play(loop=False,block=True)
