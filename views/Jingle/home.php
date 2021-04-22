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
                <a class="nav-link" href="/jingles">Jingles</a>
            </li>
        </ul>
    </nav>
    <div class="container">



        <div class="row m-3">

            <div class="col-md-4">
                <h3>Jingles</h3>
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



        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>