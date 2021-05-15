from datetime import datetime
import re

TESTMODE = True

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


def is_time(time):
    # check if 24 hour format

    if re.match(r'^(1[012]|[1-9]):[0-5][0-9](\s)(am|pm|AM|PM)$', time):
        localtime = datetime.now().strftime("%I:%M %p")

    if re.match(r'^(1[012]|[1-9]):[0-5][0-9](am|pm|AM|PM)$', time):
        localtime = datetime.now().strftime("%I:%M%p")
    

    return (localtime == time)


def is_now(row):
    isnow = False
    days = row["days"].capitalize()
    time = row["time"].strip()
    # print(' check isnow' )
    if is_today(days) and is_time(time):
        # print(" time matches" )
        return TESTMODE or True

    return TESTMODE or False