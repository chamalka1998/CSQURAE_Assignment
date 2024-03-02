<?php
//Database connection
require "database_conn.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $user_password = $_POST['password'];
    $encrypted_password = md5($user_password);

    //Validate if username or password fields are empty
    if ($username == "" or $user_password == "") {
        header("location:Login.php?msg=Enter login Details...!!");
    } else {
        $sql_query = "SELECT * FROM users WHERE (username = '$username') AND (password_hash = '$encrypted_password')";
        $result = $database_connection->query($sql_query);

        if ($result->num_rows > 0) {
            //fetching the associative array 
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];

            //initialize cookie
            $cookie_name = "user_id";
            $cookie_value = $user_id;
            //setting up cookie time
            setcookie($cookie_name, $cookie_value, time() + 10 * 60, "/");


            //header
            header("location:index.php?msg=Login Successfully...!!");
        } else {

            //header
            header("location:Login.php?msg=Please enter correct details...!!");
        }
    }
}
