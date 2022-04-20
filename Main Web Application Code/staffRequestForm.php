<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
    <h1 class="text-center">Staff Technical Request Form</h1>
    <div>
        <p><b>Please fill out the form below.</b><p><br>
        <p>All fields marked with a * are required</p>
    </div>
</div>
    
<div class="container-fluid" style="padding:10">
  <div class="jumbotron text-right" style="margin-bottom:1px; padding:10">
    <form formaction="staffRequestFormHandle.php" method="post">
      
      <!-- will need to figure out how to mark required fields!!! -->
      <label for="firstname">First Name *: </label>  
      <input type="text" name="firstname" value="firstname" required><br>

      <label for="surname">Surname *: </label>
      <input type="text" name="surname" value="surname" required><br>

      <label for="email">Email *: </label>
      <input type="text" name="email" value="email" required><br>

      <!-- do discipline field as a drop down menu. -->
      <label for="discipline">Discipline *: </label>
      <select id="discipline" name="discipline">
        <option value="computing">Computing</option>
        <option value="biomechanical engineering">Biomechanical Engineering</option>
        <option value="electronic engineering">Electronic Engineering</option>
        <option value="mechanical engineering">Mechanical Engineering</option>
        <option value="civil engineering">Civil Engineering</option>
        <option value="mathematics">Mathematics</option>
        <option value="other"></option>
        <!-- could have a text box which lets them specify the area (if possible), but only appears if they have selected other?-->
      </select><br>

      <!-- do project type field as a drop down menu -->
      <label for="projtype">Project Type *: </label>
      <select id="projtype" name="projtype">
        <option value="research">Research</option>
        <option value="teaching">teaching</option>
        <option value="other">Other</option>
      </select><br>

      <label for="accountno">Account To Be Charged *: </label>
      <input type="text" name="accountno" value="account no., I.E 12345.." required><br>

      <label for="accounthold">Account Holder *: </label>
      <input type="text" name="accounthold" value="" required><br>

      <!-- do text area for nature of request -->
      <label for="NatureOfReq">Nature of Request *: </label>
      <textarea type="text" name="NatureOfReq" rows="5" cols="40" value="" required></textarea><br>

      <!-- need to figure how to upload a file in html. Transferring that in to an sql request shouln't be too bad apart from
      maybe getting an memory overflow error or something like that -->
      <label for="AttachedFiles">Attach Files: </label>
      <input type="file" name="AttachedFiles" value="" accept=".zip"><br>

      <!-- for this will need to obtain list of materials from db and loop through them from query result into each 
      option in the drop down -->
        <?php
        require_once 'Includes/db.inc.php';

        $sql = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sql, "SELECT MaterialName FROM MATERIALS;");

        mysqli_stmt_execute($sql);
        $stmtResult = mysqli_stmt_get_result($sql);

        echo "<label for='materials'>Materials - select an item of material that you think is necessary to fulfill your request: </label>";
        echo "<select id='materials' name='materials'>";
        echo "<option value=''></option>";

        while ($row = mysqli_fetch_array($stmtResult)) {
          echo "<option value='" . $row['MaterialName'] . "'>" . $row['MaterialName'] . "</option>";
        }
        echo "</select><br>";

        ?>
      <!-- once a piece of material is selected, a separate text box must be displayed (only if an item is added)
      and with correct units (won't need this for equipment list) -->

      <!-- for this will need to obtain list of equipment from db and loop through them from query result into each 
      option in the drop down -->
      <?php
        require_once 'Includes/db.inc.php';

        $sql = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sql, "SELECT EquipmentName FROM EQUIPMENT;");

        mysqli_stmt_execute($sql);
        $stmtResult = mysqli_stmt_get_result($sql);

        echo "<label for='equipment'>Equipment - select a piece of equipment that you think is necessary to fulfill your request: </label>";
        echo "<select id='equipment' name='equipment'>";
        echo "<option value=''></option>";

        while ($row = mysqli_fetch_array($stmtResult)) {
          echo "<option value='" . $row['EquipmentName'] . "'>" . $row['EquipmentName'] . "</option>";
        }
        echo "</select><br>";
        
      ?>

      <button type="submit" name="submit" formaction="staffRequestFormHandle.php">Submit</button>
    </form>
  </div>
</div>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong, try again!</p>";
    }
}
?>

</body>

</html>