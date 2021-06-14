<!DOCTYPE html>

<html>
<head>
  <title>PSUT | Student Information</title>
  <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
  <h1>Update Student Information</h1>

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
      <input type="submit" id="search" name="search" value="Search">
  </form>
  </div>
    <?php


    if(isset($_POST['search']))
    {

      //echo "<br><center>Search Result</center>";
      echo "<br>";
      $id = $_POST['id'];
      $con=(odbc_connect("regdb","",""));
      $sql="SELECT * FROM Student where stdID=$id";
      $result=odbc_exec($con, $sql);


      while($row = odbc_fetch_array($result))
      {
        echo "<form action='' method='post'>";
        
        echo"<input type='submit' id='search' name='save' value='Save'>";

        echo "<table id='infotable'> <caption>Personal Information</caption> <tr><th>Name</th>";
        echo "<td>". $row['fName']. " ". $row['mName']. " "  .$row['lName']. "</td></tr>";
        echo "<tr><th>Address</th><td><input type='text' name='address' class='txtinupdate'". "value=\"". $row['Address']. "\"></td></tr>";
        echo "<tr><th>Email</th><td><input type='text' name='email' class='txtinupdate'". "value=\"". $row['Email']. "\"></td></tr>";
        echo "<tr><th>Phone Number</th><td><input type='text' name='phone' class='txtinupdate'". "value=\"". $row['Phone']. "\"></td></tr>";
        echo "<tr><th>Date of Birth</th>";
        echo "<td>". $row['DoB']. "</td></tr>";
        echo "<tr><th>Country of Birth</th><td>". $row['birthCountry']. "</td></tr>";
        echo "</table>";
        echo "<br />";

        echo "<table id='infotable'> <caption>Academic Information</caption>";
        echo "<tr><th>ID</th><td>". $row['stdID']. "</td></tr>";
        echo "<tr><th>Department</th><td>". $row['deptName']. "</td></tr>";
        echo "<tr><th>Registration Date</th><td>". $row['regDate']. "</td></tr>";
        echo "<tr><th>Admission Semester</th><td>". $row['admSemester']. "</td></tr>";
        echo "<tr><th>Supervisor</th><td>". $row['svName']. "</td></tr>";
        echo "</table>";
        echo "<br />";

        echo "<table id='infotable'> <caption>Secondary School Information</caption>";
        echo "<tr><th>School Stream</th><td>". $row['schoolStream']. "</td></tr>";
        echo "<tr><th>Certificate Country</th><td>". $row['schoolCountry']. "</td></tr>";
        echo "<tr><th>School Average</th><td>". $row['schoolAvg']. "</td></tr>";
        echo "<tr><th>School</th><td>". $row['school']. "</td></tr>";
        echo "</table>";
        echo "</form>";
        echo "<br />";

        if(isset($_POST['save']))
        {
          echo "<br>";
          $address = $_POST['address'];
          $email  = $_POST['email'];
          $phone  = $_POST['phone'];
          $conn=(odbc_connect("regdb","",""));
          $query="UPDATE Student SET Address='$address', Email='$email', Phone='$phone' where stdID=$id";
          $result=odbc_exec($conn, $query);
        }

      }



    }


    ?>

</body>
</html>
