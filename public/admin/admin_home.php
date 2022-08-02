<?php 
    session_start();
    if (!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>PHP-CRUD(Admin Home)</title>
</head>
<body>

    <?php include(__DIR__.'/../assets/header/header.php'); ?>

    <main role="main" class="text-center mt-5">
        <div class="container">
            <h2 class="text-center my-5">Admin Page</h2>
            <hr>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                       ?>
                    </h3>
                </div>
            <?php endif ?>
            <h3>
                <?php if (isset($_SESSION['admin_login'])) { ?>
                Welcome, <?php echo $_SESSION['admin_login']; } ?>                
            </h3>
            <a href="../admin/php/list_user.php" class="btn btn-info">List User</a>
            <a href="../api/logout_db.php" class="btn btn-danger">Logout</a>
        </div>
    </main>

    <?php include(__DIR__.'/../assets/footer/footer.php'); ?>
    <script src="../admin/js/admin_home.js"></script>  
    
</body>
</html>