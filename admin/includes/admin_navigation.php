<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Uplift · Internship</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <img src="" style="border-radius:5"> -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="../change_password/change_pass.php">Change Password</a>
            </li> -->
             <div class="dropdown">
                <!-- <button class="dropbtn"><?php echo $_SESSION['username']; ?></button> -->
                <?php
                $passport = $_SESSION['passport'];
                 echo "<img width=50 height=50 src='../images/$passport' style='border-radius:25px'>"; ?>
                 
                <div class="dropdown-content">
                  <a href="../change_password/change_pass.php">Change password</a>
                  <a href="includes/logout.php">Log Out</a>
                </div>
              </div>
            
          
            <!-- <li class="nav-item">
              <a class="nav-link" href="includes/logout.php">Logout</a>
            </li> -->
            

          </ul>
        </div>
      </div>
    </nav>
