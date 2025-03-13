<?php
require 'class/Task.php';
$task = new Task();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lihat_task = $task->lihat_task($id);
    if (!$lihat_task) {
        header('location:index_task.php');
    }
} else {
    header('location:index_task.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Task</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Task</h2>
        <div class="card">
            <div class="card-body">
                <form action="controller_task.php" method="POST">
                    <input type="hidden" name="id" value="<?= $lihat_task['id'] ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Title" value="<?= $lihat_task['title'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan Description" required><?= $lihat_task['description'] ?></textarea>
                    </div>
                    <button type="submit" name="edit_task" class="btn btn-primary">Simpan</button>
                    <a href="index_task.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
