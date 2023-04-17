<?php

#$servername = "localhost";
#$username = "aro_97";
#$password = "1234";
#$dbname = "formdb";
#$con = mysqli_connect($servername, $username, $password, $dbname) or die ("unable to connect to host");

$con = mysqli_connect('localhost', 'root', '', 'formdb')or die ("unable to connect to host");

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  




$sql =  "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
#$c = mysqli_num_rows($rs);
if (mysqli_num_rows($rs) === 1) {

    $row = mysqli_fetch_assoc($rs);

    echo "<h1><center> Login successful </center></h1>";  

    
    $sql = "SELECT firstname, lastname, email, message FROM contact" ;
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
          echo " - Name: " . $row["firstname"]. " " . $row["lastname"]. $row["email"]. " " .$row["message"] . "<br>";
        }
      } else {
        echo "0 results";
      }

}  
else{  
    echo "<h1> Login failed. Invalid username or password.</h1>";  
}  



?>