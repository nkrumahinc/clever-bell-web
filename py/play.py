from audioplayer import AudioPlayer
from pygame import mixer
import time

mixer.init()


def initjingles():
    # if jingles folder does not exist, create it
    pass


def play(filename):
    player = AudioPlayer(filename)
    player.play(loop=False, block=True)


def play_pygame(filename):
    mixer.music.load(filename)
    while(mixer.music.play()):
        time.sleep(1)


def playJingle(filename, p):
    jingle = p + "/jingles/"+filename
    play(jingle)


def playRecording(filename, p):
    jingle = p + "/recordings/"+filename
    play(jingle)
