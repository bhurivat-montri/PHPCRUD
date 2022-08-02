<?php 
    session_start();
    
    if (!isset($_SESSION['admin_login'])) {
        header('location: ../index.php');
    } else {
        require_once(__DIR__.'/../../db/conn_db.php');
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
    <title>PHP-CRUD(Edit User)</title>
</head>
<body>

    <?php include(__DIR__.'/../../assets/header/header.php'); ?>

    <main role="main">
        <div class="container">
            <h2 class="text-center my-5">Edit User</h2>
            <hr>
            <div>
                <a href="../php/list_user.php" class="btn btn-primary">Back</a>
            </div>
            <form action="../api/add_user_db.php" method="POST" class="form-horizontal my-3">

                <?php
                    $userID = $_GET['update_id'];
                    try {               
                        $sql = "SELECT UserID, Email, Username, Password, Role FROM users WHERE UserID = :bindUserID";
                        $stmt = $db_conn->prepare($sql);
                        $stmt->bindParam(':bindUserID', $userID);
                        $stmt->execute();
        
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" name="text_email" class="form-control" required placeholder="Enter email" value="<?php echo $row['Email']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label"></label>
                            <div class="col-sm-12">
                                <input type="text" name="text_username" class="form-control" require placeholder="Enter username" value="<?php echo $row['Username']; ?>">
                             </div>
                        </div>
                    
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="text_password" class="form-control" required placeholder="Enter password" value="<?php echo $row['Password']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Select Type</label>
                            <div class="col-sm-12">
                                <select name="text_role" class="form-control">
                                    <?php
                                        switch ($row['Role']) {
                                            case "admin":
                                    ?>
                                                <option value="">- Select Role -</option>
                                                <option value="user">User</option>
                                                <option value="admin" selected>Admin</option>  
                                    <?php
                                                break;
                                            case "user":
                                    ?>
                                                <option value="">- Select Role -</option>
                                                <option value="user" selected>User</option>
                                                <option value="admin">Admin</option>     
                                    <?php
                                                break;
                                            default:
                                    ?>
                                                <option value="" selected>- Select Role -</option>
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>     
                                    <?php
                                                break;
                                        }
                                    ?>
                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 mt-3">
                                <input type="submit" name="btn_signup" class="btn btn-warning" style="width: 100%;" value="Edit user">
                            </div>
                        </div>
                <?php
                        }
                    } catch (PDOException $e) {
                        $e->getMessage();
                        header("location: ../admin_home.php");
                    }

                    require_once(__DIR__.'/../../db/close_db.php');
                ?>
                
            </form>

        </div>
    </main>

    <?php include(__DIR__.'/../../assets/footer/footer.php'); ?>
    <script src="../js/signup.js"></script>  
    
</body>
</html>