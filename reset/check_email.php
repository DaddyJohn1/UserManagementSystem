<?php include 'includes/reset_header.php';?>
<?php include 'email_process.php';?>



    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/reset_navigation.php';?>
    <!-- Page Content -->
<div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Uplift Hub
        <small>Internship</small>
      </h1> <br>
      <h4 class="my-4">Reset Password
      
      </h4>

      <div class="row">
        
        <div class="col-lg-4 portfolio-item">
        </div>

            <!-- side bar -->
            <div class="col-lg-4 portfolio-item">
            <div class="card h-100">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
              <div class="card-body">
                <h5 class="card-title">
                  Provide account email
                </h5>
                <p class="card-text">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <?php if (!empty($error)) {?>
                      <div class="error"><?php if (isset($error)) echo $error;?></div>
                     <?php }?>

                    <div class="form-group">                      
                      <h6>Email</h6>
                        <p><input class="form-control" type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" placeholder="Enter email"></p>
                    </div>
                    <div class="form-group">
                      <p><input class="btn btn-primary form-control" type="submit" name="submit" value="Check Email">
                      </p>
                    </div>
                  </form>
                  <br>
                  <p>Don't have account? <a href="../signup.php">Sign Up</a></p>
                </p>
              </div>
            </div>
          </div>
                <div class="col-lg-4 portfolio-item">
                </div>

   </div> <!--Class-Row -->      


</div>
<!-- /.container -->

    <!-- Footer -->
    <?php include 'includes/reset_footer.php'; ?>
