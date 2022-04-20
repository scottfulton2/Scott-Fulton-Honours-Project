<?php

dataInput();

function dataInput () {
    if (isset($_POST['submit'])) {
        //obtaining data from user input into the form
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $discipline = $_POST['discipline'];
        $projtype = $_POST['projtype'];
        $accountno = $_POST['accountno'];
        $accounthold = $_POST['accounthold'];
        $supervFName = $_POST['supervFName'];
        $supervSName = $_POST['supervSName'];
        $supervEmail = $_POST['supervEmail'];
        $NatureOfReq = $_POST['NatureOfReq'];
        //$AttachedFiles = $_POST['AttachedFiles'];
        $materials = $_POST['materials'];
        //$estOfMaterial = $_POST['estOfMaterial'];
        $equipment = $_POST['equipment'];

        require_once 'Includes/db.inc.php';

        //check if any required fields are empty (that couldn't be checked using HTML)
        //discipline, project type are the only fields that need to checked, as HTML 'required' tag handles other required fields
        if (emptyRequiredFields($discipline, $projtype) !== false) {
            header("Location: studentRequestForm.php?error=emptyinput");
            exit();
        }

        // leaving out attaching files for now - $AttachedFiles
        submit($conn, $firstname, $surname, $email, $discipline, $projtype, $accountno, $accounthold, $supervFName, $supervSName, $supervEmail, $NatureOfReq, $materials, $equipment);
        
        //redirect user to submit successful screen
        header("Location: requestSubmitted.php");
        exit();

    }
    else {
        header("Location: studentRequestForm.php");
        exit();
    }
}

function emptyRequiredFields ($discipline, $projtype) {
    $result;
    if (empty($discipline) || empty($projtype)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function submit($conn, $firstname, $surname, $email, $discipline, $projtype, $accountno, $accounthold, $supervFName, $supervSName, $supervEmail, $NatureOfReq, $materials, $equipment) {
    //EstOfMaterial - left out for now
    //AttachedFiles - left out for now
    
    //materialID (materials -> need to transfer the material and equipment names into their respective ID's)
    $materialID = NULL;
    //check if a material has been selected
    if (empty($materials) === FALSE) {
        $sqlm = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sqlm, "SELECT MaterialID FROM MATERIALS WHERE MaterialName = ?");
        
        mysqli_stmt_bind_param($sqlm, 's', $materials);

        mysqli_stmt_execute($sqlm);
        $stmtResultM = mysqli_stmt_get_result($sqlm);

        $rowM = mysqli_fetch_array($stmtResultM);

        $materialID = $rowM["MaterialID"];
    }

    //equipmentID
    $equipmentID = NULL;
    //check if an item of equipment has been selected
    if (empty($equipment) === FALSE) {
        $sqle = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sqle, "SELECT EquipmentID FROM EQUIPMENT WHERE EquipmentName = ?");
        
        mysqli_stmt_bind_param($sqle, 's', $equipment);

        mysqli_stmt_execute($sqle);
        $stmtResultE = mysqli_stmt_get_result($sqle);

        $rowE = mysqli_fetch_array($stmtResultE);

        $equipmentID = $rowE["EquipmentID"];
    }

    //get current date
    $dateSubmitted = date("Y-m-d");
    
    //if equipment and material selected
    if (empty($equipment) === FALSE && empty($materials) === FALSE) {
        $sql = "INSERT INTO REQUESTS (RequestorType, Email, FirstName, Surname,
                        Discipline, ProjType, AccountToBeCharged, AccountHolder, NatureOfReq, 
                        SupervFName, SupervSName, SupervEmail, MaterialID, EquipmentID, RequestStatus, ApproverOneID, 
                        ApproverTwoID, ApprovOneRevStatus, ApprovTwoRevStatus, DateSubmitted)
        VALUES ('Student', '$email', '$firstname', '$surname', '$discipline', '$projtype', '$accountno', '$accounthold',
                '$NatureOfReq', '$supervFName', '$supervSName', '$supervEmail', '$materialID', '$equipmentID', 'In Review', '2', '4', 'Reviewing', 'Reviewing',
                '$dateSubmitted');";
    }
    //else if material selected
    else if (empty($materials) === FALSE) {
        $sql = "INSERT INTO REQUESTS (RequestorType, Email, FirstName, Surname,
                        Discipline, ProjType, AccountToBeCharged, AccountHolder, NatureOfReq, 
                        SupervFName, SupervSName, SupervEmail, MaterialID, RequestStatus, ApproverOneID, 
                        ApproverTwoID, ApprovOneRevStatus, ApprovTwoRevStatus, DateSubmitted)
        VALUES ('Student', '$email', '$firstname', '$surname', '$discipline', '$projtype', '$accountno', '$accounthold',
                '$NatureOfReq', '$supervFName', '$supervSName', '$supervEmail', '$materialID', 'In Review', '2', '4', 'Reviewing', 'Reviewing',
                '$dateSubmitted');";
    }
    //else if equipment selected
    else if (empty($equipment) === FALSE) {
        $sql = "INSERT INTO REQUESTS (RequestorType, Email, FirstName, Surname,
                        Discipline, ProjType, AccountToBeCharged, AccountHolder, NatureOfReq, 
                        SupervFName, SupervSName, SupervEmail, EquipmentID, RequestStatus, ApproverOneID, 
                        ApproverTwoID, ApprovOneRevStatus, ApprovTwoRevStatus, DateSubmitted)
        VALUES ('Student', '$email', '$firstname', '$surname', '$discipline', '$projtype', '$accountno', '$accounthold',
                '$NatureOfReq', '$supervFName', '$supervSName', '$supervEmail', '$equipmentID', 'In Review', '2', '4', 'Reviewing', 'Reviewing',
                '$dateSubmitted');";
    }
    //else if neither equipment or material have been selected
    else {
        $sql = "INSERT INTO REQUESTS (RequestorType, Email, FirstName, Surname,
                        Discipline, ProjType, AccountToBeCharged, AccountHolder, NatureOfReq, 
                        SupervFName, SupervSName, SupervEmail, RequestStatus, ApproverOneID, 
                        ApproverTwoID, ApprovOneRevStatus, ApprovTwoRevStatus, DateSubmitted)
        VALUES ('Student', '$email', '$firstname', '$surname', '$discipline', '$projtype', '$accountno', '$accounthold',
                '$NatureOfReq', '$supervFName', '$supervSName', '$supervEmail', 'In Review', '2', '4', 'Reviewing', 'Reviewing',
                '$dateSubmitted');";
    }

    /*$sql = "INSERT INTO REQUESTS (RequestorType, Email, FirstName, Surname,
						Discipline, ProjType, AccountToBeCharged, AccountHolder, NatureOfReq, 
                        SupervFName, SupervSName, SupervEmail, MaterialID, EquipmentID, RequestStatus, ApproverOneID, 
                        ApproverTwoID, ApprovOneRevStatus, ApprovTwoRevStatus, DateSubmitted)
    VALUES ('Student', '$email', '$firstname', '$surname', '$discipline', '$projtype', '$accountno', '$accounthold',
            '$NatureOfReq', '$supervFName', '$supervSName', '$supervEmail', '$materialID', '$equipmentID', 'In Review', '2', '4', 'Reviewing', 'Reviewing',
            '$dateSubmitted');";*/

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";

        //send e-mail if new record is created successfully
        /*$to = $email;
        $subject = 'Test of Request Submission Receipt E-mail';
        $message = '<h1>Request Submitted</h1>
                    <p>E-mail: '. $email .'</p>
                    <p>Firstname: '. $firstname .'</p>
                    <p>Surname: '. $surname .'</p>
                    <p>Request ID: '. $ .'</p>
                    <p>Nature of Request: '. $ .'</p>';
        $headers = "From: The Sender Name <emailtest571@yahoo.com>\r\n";
        $headers .= "content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);*/
        //mail('emailtest571@yahoo.com', 'test subject', 'Hello There!', 'From: emailtest571@yahoo.com');
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>