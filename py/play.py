from pygame import mixer

from audioplayer import AudioPlayer

import os

mixer.init()

def initjingles():
    # if jingles folder does not exist, create it
    pass

def play(filename):
    player = AudioPlayer(filename)
    player.play(loop=False,block=True)

def playJingle(filename):
    jingle = os.getcwd() + "/jingles/"+filename
    play(jingle)

def playRecording(filename):
    jingle = os.getcwd() + "/recordings/"+filename
    play(jingle)