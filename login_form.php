<?php

@include 'config.php';
session_start();
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = md5($_POST['password']);

    $select = " SELECT * from user_form WHERE email = '$email' && password = '$pass'";
    
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['usermail']=$email;
        header('location:header.php');
    }else{
       $error[]='incorrect email or password';
    }
}
?>
<!doctype html>
<html>
    <head>

    <link rel="stylesheet" href="style1.css">
    </head>
    <body>
       <div class="form-container">
        <form action="" method="post">
            <h2>Login Now</h2>
            <?php
       if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }
       }
       
       ?>
            <p>Email</p>
            <input type="email" name="usermail" placeholder="enter your mail" class="box" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="enter your password" class="box" required>

            <input type="submit" value="login now " name="submit" class="form-btn">
            <p>Don't Have An Account <a href="register_form.php">Register Now</a></p>

        </form>
       </div>
    </body>
</html>