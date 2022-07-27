<?php

@include 'config.php';
session_start();
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * from user_form WHERE email = '$email' && password = '$pass'";
    
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        $error[]= 'user already exist';
    }else{
        if($pass !=$cpass){
            $error[]='password not matched';
        }else{
            $insert = "INSERT INTO user_form(email, password) VALUES ('$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
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
            <h2>Register Now</h2>
       <?php
       if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }
       }
       
       ?>
            <input type="email" name="usermail" placeholder="enter your mail" class="box" required>

            <input type="password" name="password" placeholder="enter your password" class="box" required>

            <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>

            <input type="submit" value="Register Now " name="submit" class="form-btn">
            <p>Already Have An Account <a href="login_form.php">Login Now</a></p>

        </form>
       </div>
    </body>
</html>