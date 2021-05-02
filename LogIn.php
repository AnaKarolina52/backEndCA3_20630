<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'NavBar.php' ?>
    <div class="container">
        
        <h1>Log In</h1>
        <form action="SignUp.php" class="needs-validation" novalidate method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input  type="text" 
                        class="form-control" 
                        id="username" 
                        name="username"
                        autocomplete="off" 
                        aria-describedby="usernameHelp" 
                        value="<?= isset($username)? $username: NULL ?>" > 
                <span class="text-danger"><?= isset($error['username']) ? $error['username'] : '' ?> </span>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input  type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        autocomplete="off"
                        aria-describedby="passwordHelp" 
                        value= "" > 
                <span class="text-danger"><?= isset($error['password']) ? $error['password'] : '' ?> </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>