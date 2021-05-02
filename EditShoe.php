<?php
//connect to the database
include 'library/DBConnection.php';

//set up the sql string with prepared statements
$sql = "UPDATE shoe 
        SET type=?, 
            size=?, 
            brand=?, 
            price=?, 
            published_date=?
        WHERE id=?";


$stmt = $conn->prepare($sql);

//the variables are at your own choice, 
//they do not require to be the exact same as the columns in the database
$stmt->bind_param("sssssi", $type,
$size, $brand, $price,
$published_date, $id);

//set up the variables
$id = $_POST["id"];
$type = $_POST["type"];
$size = $_POST["size"];
$brand = $_POST["brand"];
$price = $_POST["price"];
$published_date = $_POST["published_date"];

//execute the statement
$stmt->execute();
//close the connection
$conn->close();
//redirect back to index page
header("Location: index.php");


?>