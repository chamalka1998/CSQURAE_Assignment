<?php

$cookie_name = "user_id";
$cookie_value = "";
setcookie($cookie_name, $cookie_value, time() + (-0), "/");

header("location:Login.php?msg=You are logged out...!!");
