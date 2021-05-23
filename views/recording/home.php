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
    <title>CleverBell Editor: Recordings</title>
</head>

<body>
    <nav class="nav nav-tabs navbar-light bg-light m-2">
        <span class="navbar-brand h1">Cleverbell</span>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Schedules</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jingle">Jingles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/recording">Recordings</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row my-3 py-2">
            <h3>Recordings</h3>
        </div>
        <div class="row card m-3 p-3">
            <div class="col-md-8">
                <h4>Upload</h4>

                <form action="recording" enctype="multipart/form-data" method="post">
                    <input class="form-control" type="file" name="recording" accept="audio/*">
                    <p style="text-align: right;" class="m-1">
                        <input class="btn btn-primary" type="submit" name="Submit" value="Upload">
                    </p>
                </form>
            </div>
        </div>

        <div class="row p-3 m-3 card">

            <div class="col-md-8">
                <?php
                $recordings = Recording::getAll();

                if (sizeof($recordings) == 0) {
                    echo "no sounds yet.";
                } else {

                    echo " 
                        <table class=\"w-100 table table-hover\">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Play</th>
                                    <th>Actions</th>
                                </tr></thead><tbody>";
                    $id = 0;
                    foreach ($recordings as $recording) {
                        echo "<tr class='clickable-row p-1' data-href='/recording/view/$id'>
                            <td>
                                " . $recording . "
                            </td>
                            <td>
                                <audio controls>
                                    <source src=\"/recordings/$recording\">
                                        Your browser does not support the audio element.
                                </audio>
                            </td>
                            <td>
                                <button type=\"button\" class=\"btn\">
                                    More
                                </button>
                            </td>
                        </tr>";
                        $id++;
                    }

                    echo "
                            </tbody>
                        </table>
                    ";
                }
                ?>
            </div>

        </div>

        <script src="/js/jquery-3.6.0.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/script.js"></script>
</body>

</html>