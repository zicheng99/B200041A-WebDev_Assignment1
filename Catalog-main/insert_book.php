<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.
    // TODO 2: Check and filter data coming from the user.

    if((isset($_POST["isbn"]))&&(isset($_POST["author"]))&&(isset($_POST["title"]))&&(isset($_POST["price"]))){
        $isbn=htmlspecialchars($_POST["isbn"]);
        $author=htmlspecialchars($_POST["author"]);
        $title=htmlspecialchars($_POST["title"]);
        $price=htmlspecialchars($_POST["price"]);

    // TODO 3: Setup a connection to the appropriate database.
        require_once "dbCon.php";

    // TODO 4: Query the database.
        $query = "INSERT INTO catalogs (isbn, author, title, price) 
                    VALUES ('$isbn','$author','$title','$price')";
        $result=$conn->query($query);

    // TODO 5: Display the feedback back to user.
        if(!$result){
            echo "Inserting book was falied.";
        }else{
            echo $isbn." has been inserted successfully";
        } // End else
        echo "<br><a href='index.php'>Back to Main Page</a>";

    // TODO 6: Disconnecting from the database.
        $conn->close();
    } // End if

    ?>
</body>
</html>