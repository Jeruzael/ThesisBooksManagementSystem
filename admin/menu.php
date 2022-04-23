<div class="sidebar" style="background-color: <?php echo $fetchColor['color_7']?>">
    <div class="logo-details">
        <img src="../teamsResources/teamsLogo_5.png" class="img-fluid" style="height: 60px;">
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

        <!-- dashboard -->
        <li>
            <a href="dashboard.php">
                <i class='bx bx-home'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>

        <!-- books library -->
        <li>
            <a href="books.php">
                <i class='bx bx-book' ></i>
                <span class="links_name">Book</span>
            </a>
            <span class="tooltip">Book</span>
        </li>

        <!-- books management -->
        <li>
            <a href="#" id="feat-btn">
                <i class='bx bx-book-bookmark' ></i>
                <span class="links_name">Books Management</span>
            </a>
            <ul class="book-show">
                <li><a href="brequest.php"><i class='bx bx-chevron-right' ></i>Book Request</a></li>
                <li><a href="bborrowed.php"><i class='bx bx-chevron-right' ></i>Borrowed Books</a></li>
                <li><a href="blate.php"><i class='bx bx-chevron-right' ></i>Late Returnees</a></li>
                <li><a href="blost.php"><i class='bx bx-chevron-right' ></i>Lost Books</a></li>
            </ul>
            <span class="tooltip">Books Management</span>
        </li>

        <!-- users -->
        <li>
            <a href="user.php">
                <i class='bx bx-group' ></i>
                <span class="links_name">Manage User</span>
            </a>
            <span class="tooltip">Manage User</span>
        </li>

        <!-- profile -->
        <li>
            <a href="profile.php">
                <i class='bx bx-user-circle' ></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>

        <!-- login details and logout -->
        <li class="profile">
            <div class="profile-details">
                <div class="name_job">
                    <div class="name"><?php echo ucwords($adminLastname); ?>,  <?php echo ucwords($adminFirstname); ?></div>
                    <div class="job">Programmer</div>
                </div>
            </div>
            <a href="logout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
        </li>
    </ul>
</div>
<script src="../teamsScript/submenu.js"></script>