<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    // TODO 2: Check and filter data coming from the user.
        if((isset($_POST["searchtype"]))&&(isset($_POST["searchterm"]))){
            $searchtype=$_POST["searchtype"];
            $searchterm=$_POST["searchterm"];
            
        // TODO 3: Setup a connection to the appropriate database.
            require_once("dbCon.php");

        // TODO 4: Query the database.
        $query = "SELECT * FROM catalogs WHERE $searchtype LIKE '%$searchterm%'";
        $result = $conn->query($query);

        if(!$result){
            echo "Fail to retreive the data! <a href='index.php'>Back to Main Page</a>";
            return;
        }
        $no_rows = $result->num_rows;

        if($no_rows==0){
            echo "No records was found.<br><a href='index.php'>Back to Main Page</a>";
            return;
        }

        // TODO 5: Retrieve the results.
        // TODO 6: Display the results back to user.

        echo "<table>
        <tr>
          <th>ISBN</th>
          <th>Author</th>
          <th>Title</th>
          <th>Price</th>
          <th>Operation</th>
          <th></th>
        </tr>";

        foreach ($result as $row):

            $r1=htmlspecialchars($row['isbn']);
            $r2=htmlspecialchars($row['author']);
            $r3=htmlspecialchars($row['title']);
            $r4=htmlspecialchars($row['price']);

            echo '<tr><td>' .$row['isbn']. '</td>';
            echo '<td>' .$row['author']. '</td>';
            echo '<td>' .$row['title']. '</td>';
            echo '<td>' .$row['price']. '</td>';

            echo "<td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='isbn' value='$r1'>
                            <input type='submit' name='btnDelete' value='DELETE RECORD'>
                  </td>
                  </form>
                 </tr>";

        endforeach;
          echo "</table>";
          echo "<a href='index.php'>Back to Main Page</a>";

        // TODO 7: Disconnecting from the database.
            $conn->close();
        } // End outermost if



    ?>
</body>
</html>