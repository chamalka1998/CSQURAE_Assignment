<?php
require_once('database_conn.php');

// Checking the customer id is not empty and if it is numeris
if (isset($_GET['customer_id']) && is_numeric($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    $sql_query = "DELETE FROM customer WHERE id='$customer_id';";

    if ($database_connection->query($sql_query) === TRUE) {
        header('location:Customer_List.php?msg=Data Deleted');
    } else {
        header('location:Customer_List.php?msg=Data Not Deleted');
    }
} else {
    // Redirection message if the customer id empty of it is not numeric
    header('location:Customer_List.php?msg=Invalid Customer ID');
}