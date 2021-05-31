from py.play import play_jingle, play_recording
from py.say import say


def soundalarm(row, p):

    description = row["description"]
    alarmtime = row["time"]
    jingle = row["jingle"]
    recording = row["recording"]

    say("the time is " + alarmtime)
    say("time for " + description)
    print(alarmtime, description)

    print(" playing sound")
    play_jingle(jingle, p)

    print("playing recording")
    play_recording(recording, p)
