<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading" style="font-size: 70px;">Theatre Management System</h1>
    </a>
</div>
<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="index.php"><i class="fas fa-home"></i>  Home</a></li>
            <li><a href="schedule.php"><i class="fas fa-calendar-alt"></i>Schedule</a></li>
            <!-- <li><a href="TxnStatus.php" target="_blank"><i class="fas fa-check-circle"></i> Status</a></li> -->
            <li><a href="about.php"><i class="fas fa-info"></i>  About</a></li>           
            <li><a href="contact-us.php"><i class="fas fa-envelope"></i>  Contact</a></li>
        </ul>
        <ul class="navbar-menu navbar-right">
                
            
        <li><a href="#" id="signinBtn"><i class="fas fa-sign-in-alt"></i> Sign In</a></li>

<script>
    $(document).ready(function () {
        $('#signinBtn').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: 'login.php', // URL of the login page
                type: 'GET', // Change to 'POST' if your login page uses POST method
                async: false, // Set async to false to make the request synchronous
                success: function (data) {
                    $('body').append(data); // Append the contents of login.php to the body
                    $('#loginModal').modal('show'); // Trigger login modal to open
                }
            });
        });
    });
</script>

                <li><a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>  Logout</a></li>
        </ul>
    </nav>
</div>
