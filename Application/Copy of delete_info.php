<!DOCTYPE html>

<html>
<head>
  <title>PSUT | Student Information</title>
  <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
  <h1>Delete Student Information</h1>

  <ul id="navig">
    <li class="navitem"><a class="navlink" href="home.php">Home</a></li>
    <li class="navitem"><a class="navlink" href="register.php">Register New Student</a></li>
    <li style="background-color: #0e0e47" class="navitem"><a class="navlink" href="stdinfo.php">Student Information</a></li>
    <li class="navitem"><a class="navlink" href="regstd.php">Registered Students</a></li>
  </ul>
  <br />

  <div id="searchfield">
  <form action="" method="POST">

      <label>Student ID: </label>
      <input type="number" id="sfield" name="id">
      <input type="submit" id="delete" name="delete" value="Delete">
  </form>
  </div>
    <?php
    if(isset($_POST['delete']))
    {
      //echo "<br><center>Search Result</center>";
      echo "<br>";
      $id = $_POST['id'];
      $con=(odbc_connect("regdb","",""));
      $sql="DELETE FROM Student where stdID=$id";
      $result=odbc_exec($con, $sql);
      if($result)

        echo "Student information has been deleted successfully.";
      else {
        echo "Student not found.";
      }
    }

    ?>

</body>
</html>
