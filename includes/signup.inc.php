<?php
    include_once '../db.php';
    if(isset($_POST['firstname'], $_POST['lastname'],$_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']) &&
        !empty($_POST['firstname'])
        && !empty($_POST['lastname'])
        && !empty($_POST['username'])
        && !empty($_POST['email'])
        && !empty($_POST['password'])
        && !empty($_POST['role'])
    ){
        $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
        $userName = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        mysqli_query($conn, "INSERT INTO users (firstname, lastname, username, email, password, role) VALUES ('$firstName', '$lastName', '$userName', '$email', '$password', '$role');");

    }else{
        echo 'Error...';
    }

    header('Location: ../index.php?signup=true');