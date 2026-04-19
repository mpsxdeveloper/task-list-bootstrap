<?php

require_once('../model/Task.php');

class TaskDAO {

    private $server = "localhost";
    private $database = "todolist";
    private $user = "";
    private $password = "";
    private $conn = null;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password);
        }
        catch(PDOException $e) {
            throw new PDOException($e);
            $e->getMessage();
        }
    }

    function addTask(Task $task) {
        $stmt = $this->conn->prepare("INSERT INTO tasks (description, priority, done)
                VALUES (:description, :priority, :done)");
        $stmt->bindValue(':description', $task->getDescription());
        $stmt->bindValue(':priority', $task->getPriority());
        $stmt->bindValue(':done', $task->getDone());
        $stmt->execute();
        return $stmt->rowCount();
    }

    function updateTask(Task $task) {
        try {
            $stmt = $this->conn->prepare("UPDATE tasks SET description = :description, priority = :priority, 
            done = :done WHERE id = :id");
            $stmt->bindValue(':description', $task->getDescription());
            $stmt->bindValue(':priority', $task->getPriority());
            $stmt->bindValue(':done', $task->getDone());
            $stmt->bindValue(':id', $task->getId());
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            return false;
        }
    }

    function getTasks() {
        $stmt = $this->conn->query("SELECT * FROM tasks");
        $stmt->execute();
        $tasks = null;
        if($stmt->rowCount() > 0) {
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $tasks;
    }

    function getTask($id) {
        $task = null;
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $task = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $task;
    }

    function deleteTask($id) {
        $stmt = $this->conn->prepare("DELETE from tasks WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

}
