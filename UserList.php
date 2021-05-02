<?php 

include 'library/DBConnection.php';
include 'NavBar.php';

if($_SESSION['role'] != 'admin'){     
    header('Location: index.php');
}


$sql = "SELECT * FROM user";

$result =  $conn->query($sql);


?>

<div class="container">
    <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    <tr>
                </thead>
                <tbody>
                <?php 
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo "<tr>";
                            echo "<th scope='row'>".$row['id']."</th>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['role']."</td>";
                            echo "<td><a class='btn btn-danger' href='DeleteBook.php?id=".$row['id']."' role='delete'>Delete</a></td>";
                            echo "</tr>";
                        } 
                    }
                ?>
                </tbody>
            </table>


</div>

