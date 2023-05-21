<!DOCTYPE html>
<html lang="en">

<head>
  <title>Theatre Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <style>
    .navbar {
      background-color: transparent;
      border-color: transparent;
    }

    .navbar-brand {
      font-family: "Arial", sans-serif;
      font-size: 20px;
      font-weight: 1000;
      color: #007BFF !important;
      text-decoration: none;
      margin-left: 20px !important;
    }


    .navbar-nav>li>a {
      font-size: 1.2em;
      color: #fff;
    }

    .navbar-nav>li>a:hover,
    .navbar-nav>li>a:focus {
      color: #f0ad4e;
    }

    .navbar-btn {
      font-size: 1.2em;
      color: #fff;
    }

    .navbar-btn:hover {
      color: blue;
    }

    /* Additional styles for alignment */
    .navbar-nav.navbar-center {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    .navbar-nav.navbar-center>li {
      display: inline-block;
      float: none;
    }

    .navbar-right {
      margin-right: 0;
    }

    .navbar-nav li a {
      position: relative;
      display: inline-block;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }

    .navbar-nav li a:hover {
      background-color: #007BFF;
      color: white;
      border-radius: 5px;
    }

    /* Additional styles for logos and words alignment */
    .navbar-nav.navbar-right>li {
      display: flex;
      align-items: center;
    }

    .navbar-nav.navbar-right>li>a {
      margin-left: 5px;
    }

    /* Box styles */
    .nav-item {
      display: inline-block;
      position: relative;
    }

    .nav-item::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      height: 3px;
      background-color: blue;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
    }

    .nav-item:hover::after {
      opacity: 1;
    }

    /* Additional styles for logged-in user */
    .logged-in-user {
      display: flex;
      align-items: center;
      color: white;
    }

    .logged-in-user a {
      display: flex;
      align-items: center;
      color: white;
      text-decoration: none;
      margin-left: 10px;
    }

    .logged-in-user i {
      margin-right: 5px;
    }
  </style>


</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">THEATRE MANANAGEMENT SYSTEM</a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-center">
          <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="schedule.php"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
          <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
          <li><a href="contact-us.php"><i class="fas fa-envelope"></i> Contact</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <?php
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $logged_in_user_email = $_SESSION['email'];

            echo '<li class="logged-in-user"><a href="userprofile.php"><i class="fas fa-user"></i>' . $logged_in_user_email . '</a></li>';
          }
          ?>


          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>

      </div>
    </div>
  </nav>

</body>

</html>