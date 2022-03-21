<?php

if (isset($_POST["submit"])) {
    $accept = $_POST["accept"];

    if (isset($_POST["accept"])) {
       if (empty($accept)) {
            header("Location: ../sysGuidelineAcc.php?error=emptycheckbox");
            exit();
        }
        else {
            header("Location: ../requestTypeSelect.php");
            exit();
        }
    }
    else {
        header("Location: ../sysGuidelineAcc.php");
        exit();
    }
}
else {
    header("Location: ../sysGuidelineAcc.php");
    exit();
}

?>