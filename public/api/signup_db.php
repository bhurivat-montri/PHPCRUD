<?php 

    session_start();
    require_once(__DIR__.'/../db/conn_db.php');

    if (isset($_POST['btn_signup'])) {
        
        $email = $_POST['text_email']; // input: name="text_email"
        $username = $_POST['text_username']; // input: name="text_email"
        $password = $_POST['text_password']; // input: name="text_email"
        $role = $_POST['text_role']; // select option: name="text_role"
        
        if (empty($email)) {
            $errorMsg[] = "Please enter email";
            header("location: ../index.php");
        } else if (empty($username)) {
            $errorMsg[] = "Please enter username";
            header("location: ../index.php");
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
            header("location: ../index.php");
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
            header("location: ../index.php");
        } else if ($email AND $username AND $password AND $role) {
            try {        

                //CHECK Email OR Username in Database
                //Both of them must not duplicate with an exist email or an exist username.
                $sql = "SELECT Email, Username FROM users WHERE Email = :bindEmail OR Username = :bindUsername";
                $stmt = $db_conn->prepare($sql);
                $stmt->bindParam(':bindEmail', $email);
                $stmt->bindParam(':bindUsername', $username);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $email_db = $row['Email'];
                    $username_db = $row['Username'];
                }

                if ($email_db == $email) {
                    $errorMsg[] = "This email has already existed";
                    header("location: ../index.php");
                } else if ($username_db == $username) {
                    $errorMsg[] = "This username has already existed";
                    header("location: ../index.php");
                } else if (!isset($errorMsg)) {
                    //INSERT NEW USER
                    $sql = "INSERT INTO users (Email, Username, Password, Role) VALUES (:bindEmail, :bindUsername, :bindPassword, :bindRole)";
                    $stmt = $db_conn->prepare($sql);
                    $stmt->bindParam(':bindEmail', $email);
                    $stmt->bindParam(':bindUsername', $username);
                    $stmt->bindParam(':bindPassword', $password);
                    $stmt->bindParam(':bindRole', $role);

                    if ($stmt->execute()) {
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: ../php/login.php");
                    } else {
                        $errorMsg[] = "Inserting user has Failed ...";
                        header("location: ../index.php");
                    }
                
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