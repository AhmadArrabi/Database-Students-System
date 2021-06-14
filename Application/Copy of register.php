<!DOCTYPE html>

<html>
<head>
  <title>PSUT | Register New Student</title>
  <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
  <h1>Register New Student</h1>

  <ul id="navig">
    <li class="navitem"><a class="navlink" href="home.php">Home</a></li>
    <li style="background-color: #0e0e47" class="navitem"><a class="navlink" href="register.php">Register New Student</a></li>
    <li class="navitem"><a class="navlink" href="stdinfo.php">Student Information</a></li>
    <li class="navitem"><a class="navlink" href="regstd.php">Registered Students</a></li>
  </ul>
  <br />

  <form action="" method="POST">
    <table id="regtable">

      <tr>
        <th>First Name:</th><td><input type="text" class="txtin" name="fname"></td>
        <th>Middle Name:</th><td><input type="text" class="txtin" name="mname"></td>
        <th>Last Name:</th><td><input type="text" class="txtin" name="lname"></td>
      </tr>
      <tr>
        <th>Gender:</th>
        <td>
          <select name="gender" id="regselect">
            <option value="">--Select Gender--</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
        </td>
        <th>Date of Birth:</th><td><input type="text" class="txtin" name="dob"></td>
        <th>Country of Birth:</th><td><input type="text" class="txtin" name="birthCountry"></td>
      </tr>

      <tr>
        <th>Address:</th><td><input type="text" class="txtin" name="address"></td>
        <th>Phone Number:</th><td><input type="text" class="txtin" name="phone"></td>
        <th>Email:</th><td><input type="text" class="txtin" name="email"></td>
      </tr>

      <tr>
        <th>School:</th><td><input type="text" class="txtin" name="school"></td>
        <th>Country of Certificate:</th><td><input type="text" class="txtin" name="schoolCountry"></td>
        <th>School Average:</th><td><input type="text" class="txtin" name="schoolAvg"></td>
      </tr>

      <tr>
        <th>School Stream:</th><td><input type="text" class="txtin" name="schoolStream"></td>
        <th>Registration Date:</th><td><input type="date" class="txtin" name="regDate"></td>
        <th>Admission Semester:</th><td><input type="text" class="txtin" name="admSemester"></td>
      </tr>

      <tr>
        <th>Department:</th>
        <td>
          <select name="deptName" id="regselect">
            <option value="">--Select Department--</option>
            <?php
              $con=(odbc_connect("regdb","",""));
              $sql="SELECT * FROM Department";
              $result=odbc_exec($con, $sql);
              while($row = odbc_fetch_array($result))
              {
                echo "<option value='".$row['deptName']."'>". $row['deptName']. "</option>";
              }
            ?>
        </td>
      </tr>

      <tr>
        <td></td>
        <td><input type="submit" id="search" name="subbtn" value="Register"></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="reset" id="search" value="Clear"></td>
      </tr>

    </table>
  </form>

  <center><p>Please fill all fields.</p></center>

  <?php
    set_error_handler("errhandle");

    function errhandle($errno, $errstr) {
      echo "<script> alert('Please fill all fields'); </script>";
    }

    if(isset($_POST['subbtn']))
    {
      //echo "<br><center>Search Result</center>";
      echo "<br>";

      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $birthCountry = $_POST['birthCountry'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $school = $_POST['school'];
      $schoolCountry = $_POST['schoolCountry'];
      $schoolAvg = $_POST['schoolAvg'];
      $schoolStream = $_POST['schoolStream'];
      $regDate = $_POST['regDate'];
      $admSemester = $_POST['admSemester'];
      $deptName = $_POST['deptName'];

      $con=(odbc_connect("regdb","",""));
      $sql="INSERT INTO Student (fName, mName, lName, gender, DoB, birthCountry, address, phone, email, school, schoolCountry, schoolAvg, schoolStream, regDate, admSemester, deptName) VALUES ('$fname', '$mname', '$lname', '$gender', '$dob', '$birthCountry', '$address', '$phone', '$email', '$school', '$schoolCountry', '$schoolAvg', '$schoolStream', '$regDate', '$admSemester', '$deptName')";
      $result=odbc_exec($con, $sql);

      if($result){ echo "<script> alert('Registration successful'); </script>"; }
      else { echo "<script> alert('Registration failed') </script>"; }
    }

   ?>

</body>
</html>
