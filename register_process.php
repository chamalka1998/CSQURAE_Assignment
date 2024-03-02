<?php

//Database connection
require "database_conn.php";

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];





if ($username == "" or $password == "" or $confirm_password == "") {

    header("location:register.php?msg=Please fill all fields...!");
} else {

    if ($user_password != $user_confirm_password) {

        header("location:register.php?msg=Passwords does not matched...!");
    } else {

        $encrypted_password = md5($password);

        $sql_query = "INSERT INTO users (username,password_hash)
        VALUES ('$username','$encrypted_password')";

        if ($database_connection->query($sql_query) === TRUE) {

            header("location:Login.php?msg=Registration Successfully...!!!");
        } else {

            header("location:register.php?msg=Registration Failed...!!!");
        }
    }
}
