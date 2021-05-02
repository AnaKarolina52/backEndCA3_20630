<?php 
//restrict the page to logged in users
include 'NavBar.php';
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
//get the brands
include 'library/DBConnection.php';
$sql = "SELECT * FROM brand";
$result = $conn->query($sql);



?>
    <div class="container">
    
    <h1>Brand List </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <?php 
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                        echo '<th scope="col"><a class="btn btn-success" href="NewBrand.php" role="new">New</a></th>';
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
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                            echo "<td><a class='btn btn-primary' href='UpdateBrand.php?id=".$row['id']."' role='update'>Update</a></td>";
                            echo "<td><a class='btn btn-danger' href='
                            0.
                            .php?id=".$row['id']."' role='delete'>Delete</a></td>";
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
