<?php
require_once '../models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $this->taskModel->create($title, $description);
        }
    }

    public function getTasks() {
        return $this->taskModel->getAll();
    }
}
