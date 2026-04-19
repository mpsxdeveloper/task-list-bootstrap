<?php

class Task implements JsonSerializable {

    private $id;
    private $description;
    private $priority;
    private $done;

    public function jsonSerialize() : mixed {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function getDone() {
        return $this->done;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPriority($priority) {
        $this->priority = $priority;
    }

    public function setDone($done) {
        $this->done = $done;
    }

}
