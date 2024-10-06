<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Blog</title>
    <base href="/project-blog/">
    <link rel="stylesheet" href="public/assets/styles/globals.css">
    <link rel="stylesheet" href="public/assets/styles/output.css">
</head>
<body>
    <header>
        <p><a href="./home">Project-Blog</a></p>
        <button class="menu-toggle" id="menu-toggle">
            <span class="menu-icon"></span>
        </button>
        <nav class="nav-menu" id="nav-menu">
            <ul>
                <li><a href="./home.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <button id="call-to-action-button">
                    <a href="../auth/sign-up.php">sign-in</a>
                </button>
            </ul>
        </nav>
    </header>
    <script src="../public/js/script.js"></script>