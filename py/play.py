from pygame import mixer
import time

mixer.init()


def initjingles():
    # if jingles folder does not exist, create it
    pass


def play(filename):
    mixer.music.load(filename)
    while(mixer.music.play()):
        time.sleep(1)


def play_jingle(filename, p):
    jingle = p + "/jingles/"+filename
    play(jingle)


def play_recording(filename, p):
    jingle = p + "/recordings/"+filename
    play(jingle)
