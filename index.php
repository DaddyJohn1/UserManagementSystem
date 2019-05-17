<?php include 'includes/index_header.php';?>
<?php include 'process/index_process.php';?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/index_navigation.php';?>
    <!-- Page Content -->
<div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Uplift Hub
        <small>Internship</small>
      </h1>

      <div class="row">
        
        <div class="col-lg-8 portfolio-item">
           <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="images/desert.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="images/koala.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="images/jellyfish.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- col-lg-8 end -->
        </div>
       

            <!-- side bar -->

            <div class="col-lg-4 portfolio-item">
            <div class="card h-10">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">

                <h4 class="card-title">
                  Login
                </h4>
                <p class="card-text">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <?php if (!empty($error)) {?>
                        <div class="error"><?php if (isset($error)) echo $error;?>
                        </div>  
                      <?php } ?>

                    <div class="form-group">                      
                      <label for="jamb_number">Jamb Number</label>
                      <input class="form-control" type="text" name="jamb_number" value="<?php if(isset($jamb_number)) echo $jamb_number; ?>"></p>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                      <p><input class="btn btn-primary form-control" type="submit" name="login" value="Login">
                      </p>
                      <p><a href="reset/check_email.php">Forgot Password?</a></p>
                    </div>
                  </form>
                </p>
              </div>
            </div>
          </div>
   </div> <!--Class-Row -->      


</div>
<!-- /.container -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
