<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>CleverBell Editor : Edit Schedule</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="/schedule/update/<?php echo $index ?>" method="post">
                        <?php $selected = "selected = \"selected\""; ?>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $schedule["description"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="text" name="time" class="form-control" value="<?php echo $schedule["time"]; ?>">
                        </div>
                        <div class="form-group">
                            <label>Days</label>
                            <select name="days" id="days" class="form-control">
                                <?php foreach (Schedule::$days as $day) {
                                    echo "<option value=\"$day\"" . (($schedule["days"] == $day) ? $selected : '') . ">$day</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jingle</label>
                            <select name="jingle" id="jingle" class="form-control">
                                <?php
                                $jingles = Jingle::getAll();
                                $i = 0;

                                foreach ($jingles as $jingle) {
                                    echo "<option value=\"$jingle\"" . (($jingles[$i] == $schedule["jingle"]) ? $selected : '') . ">$jingle</option>";
                                    $i++;
                                }
                                ?></select>
                        </div>
                        <input type="hidden" name="index" value="<?php echo $index; ?>" />
                        <input type="submit" class="btn btn-primary" value="Save Changes">
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