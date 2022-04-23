<?php

if (isset($_POST["submit"])) {
    $requestID = $_POST["requestID"];
    $supervEmail = $_POST["email"];

    require_once 'Includes/db.inc.php';

    if(emptyInput($requestID, $supervEmail) !== false) {
        header("Location: supervisorHome.php?error=emptyinput");
        exit();
    }

    findRequest($conn, $requestID, $supervEmail);

}

else {
    header("Location: supervisorHome.php");
    exit();
}

function emptyInput($requestID, $supervEmail) {
    $result;
    if (empty($requestID) || empty($supervEmail)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function findRequest ($conn, $requestID, $supervEmail) {
    $requestIDExists = requestIDExists($conn, $requestID);

    if ($requestIDExists === false) {
        header("location: supervisorHome.php?error=wrongDetails");
        exit();
    }
 
    supervEmailCheck($conn, $supervEmail, $requestID);
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

function supervEmailCheck($conn, $supervEmail, $requestID) {
    $result;

    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE RequestID = ?");
    
    mysqli_stmt_bind_param($sql, 's', $requestID);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);

    if($supervEmail === $row["SupervEmail"]  ) {
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
        // Display an error message if supervisor email is cannot be found

        header("Location: supervisorHome.php?error=wrongDetails");
        exit();
        
    }
}

?>