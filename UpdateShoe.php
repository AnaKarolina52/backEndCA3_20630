<?php
include 'library/DBConnection.php';


$sql = "SELECT * FROM shoe WHERE id=".$_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: index.php");
}

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
<title>Update Shoe</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'NavBar.php' ?>
    <?php 

        if(!isset($_SESSION['id'])) {
            header("Location: index.php");
        }
    ?>
    <div class="container">
        
        <h1>Update Shoe</h1>
        <form action="EditShoe.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="type" class="form-label">Shoe Type</label>
                <input type="text" class="form-control" id="type" name="type" aria-describedby="typeHelp" value="<?= $row['type'] ?>">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" aria-describedby="sizeHelp" value="<?= $row['size']?>">
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" aria-describedby="brandHelp" value="<?=$row['brand'] ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" aria-describedby="priceHelp" value="<?= $row['price']?>">
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                <input type="text" class="form-control" id="published_date" name="published_date" aria-describedby="published_dateHelp" value="<?= $row['published_date']?>">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>