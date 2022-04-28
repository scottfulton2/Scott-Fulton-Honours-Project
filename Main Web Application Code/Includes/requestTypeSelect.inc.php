<?php

if (isset($_POST["submit"])) {
    $usertype = $_POST["usertype"];
    $response = $_POST["g-recaptcha-response"];

    if (isset($_POST["usertype"]) && isset($_POST["g-recaptcha-response"])) {
        if (empty($usertype) or empty($response)) {
            header("Location: ../requestTypeSelect.php?error=nochoice");
            exit();
        }
        elseif ($usertype == "student") {
            $secret = "";
            $fileContents = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            
            $data = json_decode($fileContents);

            if($data->success) {
                header("Location: ../studentRequestForm.php");
                exit();
            }
            else {
                header("Location: ../requestTypeSelect.php?error=nochoice");
                exit();
            }
        }
        elseif ($usertype == "staff") {
            $secret = "";
            $fileContents = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            
            $data = json_decode($fileContents);

            if($data->success) {
                header("Location: ../staffRequestForm.php");
                exit();
            }
            else {
                header("Location: ../requestTypeSelect.php?error=nochoice");
                exit();
            }
        }
        else {
            $secret = "";
            $fileContents = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            
            $data = json_decode($fileContents);

            if($data->success) {
                header("Location: ../externalRequestForm.php");
                exit();
            }
            else {
                header("Location: ../requestTypeSelect.php?error=nochoice");
                exit();
            } 
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
