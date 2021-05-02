<?php

include 'library/DBConnection.php';

$error=[];

// https://www.php.net/manual/en/function.filter-input.php
// https://www.php.net/manual/en/filter.filters.php

//sanitizing is removing anything not adhering to the filter
//filter_input (TYPE OF INPUT, INPUT NAME , FILTER NAME/TYPE - see on PHP.net)
$type = filter_input(INPUT_POST, 'type',  FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size',  FILTER_SANITIZE_NUMBER_FLOAT);
$brand = filter_input(INPUT_POST, 'brand',  FILTER_SANITIZE_STRING);
$price= filter_input(INPUT_POST, 'price',  FILTER_SANITIZE_NUMBER_FLOAT);
$published_date = filter_input(INPUT_POST, 'published_date',  FILTER_SANITIZE_URL);

//make input required
//checks to see if the $type is set (should be) or if it is empty
//if it is initialize the error array with a message
if(!isset($type) || empty($type)){
        $error['type'] = 'Shoe type is required';
}
if(!isset($size) || empty($size)){
        $error['size'] = 'Size type is required';
}
if(!isset($brand) || empty($brand)){
        $error['brand'] = 'Brand type is required';
}
if(!isset($price) || empty($price) ){
        $error['price'] = 'Price is required';
}
if(!isset($published_date) || empty($published_date)){
        $error['published_date'] = 'Published date is required';
}

//make sure the brand exists before submitting it to the database
$sql = "SELECT name FROM brand";
//$result = $conn->query($sql);
if (isset($conn)) {
    $result = $conn->query($sql);
}

$publisher_exists=false;
while($row= $result->fetch_assoc()){
        if($brand === $row['name']){
                $publisher_exists=true;
        }
}
if($publisher_exists==false){
        $error['brand'] = 'Brand doesn\'t exist';
}

//if there are no errors and error array is empty
//send to database
if(empty($error)){
        //prepare and bind
        //everything has to be the exact same as it is in the database
        $sql = "INSERT INTO shoe (type, size, brand, price, published_date) 
        VALUES (?,?,?,?,?)";

        //prepared statement
        $stmt = $conn->prepare($sql);

        //the variables are at your own choice, 
        //they do not require to be the exact same as the columns in the database
        $stmt->bind_param("sssss", $type, $size, $brand, $price, $published_date);

        //send to database
        $stmt->execute();
        $conn->close();

        header("Location: index.php");
}else{ 
        //if there are errors draw the NewShoe.php page
        //drawing the page rather than redirecting will let us
        //acces the $error array and all the variables set at the
        //top of the page
        require_once('NewShoe.php');
}
?>