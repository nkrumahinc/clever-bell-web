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
    <nav class="nav nav-tabs navbar-light bg-light m-2">
        <span class="navbar-brand h1">Cleverbell</span>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="/">Schedules</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jingle">Jingles</a>
            </li>
        </ul>
    </nav>
    <div class="container">

        <div class="row m-3">

            <h3>Schedules</h3>
            <div class="my-3">
                <p><a href="/schedule/create" class="btn btn-primary">New</a></p>
            </div>
            <?php

            $schedules = Csv::readAllSchedules();

            echo "
        <table class=\"table w-100 table-hover\">
            <thead>
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
            </thead>
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
        </thead>
        </table>
    ";

            ?>


        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>