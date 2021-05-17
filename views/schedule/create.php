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
                        <div class="form-group my-4">
                            <label>Jingle</label>
                            <div class="row">
                                <div class="col">
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
                                </div>
                                <div class="col">
                                    <a href="/jingle" class="btn btn-outline-primary">Upload New Jingle</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-4">
                            <label>Recording</label>
                            <div class="row">
                                <div class="col">
                                    <select name="recording" id="recording" class="form-control">
                                        <option value="">choose a recording</option>
                                        <?php
                                        $recordings = Recording::getAll();
                                        $i = 0;
                                        $selected = "selected = \"selected\"";
                                        foreach ($recordings as $recording) {
                                            echo "<option value=\"$recording\">$recording</option>";
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <a href="/jingle" class="btn btn-outline-primary">Upload New Recording</a>
                                </div>
                        </div>
                        <div class="form-group my-4">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group my-4">
                            <label>Time HH:MM am/pm</label>
                            <input 
                                type="text" 
                                name="time" 
                                class="form-control" 
                                placeholder="HH:MM AM"
                                pattern="^(1[012]|[1-9]):[0-5][0-9](\s)?(am|pm|AM|PM)$"
                            >
                        </div>
                        <div class="form-group my-4">
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