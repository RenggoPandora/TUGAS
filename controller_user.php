<?php
session_start();
require 'class/User.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        if ($user->register($username, $email)) {
            $_SESSION['message'] = "Registrasi berhasil! Silakan login.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Gagal registrasi!";
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $login_result = $user->login($username, $email);
        if ($login_result !== true) {
            $_SESSION['error'] = $login_result;
            header("Location: login.php");
            exit();
        }
    }
}
?>
