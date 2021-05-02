<?php
include 'library/DBConnection.php';


$sql = "SELECT * FROM publisher WHERE id=" . $_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: BrandList.php");
}

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
<title>Update Publisher</title>
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
        
        <h1>Update publisher</h1>
        <form action="EditBrand.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Publisher Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $row['name'] ?>">
                <span class="text-danger">
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" value="<?= $row['address']?>">
                <span class="text-danger">
                    <?= isset($error['address']) ? $error['address'] : ''?> 
                </span>
            </div>
            
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>