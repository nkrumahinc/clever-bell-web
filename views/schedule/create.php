<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>CleverBell Editor : Create Schedule</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row m-3">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Schedule</h2>
                    <p>Please edit the input values and submit to create the schedule.</p>
                    <form action="/schedule/create" method="post">
                        <div class="form-group">
                            <label>Jingle</label>
                            <select name="jingle" id="jingle" class="form-control">
                                <option value="">choose a jingle</option>
                                <?php
                                $jingles = Jingle::getAll();
                                $i = 0;
                                $selected = "selected = \"selected\"";
                                foreach ($jingles as $jingle) {
                                    echo "<option value=\"$jingle\">$jingle</option>";
                                    $i++;
                                }
                                ?>
                            </select>
                            <a href="/jingle">Upload New Jingle</a>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Time HH:MM am/pm</label>
                            <input 
                                type="text" 
                                name="time" 
                                class="form-control" 
                                placeholder="HH:MM AM"
                                pattern="^(1[012]|[1-9]):[0-5][0-9](\s)?(am|pm|AM|PM)$"
                            >
                        </div>
                        <div class="form-group">
                            <label>Days</label>
                            <select name="days" id="days" class="form-control">
                                <?php foreach (Schedule::$days as $day) {
                                    echo "<option value=\"$day\">$day</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
                        <a href="/" class="btn btn-secondary ml-2">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>