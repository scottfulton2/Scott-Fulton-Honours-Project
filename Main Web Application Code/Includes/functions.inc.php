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
    $checkPwd = passwordCheck($conn, $pwd);

    if ($checkPwd === false) {
        // Display an error message if password is not valid
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        header("Location: ../index.php?loginsuccess");  // will need to change this based on the user they are, so that it directs them to the correct place e.g sys admin dashboard
        echo "<h1>Login Successful<h1>";
        exit();
    }

}

function usernameExists($conn, $username) {
    $result;
    
    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM USERACCOUNTS WHERE Username = ?;");
    
    /*
    if (!mysqli_stmt_prepare($sql, "SELECT * FROM USERACCOUNTS WHERE Username = ?;")) {
        header("Location: ../login.php?error=stmtfailed");
        exit();
    }
    */

    mysqli_stmt_bind_param($sql, "s", $username);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);

    if ($username === $row["Username"]) {
        $result = true;
    }
    else {
        $result = false;
    }
    mysqli_stmt_close($sql);

    return $result;

}

function passwordCheck($conn, $pwd) {
    $result;
    // password_verify(); //pre-defined function which checks if a password matches a hash

    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM USERACCOUNTS WHERE Password = ?");
    
    mysqli_stmt_bind_param($sql, 's', $pwd);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);

    if($pwd === $row["Password"]){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

?>