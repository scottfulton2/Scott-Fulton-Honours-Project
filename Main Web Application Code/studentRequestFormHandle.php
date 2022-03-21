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
        //$materials = $_POST['materials'];
        //$estOfMaterial = $_POST['estOfMaterial'];
        //$equipment = $_POST['equipment'];

        require_once 'Includes/db.inc.php';

        //check if any required fields are empty (that couldn't be checked using HTML)
        //discipline, project type are the only fields that need to checked, as HTML 'required' tag handles other required fields
        if (emptyRequiredFields($discipline, $projtype) !== false) {
            header("Location: studentRequest.php?error=emptyinput");
            exit();
        }

        // leaving out attaching files for now - $AttachedFiles
        submit($conn, $firstname, $surname, $email, $discipline, $projtype, $accountno, $accounthold, $supervFName, $supervSName, $supervEmail, $NatureOfReq);
        
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

function submit($conn, $firstname, $surname, $email, $discipline, $projtype, $accountno, $accounthold, $supervFName, $supervSName, $supervEmail, $NatureOfReq) {
    //EstOfMaterial - left out for now
    //AttachedFiles - left out for now
    //materialID (materials -> need to transfer the material and equipment names into their respective ID's) - left out for now
    //equipmentID - left out for now

    //get curent date
    $dateSubmitted = date("Y-m-d");

    $sql = "INSERT INTO REQUESTS (RequestorType, Email, FirstName, Surname,
						Discipline, ProjType, AccountToBeCharged, AccountHolder, NatureOfReq, 
                        SupervFName, SupervSName, SupervEmail, RequestStatus, ApproverOneID, 
                        ApproverTwoID, ApprovOneRevStatus, ApprovTwoRevStatus, DateSubmitted)
    VALUES ('Student', '$email', '$firstname', '$surname', '$discipline', '$projtype', '$accountno', '$accounthold',
            '$NatureOfReq', '$supervFName', '$supervSName', '$supervEmail', 'In Review', '2', '4', 'Reviewing', 'Reviewing',
            '$dateSubmitted');";

    /*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";*/

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}


?>