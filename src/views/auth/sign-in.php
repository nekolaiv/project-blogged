<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../../public/styles/globals.css">
    <link rel="stylesheet" href="../../public/styles/forms.css">
</head>
<body>
    <section class="form-section">
        <p id="form-logo">Project-Blog.</p>
        <form action="sign-up.php" method="POST">
            <p id="form-description">Sign-in with your account</p>
            <input type="text" name="username" id="username" placeholder="username" required><br><br>
            <input type="password" name="password" id="password" placeholder="password" required><br><br>
            <div id="forgot-password"><a href="#">forgot password?</a></div>
            <input type="submit" value="sign-in">
            <div id="or-separator"><hr><p>or</p><hr></div>
            <button type="button" class="form-switch-button"><a href="./sign-up.php">sign-up</a></button>
        </form>
    </section>
    <section class="design-section">

    </section>
</body>
</html>