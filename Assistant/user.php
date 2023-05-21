<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $userNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user"));
    ?>

    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-stats">
                    <div class="admin-section-stats-panel">



                    </div>
                    <div class="admin-section-stats-panel">
                        <i class="fas fa-users" style="background-color: #000000"></i>
                        <!--<i class="fas fa-ticket-alt"></i>-->
                        <h2 style="color: #bb3c95">
                            <?php echo $userNo ?>
                        </h2>
                        <h3>Users</h3>
                    </div>
                </div>
                <div class="admin-section-panel admin-section-panel1">
                    <div class="admin-panel-section-header">
                        <h2>Theatre Management Users</h2>
                        <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    </div>
                    <div class="admin-panel-section-content">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                            <?php

                      

                            // Fetch user data from the database
                            $select = "SELECT * FROM `user`";
                            $run = mysqli_query($con, $select);

                            if (!$run) {
                                die("Query execution failed: " . mysqli_error($con));
                            }

                            ?>

                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($run)) {
                                    $user_id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $phone = $row['phone'];
                                    $email = $row['email'];
                                    // Additional fields if needed: $password = $row['password'];
                                    // $created_at = $row['created_at'];
                                    // $updated_at = $row['updated_at'];
                                
                                    ?>

                                    <tr align="center">
                                        <td>
                                            <?php echo $user_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $first_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $last_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $phone; ?>
                                        </td>
                                        <td>
                                            <?php echo $email; ?>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>