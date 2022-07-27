<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['usermail'])){

    header('location:login_form.php');
}

?>

<!doctype html>
<html>
    <head>

    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h3>welcome</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    A consequuntur iure perspiciatis, facere repudiandae eveniet eaque ut soluta exercitationem, reiciendis quidem,
                     voluptas vero incidunt maiores. Obcaecati sint assumenda ad ullam.</p>
                     <p>your email: <span><?php echo $_SESSION['usermail'];  ?></span></p>
                     <a href="logout.php" class="logout">logout</a>
            </div>
        </div>
    </body>
</html>