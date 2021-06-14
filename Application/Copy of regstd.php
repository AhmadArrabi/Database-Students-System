<!DOCTYPE html>

<html>
<head>
  <title>PSUT | Registered Students</title>
  <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
  <h1>Registered Students</h1>

  <ul id="navig">
    <li class="navitem"><a class="navlink" href="home.php">Home</a></li>
    <li class="navitem"><a class="navlink" href="register.php">Register New Student</a></li>
    <li class="navitem"><a class="navlink" href="stdinfo.php">Student Information</a></li>
    <li style="background-color: #0e0e47" class="navitem"><a class="navlink" href="regstd.php">Registered Students</a></li>
  </ul>
  <br />

  <?php
    $con=(odbc_connect("regdb","",""));
    /*if($con) //check connection
    {
      echo "Connected<br>";
    }
    else {
      echo "Failed";
    }*/

    $sql="SELECT fName, lName, stdID FROM Student ORDER BY fName";
    $result=odbc_exec($con, $sql);

    echo "<table id='infotable'> <tr> <th>Name</th> <th>ID</th> </tr>";
    while($row=odbc_fetch_array($result)){

      echo "<tr><td>". $row['fName'];
      echo " ". $row['lName'];
      echo "</td>";
      echo "<td>". $row['stdID'];
      echo "</td></tr>";
      echo "<br />";
    }
    echo "</table>";
    
  ?>

</body>
</html>
