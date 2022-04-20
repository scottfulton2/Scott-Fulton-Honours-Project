<?php

session_start();

if(isset($_SESSION['accountType']))
{
  switch ($_SESSION['accountType'])
  {
    case 'System Administrator':
      header('Location: ../sysAdminHome.php');
      break;
    case 'Technician':
		  header('Location: ../technicianHome.php');
		  break;
    case 'Finance/Admin Staff':
		  header('Location: ../financeHome.php');
		  break;
    case 'Supervisor':
      header('Location: ../supervisorHome.php');
		  break;
    default:
		  header('Location: ../login.php');
		  break;
  }
  exit();
} 

else {
  header('Location: ../login.php');
  exit();
}

?>
