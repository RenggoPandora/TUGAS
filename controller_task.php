<?php
require 'class/Task.php';
$task = new Task();

if (isset($_POST['tambah_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $task->tambah_task($title, $description);
    header('location:index_task.php');
}

if (isset($_POST['edit_task'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $task->edit_task($id, $title, $description);
    header('location:index_task.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task->hapus_task($id);
    header('location:index_task.php');
}