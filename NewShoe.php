
<?php 

include 'NavBar.php';
include 'library/DBConnection.php'; 

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert book</h1>
        <form action="InsertShoe.php" class="needs-validatio" id="bookForm" method="POST">
            <div class="mb-3">
                <label for="type" class="form-label">Shoe Type</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?php if(isset($type)){ echo $type;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger" id='typeError'>
                    <?= isset($error['type']) ? $error['type'] : ''?>
                </span>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" value="<?= (isset($size)) ? $size : NULL ?>" aria-describedby="sizeHelp">
                <span class="text-danger" id='sizeError'><?= isset($error['size']) ? $error['size'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select" aria-label="brand" name="publisher" id="brand">
                    <?php

                        $sql = "SELECT name FROM brand";
                    //$result = $conn->query($sql);
                    if (isset($conn)) {
                        $result = $conn->query($sql);
                    }
                        while($row=$result->fetch_assoc()){
                            echo "<option value='".$row['name']."'>".$row['name']."</option>";
                        }


                    ?>


                </select>

                <span class="text-danger"><?= isset($error['brand']) ? $error['brand'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= (isset($price))? $price : NULL ?>" aria-describedby="priceHelp">
                <span class="text-danger" id="priceError"><?= isset($error['price']) ? $error['price'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">published date</label>
                <input type="text" class="form-control" id="published_date" name="published_date" value="<?= (isset($published_date))? $published_date : NULL ?>" aria-describedby="published_dateHelp">
                <span class="text-danger" id="publishedError"><?= isset($error['published_date']) ? $error['published_date'] : '' ?> </span>
           </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>
<script>


</script>