<?php
require 'class/Task.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $task = new Task();
    $task->update_status($id, $status);

    // Redirect kembali ke halaman utama
    header("Location: index.php");
    exit();
}
?>
