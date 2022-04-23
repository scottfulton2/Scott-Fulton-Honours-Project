<?php

if (isset($_POST["submit"])) {
    $requestID = $_POST["requestID"];
    $email = $_POST["email"];

    require_once 'Includes/db.inc.php';

    if(emptyInput($requestID, $email) !== false) {
        header("Location: trackRequest.php?error=emptyinput");
        exit();
    }

    findRequest($conn, $requestID, $email);

}

else {
    header("Location: trackRequest.php");
    exit();
}

function emptyInput($requestID, $email) {
    $result;
    if (empty($requestID) || empty($email)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function findRequest ($conn, $requestID, $email) {
    $requestIDExists = requestIDExists($conn, $requestID);

    if ($requestIDExists === false) {
        header("location: trackRequest.php?error=wrongDetails");
        exit();
    }
 
    emailCheck($conn, $email);
}

function requestIDExists($conn, $requestID) {
    $result;
    
    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE RequestID = ?;");

    mysqli_stmt_bind_param($sql, "s", $requestID);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);

    if ($requestID == $row["RequestID"]) {
        $result = true;
    }
    else {
        $result = false;
    }
    mysqli_stmt_close($sql);

    return $result;

}

function emailCheck($conn, $email) {
    $result;

    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE Email = ?");
    
    mysqli_stmt_bind_param($sql, 's', $email);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);

    if($email === $row["Email"]){
        //start session
        session_start();

        //echo this message?
        //echo "<h1>Request Found<h1>";

        
        //store data in session variables and define session variables
        $_SESSION["requestID"] = $row["RequestID"];
        //$_SESSION["userType"] = "requestor";

        //go to 'redirect' code to take the user to the correct landing page
        header("Location: viewTrackReq.php");
        exit();
    }
    else {
        // Display an error message if email is cannot be found
        header("Location: trackRequest?error=wrongDetails");
        exit();
        
    }
}

?>