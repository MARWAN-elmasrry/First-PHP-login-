<?php
// we wil store the signed user in data 
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $conn=mysqli_connect('localhost','root','','blog');
        if(! $conn){
            echo mysqli_connect_error();
            exit;
        }

        // escape any special characters to avid sql injection
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=sha1($_POST['password']);

        // 
        // 
        // 
        // 

        // Select 
        $query= "SELECT * FROM `users` WHERE `email`='".$email."' and `password`='".$password."' LIMIT 1";
        $result=mysqli_query($conn,$query);
        if($row=mysqli_fetch_assoc($result)){
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            header('location: list.php');
            exit;
        }else{
            $error= 'Invalid email or password';
        }
        // Close connection
        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>

<html>
    <head>
        <title>login</title>
    </head>
    <body>
        <?php if(isset($error)) echo $error; ?>
        <form method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] :'' ?>" /><br />
            <label for="password">Password</label><br />
            <input type="password" name="password" id="password"  /><br />
            <input type="submit" name="submit" value="Login" />
        </form>
    </body>
</html>