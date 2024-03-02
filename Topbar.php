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
        } else {

            $logged_user_name = "";
            //if not found user or admin

        }
    } else {

        $logged_user_name = "";
        echo "Error in query: " . $database_connection->error;
    }
} else {

    exit;
}
?>
<link href="scss\_alert.scss" rel="stylesheet">
<!-- Topbar -->
<div class="alert alert-warning alert-dismissible fade show" role="alert" tabindex="-1">
    <strong>

        <?php
        // Retrieving the message from URL
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];

            echo $message; // Displaying the message
        } else {
            //exit;
        }
        ?>


    </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>

    <!-- Sidebar Toggle ( Topbar ) -->
    <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>
        <i class='fa fa-bars'></i>
    </button>



    <!-- Topbar Navbar -->
    <ul class='navbar-nav ml-auto'>



        <!-- Nav Item - User Information -->
        <li class='nav-item dropdown no-arrow'>
            <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button' data-toggle='dropdown'
                aria-haspopup='true' aria-expanded='false'>
                <span class='mr-2 d-none d-lg-inline text-gray-600 small'><?php echo "Hi , " . $logged_user_name;
                                                                            ?></span>
                <img class='img-profile rounded-circle' src='img/undraw_profile.svg'>
            </a>
            <!-- Dropdown - User Information -->
            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='userDropdown'>

                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logoutModal'>
                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- Logout Modal-->
<div class='modal fade' id='logoutModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
    aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Ready to Leave?</h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
            </div>
            <div class='modal-body'>Select 'Logout' below if you are ready to end your current session.</div>
            <div class='modal-footer'>
                <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
                <a class='btn btn-primary' href='Logout.php'>Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- End of Topbar -->