<?php

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser ($conn, $username, $pwd) {
    $usernameExists = usernameExists($conn, $username);

    if ($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $usernameExists["Password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["accountId"] = $usernameExists["AccountId"];
        $_SESSION["username"] = $usernameExists["Username"];
        header("Location: ../index.php");  // will need to change this based on the user they are, so that it directs them to the correct place e.g sys admin dashboard
        exit();
    }

}

function usernameExists($conn, $username) {
    $sql = "SELECT * FROM USERACCOUNTS WHERE Username = '?';";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=stmtfailed");
        exit();
    }
}

?>