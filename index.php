<?php
//Database Connection
require "database_conn.php";
//User id assigning
$user_id = $_COOKIE['user_id'];

if (isset($user_id) && $user_id !== "") {
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = $database_connection->query($sql);

    if ($result) {

        //fetching data from users table
        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $logged_user_name = $user_data['username'];
            $user_type = $user_data['user_type'];

            header("Location: dashboard.php?msg=Login successfully...!!");
        } else {

            $logged_user_name = "";
            //if not found user or admin
            echo "User data not found.";
        }
    } else {

        $logged_user_name = "";
        echo "Error in query: " . $database_connection->error;
    }
} else {
    //redirect 
    header("Location: Login.php?msg=Please login...!!");
    exit;
}