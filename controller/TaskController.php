<?php

require_once('../dao/TaskDao.php');

header("Content-type: application/json");

$q = filter_input(INPUT_POST, "q");

if($q == "add") {
    store();
}
if($q == "read") {
    read();
}
else if($q == "get") {
    get();
}
else if($q == "edit") {
    update();
}
else if($q == "del") {
    delete();
}

function get() {
    $id = filter_input(INPUT_POST, "id");
    $taskDAO = new TaskDao();
    $json = $taskDAO->getTask($id);
    echo json_encode($json);
}

function read() {
    $taskDAO = new TaskDao();
    echo json_encode($taskDAO->getTasks());
}

function store() {
    $description = strtoupper(trim(filter_input(INPUT_POST, "description")));
    $priority = filter_input(INPUT_POST, "priority");
    if($priority == "") {
        $priority = "LOW";
    }
    $done = filter_input(INPUT_POST, "done");
    if($done == "") {
        $done = "NO";
    }
    $taskDAO = new TaskDao();
    $task = new Task();
    $task->setDescription($description);
    $task->setPriority($priority);
    $task->setDone($done);
    $json = $taskDAO->addTask($task);
    echo json_encode($json);
}

function update() {
    $id = filter_input(INPUT_POST, "id");
    $description = strtoupper(trim(filter_input(INPUT_POST, "description")));
    $priority = filter_input(INPUT_POST, "priority");
    $done = filter_input(INPUT_POST, "done");
    $taskDAO = new TaskDao();
    $task = new Task();
    $task->setId($id);
    $task->setDescription($description);
    $task->setPriority($priority);
    $task->setDone($done);
    $json = $taskDAO->updateTask($task);
    echo json_encode($json);
}

function delete() {
    $id = filter_input(INPUT_POST, "id");
    $taskDAO = new TaskDao();
    $json = $taskDAO->deleteTask($id);
    echo json_encode($json);
}
