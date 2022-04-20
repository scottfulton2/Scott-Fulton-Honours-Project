<?php

  session_start();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">  
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="Styles/style.css">
  <title>UoD TRMS</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
              //option to let the user navigate back to the dashboard/landing page
                switch ($_SESSION['accountType']) {
                  case 'System Administrator':
                    echo "<li class='nav-item'><a class='nav-link' href='sysAdminHome.php'>Dashboard</a></li>";
                    break;
                  case 'Technician':
                    echo "";
                    break;
                  case 'Finance/Admin Staff':
                    echo "";
                    break;
                  case 'Supervisor':
                    echo "";
                    break;
                  default:
                    echo "";
                    break;
                }
              echo "<li class='nav-item'><a class='nav-link' href='Includes/logout.inc.php'>Logout</a></li>";
            }
            else {
              echo "<li class='nav-item'><a class='nav-link' href='login.php'>Log in</a></li>";
            }
          ?>
        </ul>
      </div>
  </nav>
    <!-- add in html container divs before and after below php code: -->
<?php
/*
if (isset($_SESSION['sessionVarName'])) {
  switch ($_SESSION['accountType']) {
    case 'System Administrator':
      echo "<a>Logged in as System Administrator</a>";
      break;
    case 'Technician':
      echo "";
      break;
    case 'Finance/Admin Staff':
      echo "";
      break;
    case 'Supervisor':
      echo "";
      break;
    default:
      echo "";
      break;
  }
}
else {
  echo "";
}
*/
?>