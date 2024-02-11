<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "pet_adoption";

    $conn = mysqli_connect($host, $user, $pass, $dbName);

    if(!$conn){
        echo "oh no!";
    }

?>