<?php
include 'library/DBConnection.php';


if(empty($_GET['searchInput'])){
    $sql = "SELECT * FROM shoe";
} else {

    $searchInput = filter_input(INPUT_GET, 'searchInput',  FILTER_SANITIZE_STRING);
    $searchType  = filter_input(INPUT_GET, 'searchType',  FILTER_SANITIZE_STRING);

    if( $searchType == 'type' ||
        $searchType == 'size' ||
        $searchType == 'brand' ||
        $searchType == 'price'){

        $sql = "SELECT * FROM shoe WHERE $searchType LIKE '%$searchInput%'";
    } else {
        echo 'Search Type doesn\'t exist!';
        $sql = "SELECT * FROM shoe";
    }
}


$result = $conn->query($sql);

include 'NavBar.php';


?>
<div class="container">

    <h1>Shoe Store </h1>
    <form action='' method="GET">
        <div class="row ">
            <div class="col-5">
                <div class="input-group mb-3">


                    <select class="form-select" id="inputGroupSelect04" name="searchType" aria-label="Example select with button addon">
                        <option selected>Choose...</option>
                        <option value="type">Type</option>
                        <option value="size">Size</option>
                        <option value="brand">Brand</option>
                        <option value="price">Price</option>
                    </select>
                    <input class="form-control" type="text" name="searchInput">
                    <button class="btn btn-outline-secondary" type="submit" id="submit">Search</button>
                </div>
            </div>
        </div>


    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Size</th>
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Published Date</th>
            <?php
            if(isset($_SESSION) && isset($_SESSION['id'])) {
                echo '<th scope="col"><a class="btn btn-success" href="NewShoe.php" role="new">New</a></th>';
            }
            ?>

        <tr>
        </thead>
        <tbody>
        <?php
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<tr>";
                echo "<th scope='row'>".$row['id']."</th>";
                echo "<td>".$row['type']."</td>";
                echo "<td>".$row['size']."</td>";
                echo "<td>".$row['brand']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['published_date']."</td>";
                if(isset($_SESSION) && isset($_SESSION['id'])) {
                    echo "<td><a class='btn btn-primary' href='UpdateShoe.php?id=".$row['id']."' role='update'>Update</a></td>";
                    echo "<td><a class='btn btn-danger' href='DeleteShoe.php?id=".$row['id']."' role='delete'>Delete</a></td>";
                }
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>