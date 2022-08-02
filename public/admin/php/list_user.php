<?php 

    session_start();

    if (!isset($_SESSION['admin_login'])) {
        header('location: ../../index.php');
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
    <title>PHP-CRUD(Admin Home)</title>
</head>
<body>

    <?php include(__DIR__.'/../../assets/header/header.php'); ?>
    
    <main role="main" class="text-center mt-5">
        <div class="container">
            <h2 class="text-center my-5">List User Page</h2>
            <hr>            
            <div>
                <a href="../admin_home.php" class="btn btn-primary mb-3">Back</a>
                <a href="./add_user.php" class="btn btn-success mb-3">Add User</a>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        try {               
                            $sql = "SELECT UserID, Email, Username,Password, Role FROM users";
                            $stmt = $db_conn->prepare($sql);
                            $stmt->execute();
            
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                                <tr>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Username']; ?></td>
                                    <td><?php echo $row['Password']; ?></td>
                                    <td><?php echo $row['Role']; ?></td>
                                    <td><a href="./edit_user.php?update_id=<?php echo $row['UserID']; ?>" class="btn btn-warning">Edit</a></td>
                                    <td><a href="?delete_id=<?php echo $row['UserID']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                    <?php        
                            }            
                        } catch (PDOException $e) {
                            $e->getMessage();
                            header("location: ../admin_home.php");
                        }

                        require_once(__DIR__.'/../../db/close_db.php');
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include(__DIR__.'/../../assets/footer/footer.php'); ?>
    <script src="../../admin/js/list_user.js"></script>  
    
</body>
</html>