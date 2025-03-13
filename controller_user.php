<?php
session_start();
require 'class/User.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);

        if ($user->register($username, $email)) {
            $_SESSION['message'] = "Registrasi berhasil! Silakan login.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Gagal registrasi! Username atau email mungkin sudah digunakan.";
            header("Location: register.php");
            exit();
        }
    }

    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);

        $login_result = $user->login($username, $email);
        if ($login_result) {
            // Simpan session setelah login berhasil
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['message'] = "Login berhasil! Selamat datang, $username.";

            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Login gagal! Periksa kembali username dan email Anda.";
            header("Location: login.php");
            exit();
        }
    }
}
?>
