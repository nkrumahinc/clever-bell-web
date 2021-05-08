from pygame import mixer
import time

tunes = "/var/www/cleverbell/jingles/a.mp3"

mixer.init()
mixer.music.load(tunes)
mixer.music.play()
time.sleep(5)
