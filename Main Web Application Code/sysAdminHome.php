<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
  <h1 class="text-center">System Administrator Menu</h1><br>
</div>

<div class="container-fluid" style="padding:0">
  <div class="jumbotron" style="margin-bottom:1px;">
    <form>
      <button type="submit" formaction="">Archived Requests</button>
    </form>
    <form>
      <button type="submit" formaction="view&ManageRequests.php">View & Manage Requests</button>
    </form>
    <form>
      <button type="submit" formaction="viewLoginAccs.php">View Login Accounts</button>
    </form>
		<form>
      <button type="submit" formaction="matEquipList.php">View Materials & Equipment Lists</button>
    </form>
    <form>
      <button type="submit" formaction="Includes/logout.inc.php">Logout</button>
    </form>
  </div>
</div>

</body>

</html>
