<?php

    session_start();

/*

if(isset($_POST['logout'])) {
  session_destroy();
  header("location: login.php");
}
echo '<link rel="shortcut icon" href="https://www.dundee.ac.uk/themes/custom/uod/assets/favicons/favicon.ico"/>';
*/
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Styles/style.css">
    <title>UoD TRMS</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">UOD Technical Request Management System</a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="toggleMobileMenu" style>
            <ul class="navbar-nav ms-auto text-right">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sysGuidelinepg.php">System Guidelines</a>
                </li>
                <?php
                    if (isset($_SESSION["username"])) {
                        echo "<li><a href=''>Logout</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>