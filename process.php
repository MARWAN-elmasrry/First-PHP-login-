<?php
    // echo $_POST['name'];
    // echo '<br />';
    // echo $_POST['email'];
    $error_fields=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
                // Validation 
    if (! (isset($_POST['name']) && !empty($_POST['name']))){
        $error_fields[]="name";
    }
    if (! (isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) )) {
        $error_fields[]="email";
    }
    if (! (isset($_POST['password']) && strlen($_POST['name']) > 5 )){
        $error_fields[]="password";
    }
    if ($error_fields){
        header("location:hallo.php?error_fields".implode(",",$error_fields));
        exit;
    }

    // OPEN the connection to a MySQL server
	$conn = mysqli_connect("localhost", "root","","blog");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    };

    // // Do The opration
    $name=mysqli_escape_string($conn,$_POST['name']);
    $email=mysqli_escape_string($conn,$_POST['email']);
    $password=sha1($_POST['password']);
    $admin=$_POST["admin"] ? 1 : 0 ;

    
    // Insert data into database
    $query="INSERT INTO `users` (`name` , `email`, `password`,`admin`) VALUES ('".$name."','".$email."','".$password."','".$admin."') ";
    if (mysqli_query($conn,$query)){
        header( "Location: list.php" );
    }
    else{
        echo $query;
        echo mysqli_error($conn);
    }
    }

?>