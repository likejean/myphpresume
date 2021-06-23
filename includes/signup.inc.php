<?php

    if(isset($_POST['submit'])) {

        include_once '../db.php';

        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        if(empty($firstname)
            || empty($lastname)
            || empty($username)
            || empty($email)
            || empty($password)
            || empty($role)){
            header("Location: ../index.php?signup=empty");
            exit();
        } else {
            if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)){
                header("Location: ../index.php?signup=char");
                exit();
            }else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../index.php?signup=invalidemail");
                    exit();
                }else{
                    $sql = "INSERT INTO users (firstname, lastname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?);";

                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL error";
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $userName, $email, $password, $role);
                        mysqli_stmt_execute($stmt);
                        header('Location: ../index.php?signup=true');
                    }
                }
            }
        }
    } else {
        header('Location: ../index.php?signup=error');

    }


