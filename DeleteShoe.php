<?php

session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

include 'library/DBConnection.php';



// sql to delete a record
$sql = "DELETE FROM shoe WHERE id=?";

$stmt=$conn->prepare($sql);

$stmt->bind_param("i", $id);

$id = $_GET['id'];

$stmt->execute();
$conn->close();


header("Location: index.php");
 



?>