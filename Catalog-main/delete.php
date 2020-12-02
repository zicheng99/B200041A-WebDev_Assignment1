<?php
    require_once("dbCon.php");

    if((isset($_POST["isbn"]))&&(isset($_POST["btnDelete"]))){
        $isbn=$_POST["isbn"];
        $sql = "DELETE FROM catalogs WHERE isbn = '$isbn'";
        $result=$conn->query($sql);
        if(!$result){
            echo "Delete was failed.";
        }else{
            echo $isbn." has been removed successfully.";
        }
        echo "<br><a href='index.php'>Back to Main Page</a>";
    }
?>