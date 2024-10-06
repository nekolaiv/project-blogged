<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../../public/assets/styles/globals.css">
    <link rel="stylesheet" href="../../../public/assets/styles/forms.css">
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    

    require_once '../../config/Database.php';
    // Create an instance of the Database class
    $database = new Database();

    // Get the PDO connection
    $pdo = $database->connect();
    
    require_once '../../classes/registration.class.php';

    $userRegistration = new UserRegistration($pdo);
    $userRegistration->handleRequest();

    $emailError = $userRegistration->getEmailError();
    $passwordError = $userRegistration->getPasswordError();
    $confirmPasswordError = $userRegistration->getConfirmPasswordError();
    ?>
    <section class="form-section">
        <p id="form-logo">Project-Blog.</p>
        <form action="" method="POST">
            <p class="form-description">Sign-up for a new account</div></p>
            <input type="email" name="email" id="email" placeholder="email" required><br><br>
            <div class="error"><?php echo htmlspecialchars($emailError); ?></div>
            <input type="password" name="password" id="password" placeholder="password" required><br><br>
            <div class="error"><?php echo htmlspecialchars($passwordError); ?></div>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="confirm password" required><br><br>
            <div class="error"><?php echo htmlspecialchars($confirmPasswordError); ?></div>
            <input type="hidden" name="action" value="sign-up">
            <input type="submit" value="sign-up">
            <div id="or-separator"><hr><p>or</p><hr></div>
            <button type="button" class="form-switch-button"><a href="./sign-in.php">sign-in</a></button>
        </form>
    </section>
    <section class="design-section">
    </section>
</body>
</html>