from py.play import play
from py.say import say

def soundalarm(row):

    description = row["description"]
    alarmtime = row["time"]
    jingle = row["jingle"]
    recording = row["recording"]

    say("the time is " + alarmtime)
    say("time for " + description)
    print(alarmtime, description)  

    print(" playing sound" )
    play(jingle)
    
    print("playing recording")
    play(recording)
