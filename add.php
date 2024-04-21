<html>
    <body>
        <?php
        $errors_arr=array();
        if(isset($_GET['error_fields'])){
            $errors_arr=explode(",", $_GET['error_fields']);
        }
        ?>
        <form method="post" action="process.php">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            </br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            </br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            </br>
            <input type="checkbox" name="admin" id="admin" <?=(isset($_POST['admin'])) ? 'checked':'' ?>/>Admin
            <input type="submit" name="submit" value="Add User">
        </form>
    </body>
</html>