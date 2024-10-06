<?php
// AuthController.php
require_once '../config/database.php';
require_once '../models/User.php';
require_once '../utils/validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sign_in'])) {
        handleSignIn();
    } elseif (isset($_POST['sign_up'])) {
        handleSignUp();
    }
}

function handleSignIn() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validation
    if (!validateEmail($email) || !validatePassword($password)) {
        die('Invalid input');
    }

    // Authentication logic
    $user = User::findByEmail($email);
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: /public/index.php');
    } else {
        die('Invalid credentials');
    }
}

function handleSignUp() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validation
    if (!validateEmail($email) || !validatePassword($password) || $password !== $confirmPassword) {
        die('Invalid input');
    }

    // Registration logic
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    User::create($email, $hashedPassword);
    header('Location: /public/index.php');
}
?>
