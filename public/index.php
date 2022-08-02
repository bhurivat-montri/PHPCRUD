<!-- localhost/PHP-CRUD/public/index.php -->
<?php 
    session_start();
    if (isset($_SESSION['admin_login'])) {
        $email_login = $_SESSION['admin_login'];
    } else if (isset($_SESSION['user_login']) ) {
        $email_login = $_SESSION['user_login'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>PHP-CRUD(Index)</title>
</head>
<body>

    <?php include(__DIR__.'/assets/header/header.php'); ?>

    <main role="main">
        <div class="container">
            <h2 class="text-center my-5">Index Page</h2>
            <hr>
            <?php if (isset($_SESSION['admin_login'])) : ?>
                <span><?php echo "admin=".$email_login."<br>"?></span>
                <a href="./admin/admin_home.php" class="btn btn-info">Infomation</a>
                <a href="./api/logout_db.php" class="btn btn-danger">Logout</a>
            <?php elseif (isset($_SESSION['user_login'])) :?>
                <span><?php echo "user=".$email_login."<br>"?></span>
                <a href="./user/user_home.php" class="btn btn-info">Infomation</a>
                <a href="./api/logout_db.php" class="btn btn-danger">Logout</a>
            <?php else : ?>
                <a class="btn btn-success" href="./php/login.php">Login</a>
                <a class="btn btn-primary" href="./php/signup.php">Sign Up</a>
            <?php endif ?>
        </div>
    </main>

    <?php include(__DIR__.'/assets/footer/footer.php'); ?>
    
    <script src="./js/index.js"></script>

</body>
</html>