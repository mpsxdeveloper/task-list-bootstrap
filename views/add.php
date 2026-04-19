<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Task List - Add</title>
</head>

<body>
    
<div class="container">

        <?php require_once('navbar.html'); ?>

        <div class="container w-50 mt-5">
            <form method="POST" action="../controller/TaskController.php" id="form">
                <div class="mb-3 text-center">
                    <h3>Add Task</h3>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" 
                        aria-describedby="descriptionHelp" required onblur="this.value=this.value.trim().toUpperCase();">
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select id="priority" name="priority" class="form-select">
                        <option value=""></option>
                        <option value="LOW">LOW</option>
                        <option value="MEDIUM">MEDIUM</option>
                        <option value="HIGH">HIGH</option>
                        <option value="URGENT">URGENT</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="done" class="form-label">Done</label>
                    <select id="done" name="done" class="form-select">
                        <option value=""></option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-end" onclick="addTask();">
                    <i class="bi bi-check-circle-fill"></i> Save
                </button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../scripts/ajax.js"></script>

</body>

</html>
