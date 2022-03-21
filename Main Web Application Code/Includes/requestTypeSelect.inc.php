<?php

if (isset($_POST["submit"])) {
    $usertype = $_POST["usertype"];

    if (isset($_POST["usertype"])) {
        if (empty($usertype)) {
            header("Location: ../requestTypeSelect.php?error=nochoice");
            exit();
        }
        elseif ($usertype == "student") {
            header("Location: ../studentRequestForm.php");
            exit();
        }
        elseif ($usertype == "staff") {
            header("Location: ../staffRequestForm.php");
            exit();
        }
        else {
            header("Location: ../externalRequestForm.php");
            exit();
        }
    }
    else {
        header("Location: ../requestTypeSelect.php");
        exit();
    }
}

else {
    header("Location: ../requestTypeSelect.php");
    exit();
}    

?>