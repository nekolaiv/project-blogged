<?php
require_once '../../utils/validation.php';

class UserRegistration {
    private $pdo;
    private $email;
    private $password;
    private $confirmPassword;
    private $emailError = '';
    private $passwordError = '';
    private $confirmPasswordError = '';
    private $registrationStatus = '';

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['action']) == 'sign-up') {
            $this->email = trim($_POST['email'] ?? '');
            $this->password = trim($_POST['password'] ?? '');
            $this->confirmPassword = trim($_POST['confirm_password'] ?? '');

            $this->validateInput();

            if ($this->isValid()) {
                $this->registerUser();
            }
        }
    }

    private function validateInput() {
        if (!validateEmail($this->email)) {
            $this->emailError = 'Invalid email format.';
        }
        
        if (!validatePasswordLength($this->password)) {
            $this->passwordError = 'Password must be at least 6 characters long.';
        } else if (!validatePasswordConfirmation($this->password, $this->confirmPassword)) {
            $this->confirmPasswordError = '';
        }
    }

    private function isValid() {
        return empty($this->emailError) && empty($this->passwordError) && empty($this->confirmPasswordError);
    }

    private function registerUser() {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        try {
            $stmt = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
            $stmt->execute([$this->email, $hashedPassword]);
            header('Location: ./sign-in.php');
            exit();
        } catch (PDOEXCEPTION $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getEmailError() {
        return $this->emailError;
    }

    public function getPasswordError() {
        return $this->passwordError;
    }

    public function getConfirmPasswordError() {
        return $this->confirmPasswordError;
    }
}
