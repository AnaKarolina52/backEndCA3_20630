<?php
//connect to the database
include 'library/DBConnection.php';
$error = [];

$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address',  FILTER_SANITIZE_STRING);


if(!isset($name) || empty($name)){
        $error['name'] = 'Brand name is required';
}
if(!isset($address) || empty($address)){
        $error['address'] = 'Address is required';
}

if(empty($error)){
    //set up the sql string with prepared statements
    $sql = "UPDATE brand 
            SET name=?, 
                address=? 
            WHERE id=?";


    $stmt = $conn->prepare($sql);

    //the variables are at your own choice, 
    //they do not require to be the exact same as the columns in the database
    $stmt->bind_param("ssi", $name, $address, $id);

    //set up the variables
    $id = $_POST["id"];
    $address = $_POST["address"];
    $name = $_POST["name"];

    //execute the statement
    $stmt->execute();
    //close the connection
    $conn->close();
    //redirect back to Pub list page
    header("Location: BrandList.php");
} else {
    require_once('NewBrand.php');
}



?>