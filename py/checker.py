from datetime import datetime

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
    localtime = datetime.now().strftime("%H:%M")
    return (localtime == time)


def is_now(row):
    days = row["days"].capitalize()
    time = row["time"].strip()
    print(' check isnow' )
    if is_today(days) and is_time(time):
        print(" time matches" )
        return True

    return False

