<?php

    session_start();
    require_once(__DIR__.'/../db/conn_db.php');
    
    if (isset($_POST['btn_login'])) {

        $email = $_POST['text_email']; // input: name="text_email"
        $password = $_POST['text_password']; // input: name="text_email"
        $role = $_POST['text_role']; // select option: name="text_role"

        if (empty($email)) {
            $errorMsg[] = "Please enter email";
            header("location: ../index.php");
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
            header("location: ../index.php");
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
            header("location: ../index.php");
        } else if ($email AND $password AND $role) {

            try {               
                $sql = "SELECT Email, Password, Role FROM users WHERE Email = :bindEmail AND Password = :bindPassword AND Role = :bindRole";
                $stmt = $db_conn->prepare($sql);
                $stmt->bindParam(':bindEmail', $email);
                $stmt->bindParam(':bindPassword', $password);
                $stmt->bindParam(':bindRole', $role);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $email_db = $row['Email'];
                    $password_db = $row['Password'];
                    $role_db = $row['Role'];
                }

                if ($email == $email_db AND $password == $password_db AND $role == $role_db) {
                    switch($role_db) {
                        case 'admin':
                            $_SESSION['admin_login'] = $email_db;
                            $_SESSION['success'] = "Admin... Successfully Login...";
                            header("location: ../admin/admin_home.php"); 
                            break;
                        case 'user':
                            $_SESSION['user_login'] = $email_db;
                            $_SESSION['success'] = "User... Successfully Login...";
                            header("location: ../user/user_home.php");
                            break;
                        default: 
                            $_SESSION['error'] = "Wrong email or password or role";
                            header("location: ../index.php");
                            break;
                    }
                } else {
                    $_SESSION['error'] = "Wrong email or password or role";
                    header("location: ../index.php");
                }
            } catch (PDOException $e) {
                $e->getMessage();
                header("location: ../index.php");
            }
        }
    } else {
        header("location: ../index.php");
    }

    require_once(__DIR__.'/../db/close_db.php');

?>