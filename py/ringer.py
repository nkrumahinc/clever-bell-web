from py.play import play
from py.say import say

def soundalarm(row):

    description = row["description"]
    alarmtime = row["time"]
    days = row["days"]
    jingle = row["jingle"]

    say("the time is " + alarmtime)
    say("time for " + description)
    print(alarmtime, description)  

    print(" playing sound" )
    play(jingle)
    print(" timer sleep 60 seconds" )
