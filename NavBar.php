
<!DOCTYPE html>
<html>
<head>
<title>Shoes Table</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/validation.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Shoe Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <?php 
          session_start();
          if(isset($_SESSION) && isset($_SESSION['id'])){
            echo '<li class="nav-item">';
            echo '<a class="nav-link active" aria-current="page" href="NewShoe.php">New Shoe</a>';
            echo '</li>';
            echo '<li class="nav-item">';
            echo '<a class="nav-link active" aria-current="page" href="BrandList.php">Publisher List</a>';
            echo '</li>';
            if($_SESSION['role'] == 'admin'){
              echo '<li class="nav-item">';
              echo '<a class="nav-link active" aria-current="page" href="UserList.php">User List</a>';
              echo '</li>';
            }
          }
        ?>
        
      </ul>
      <form class="d-flex">
        <?php 
         //when you are login you see logout botton
          if(isset($_SESSION) && isset($_SESSION['id'])){
            echo  "<a class='btn disabled btn' href='#'>".$_SESSION['username']."</a>";
            echo "<a class='btn btn-danger' href='LogOut.php'>Log Out</a>";
          }
          else{
              // if uou not login you see login and sign bottons
            echo "<a class='btn btn-primary' href='LogIn.php'>Log In</a>";
            echo "<a class='btn btn-success' href='SignIn.php'>Sign In</a>";
            session_destroy();
          }
        ?>  
      </form>
    </div>
  </div>
</nav>

