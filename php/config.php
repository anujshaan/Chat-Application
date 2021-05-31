<?php
 $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chat-app";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if(!$conn)
    {
        echo"database isn't connected " . mysqli_connect_error();
    }
?>