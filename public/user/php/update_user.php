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

    <?php include('../../assets/header/header.php'); ?>

    <main role="main" class="text-center mt-5">
        <div class="container">
            <h2 class="text-center my-5">Update User Page</h2>
            <hr>

        </div>
    </main>

    <?php include('../../assets/footer/footer.php'); ?>
    <script src="../admin/js/update_user.js"></script>  
    
</body>
</html>