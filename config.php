<?php
    #Instructiuni pentru conectarea la baza de date
    ob_start();

    session_start();

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "cff";

    $connection = mysqli_connect($host, $user, $password, $dbname) or die("Conexiune esuata!");
?>