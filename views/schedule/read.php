<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>CleverBell Editor : View Schedule</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row m-3">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Schedule</h1>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $schedule["description"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <p><b><?php echo $schedule["time"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Days</label>
                        <p><b><?php echo $schedule["days"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Jingle</label>
                        <p><b><?php echo $schedule["jingle"]; ?></b></p>
                    </div>
                    <p>
                        <span>
                            <a class="btn btn-primary" href="/schedule/update/<?php echo $index ?>">Edit</a>
                        </span>
                        <span><a class="btn btn-primary" href="/schedule/duplicate/<?php echo $index ?>">Duplicate</a></span>
                        <button type="button" class="btn btn-danger modalbutton" data-toggle="modal" data-target="#deleteModalCenter">
                            Delete
                        </button>
                        <!-- <span><a class="btn btn-danger" href="/schedule/delete/<?php echo $index ?>">Delete</a></span> -->
                    </p>
                    <p><a href="/" class="btn btn-secondary">Back</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLongTitle">Are You Sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this schedule?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modaldismiss" data-dismiss="modal">No</button>
                    <!-- <button type="button" class="btn btn-primary">Delete</button> -->
                    <a class="btn btn-danger" href="/schedule/delete/<?php echo $index ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>