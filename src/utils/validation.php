<?php
// validation.php

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePasswordLength($password) {
    // You can add more validation rules here (e.g., minimum length, special characters)
    return strlen($password) >= 6;
}

function validatePasswordConfirmation($password, $confirmPassword) {
    return $password === $confirmPassword;
}
?>
