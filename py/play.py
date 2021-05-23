from audioplayer import AudioPlayer

def initjingles():
    # if jingles folder does not exist, create it
    pass

def play(filename):
    player = AudioPlayer(filename)
    player.play(loop=False,block=True)

def playJingle(filename, p):
    jingle = p + "/jingles/"+filename
    play(jingle)

def playRecording(filename ,p):
    jingle = p + "/recordings/"+filename
    play(jingle)