from py.play import playJingle, playRecording
from py.say import say

def soundalarm(row, p):

    description = row["description"]
    alarmtime = row["time"]
    jingle = row["jingle"]
    recording = row["recording"]

    say("the time is " + alarmtime)
    say("time for " + description)
    print(alarmtime, description)  

    print(" playing sound" )
    playJingle(jingle,p)
    
    print("playing recording")
    playRecording(recording,p)
