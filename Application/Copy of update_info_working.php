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

    <table id="regtable">
      <tr>
        <td>Student ID:</td>
        <td><input type="number" class="txtinupdate" name="id"></td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><input type='text' name='address' class='txtinupdate'></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type='text' name='email' class='txtinupdate'></td>
      </tr>
      <tr>
      <td>Phone Number:</td><td><input type='text' name='phone' class='txtinupdate'></td></tr>
    </table>

      <input type='submit' id='search' name='save' value='Save'>
    </table>


  </form>
  </div>
    <?php

    if(isset($_POST['save']))
    {
      echo "<br>";
      $id = $_POST['id'];
      $address = $_POST['address'];
      $email  = $_POST['email'];
      $phone  = $_POST['phone'];
      $con=(odbc_connect("regdb","",""));
      $sql="UPDATE Student SET Address='$address', Email='$email', Phone='$phone' where stdID=$id";
      $result=odbc_exec($con, $sql);
    }

    ?>

</body>
</html>
