import pyttsx3

engine = pyttsx3.init()
engine.setProperty('voice', 'english+f4')

def say(text):
    engine.say(text)
    engine.runAndWait()
    # print("cleverbell says:", text)