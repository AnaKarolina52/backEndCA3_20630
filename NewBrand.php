
<?php 

include 'NavBar.php';
    
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert publisher</h1>
        <form action="InsertBrand.php" class="needs-validation" novalidate method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Publisher Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?php if(isset($name)){ echo $name;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger">
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= (isset($address)) ? $address : NULL ?>" aria-describedby="authorHelp">
                <span class="text-danger"><?= isset($error['address']) ? $error['address'] : '' ?> </span>
           </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>