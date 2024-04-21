<?php
    // OPEN the connection to a MySQL server
	$conn = mysqli_connect("localhost", "root","","blog");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    };

    // Do The opration
    $query="SELECT * FROM `users`";
    $result=mysqli_query($conn,$query);
    // Check for errors
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    while ($row =mysqli_fetch_assoc($result)) {    
        echo "Id: ".$row['id']."<br />";
        echo "Name: ".$row['name']."<br />";
        echo "Email: ".$row['email']."<br />";
        echo "Password: ".$row['password']."<br />";
        echo str_repeat("-",50)."<br />";
    };

?>