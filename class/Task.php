<?php

class Task{
    private $db;

    public function __construct(){
        include 'koneksi.php';
    }

    function tampil_task(){
        return $this->db->query("SELECT * FROM tasks");
    }

    function tambah_task($title, $description){
        $this->db->query("INSERT INTO tasks (title, description) VALUES ('$title', '$description')");
    }

    function hapus_task($id){
        $this->db->query("DELETE FROM tasks WHERE id = '$id'");
    }

    public function lihat_task($id) {
        $query = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function edit_task($id, $title, $description) {
        $query = $this->db->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :id");
        $query->execute([
            ':title' => $title,
            ':description' => $description,
            ':id' => $id
        ]);
    }
}
?>