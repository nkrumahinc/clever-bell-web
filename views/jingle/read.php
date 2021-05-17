<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>CleverBell Editor : View Jingle</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row m-3">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Jingle</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $jingle; ?></b></p>
                    </div>
                    <div class="form-group">
                        <!-- <label>Play</label> -->
                        <p><audio controls>
                                <source src="/jingles/<?php echo $jingle ?>">
                                Your browser does not support the audio element.
                            </audio></p>
                    </div>

                    <p>
                        <button type="button" class="btn btn-outline-danger modalbutton" data-toggle="modal" data-target="#deleteModalCenter">
                            Delete
                        </button>
                    </p>
                    <p><a href="/jingle" class="btn btn-secondary">Back</a></p>
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
                    <a class="btn btn-danger" href="/jingle/delete/<?php echo $id ?>">Delete</a>
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