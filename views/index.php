<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Task List - Index</title>
</head>

<body>
    
<div class="container">

        <?php require_once('navbar.html'); ?>
        <div class="row">
            <div class="col-10">
                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" id="progress" aria-label="Example with label"
                        aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <a type="button" class="btn btn-dark float-end mt-1 mb-1 " href="add.php">
                    <i class="bi bi-plus-circle-fill"></i> Add Task
                </a>
            </div>
        </div>
        
        <table class="table table-sm table-bordered table-hover mt-1" id="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col" style="width: 60%;">Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Done</th>
                    <th scope="col" style="width: 10%;">Actions</th>
                </tr>
            </thead>        
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../scripts/ajax.js"></script>
    <script>
        window.onload = function() {
            getTasks();
        }
    </script>

</body>

</html>