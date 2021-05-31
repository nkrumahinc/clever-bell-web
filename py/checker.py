from datetime import datetime
import re


def is_today(days):
    dayofweek = datetime.now().strftime("%A")

    if(days == "Everyday"):
        return True

    if(days == "Weekday" and (
        dayofweek == "Monday" or
        dayofweek == "Tuesday" or
        dayofweek == "Wednesday" or
        dayofweek == "Thursday" or
        dayofweek == "Friday"
    )
    ):
        return True

    if(days == "Weekends" and (
        dayofweek == "Saturday" or
        dayofweek == "Sunday"
    )):
        return True

    if(days == dayofweek):
        return True

    return False


def is_time(thetime):
    # check if 24 hour format

    if re.match(r'^(1[012]|[1-9]):[0-5][0-9](\s)(am|pm|AM|PM)$', thetime):
        localtime = datetime.now().strftime("%I:%M %p")

    if re.match(r'^(1[012]|[1-9]):[0-5][0-9](am|pm|AM|PM)$', thetime):
        localtime = datetime.now().strftime("%I:%M%p")

    print("localtime " + localtime + "entry " + thetime)

    return (localtime == thetime)


def is_now(days: str, thetime: str):
    days = days.capitalize()
    thetime = thetime.strip().upper()
    print(' check isnow')

    istoday = "today" if(is_today(days)) else "not today"

    print(days + " " + istoday)

    if is_today(days) and is_time(thetime):
        print(" time matches")
        return True

    return False
