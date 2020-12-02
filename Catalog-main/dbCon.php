<?php
    $hn="localhost";
    $db='publications';
    $un="root";
    $pw="";

    $conn= new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal ERROR");
        echo("Connection Error!");
    }
?>