<!DOCTYPE html>
<html lang="en">
<?php
// hello how low
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>CleverBell Editor</title>
</head>

<body>
    <div class="container">
        <div class="row banner mx-2">
            <div class="col">
                <h1>Clever Bell</h1>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-md-4">
                <h3>Sounds</h3>
                <ul>
                    <?php
                    $jingles = Jingle::getAll();
                    foreach ($jingles as $jingle) {
                        echo "<li>" . $jingle . "</li>";
                    }
                    if (sizeof($jingles) == 0) {
                        echo "no sounds yet.";
                    }
                    ?>
                </ul>

                <form action="jingle" enctype="multipart/form-data" method="post">
                    <input type="file" name="jingle" accept="audio/*">
                    <input type="submit" name="Submit" value="Submit">
                </form>

            </div>
            <div class="col-md-8">
                <h3>Schedules</h3>
                <div class="my-3">

                    <p><a href="/schedule/create" class="btn btn-primary">New</a></p>
                </div>
                <?php

                $schedules = Csv::readAllSchedules();

                echo "
        <table class=\"w-100\">
            <tbody>
                <tr>
                    <th>
                        Description
                    </th>
                    <th>
                        Time
                    </th>
                    <th>
                        Days
                    </th>
                    <th>
                        Sound
                    </th>
                </tr>
    ";
                $index = 0;
                foreach ($schedules as $schedule) {
                    echo "
            <tr class='clickable-row p-1' data-href='/schedule/view/$index'>
                <td>$schedule[0]</td>
                <td>$schedule[1]</td>
                <td>$schedule[2]</td>
                <td>$schedule[3]</td>
                

            </tr>
        ";
                    $index++;
                }
                echo "
        </tbody>
        </table>
    ";

                ?>


            </div>
        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>