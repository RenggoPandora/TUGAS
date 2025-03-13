<?php
session_start(); // Mulai session

// Periksa apakah user sudah login berdasarkan session username dan email
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    $_SESSION['error'] = "Anda harus login terlebih dahulu!";
    header("Location: login.php");
    exit();
}

require 'class/Task.php';
$task = new Task();
$lihat_task = $task->tampil_task();
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Task</h2>
        
        <!-- Tampilkan pesan sukses jika ada -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <a href="tambah_task.php" class="btn btn-primary mb-3">Tambah Task</a>
                <a href="logout.php" class="btn btn-danger mb-3 float-right">Logout</a>
                
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lihat_task as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($value['title']) ?></td>
                                <td><?= htmlspecialchars($value['description']) ?></td>
                                <td><?= htmlspecialchars($value['created_at']) ?></td>
                                <td>
                                    <!-- Form untuk mengubah status -->
                                    <form action="update_status.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="pending" <?= ($value['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                                            <option value="in_progress" <?= ($value['status'] == 'in_progress') ? 'selected' : '' ?>>In Progress</option>
                                            <option value="completed" <?= ($value['status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="edit_task.php?id=<?= $value['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="controller_task.php?id=<?= $value['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
