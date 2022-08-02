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
    <link rel="stylesheet" href="../../css/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>PHP-CRUD(Add User)</title>
</head>
<body>

    <?php include(__DIR__.'/../../assets/header/header.php'); ?>

    <main role="main">
        <div class="container">
            <h2 class="text-center my-5">Add User</h2>
            <hr>
            <div>
                <a href="../php/list_user.php" class="btn btn-primary">Back</a>
            </div>
            <form action="../api/add_user_db.php" method="POST" class="form-horizontal my-3">
                
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-12">
                        <input type="text" name="text_email" class="form-control" required placeholder="Enter email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label"></label>
                    <div class="col-sm-12">
                        <input type="text" name="text_username" class="form-control" require placeholder="Enter username">
                    </div>
                </div>
                
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-12">
                    <input type="password" name="text_password" class="form-control" required placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Select Type</label>
                    <div class="col-sm-12">
                        <select name="text_role" class="form-control">
                            <option value="" selected>- Select Role -</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>                        
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 mt-3">
                        <input type="submit" name="btn_signup" class="btn btn-success" style="width: 100%;" value="Add user">
                    </div>
                </div>

            </form>

        </div>
    </main>

    <?php include(__DIR__.'/../../assets/footer/footer.php'); ?>
    <script src="../js/signup.js"></script>  
    
</body>
</html>