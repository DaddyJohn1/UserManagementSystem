<?php include 'includes/screening_header.php'; ?>
<?php include 'process/screening_process.php'; ?>







    <!-- Navigation -->
    <?php include 'includes/screening_navigation.php'; ?>
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Uplift Hub
        <small>Internship</small>
      </h1>

      <div class="row">
        <div class="col-lg-6 portfolio-item">
          <!-- <div class="card h-100">
            
            <div class="card-body">
              <h4 class="card-title">
                
              </h4>
              <p class="card-text">
 
                   
            </p>
            </div>
          </div> -->
        </div>


        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              <h4 class="card-title title">
                Screening 
                <!-- · Internship -->
              </h4>
              <p class="card-text">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

                    <?php if (!empty($error)) {?>
                      <div class="error"><?php if (isset($error)) echo $error; ?></div>
                    <?php } ?>

                    <?php if (!empty($success)) {?>
                      <div class="success"><?php if (isset($success)) echo $success; ?></div>
                    <?php } ?>

                    <div class="form-group">
                    <p>Passport*<br><input type="file" name="passport" ></p>
                    </div>
                    <div class="form-group">
                      <p>First Name*<input class="form-control" type="text" name="firstname" value="<?php if(isset($firstname)) echo $firstname;?>" placeholder="First name"></p>
                    </div>
                    <div class="form-group">
                      <p>Last Name*<input class="form-control" type="text" name="lastname" value="<?php if(isset($lastname)) echo $lastname;?>" placeholder="Last name"></p>
                    </div>
                    <div class="form-group">
                      <p>Email* <input class="form-control" type="text" name="email" value="<?php if(isset($email)) echo $email;?>" placeholder="you@example.com"></p>
                    </div>
                    <div class="form-group">
                      <p>Phone Number*<input class="form-control" type="text" name="phonenumber" placeholder="Phone Number"></p>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="address"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Blood Group</label>
                      <select class="form-control" name="bloodgroup">
                      <option value="A+">A+</option>                       
                      <option value="A-">A-</option>                       
                      <option value="B+">B+</option>                       
                      <option value="B-">B-</option>                       
                      <option value="O+">O+</option>                       
                      <option value="O-">O-</option>                       
                      <option value="AB">AB</option>                       
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <p>Gender*<br>

                      <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Male") {?>checked <?php }?> value="Male">Male

                      <input type="radio" name="gender" <?php if (isset($_POST['gender']) && $_POST['gender']=="Female"){?> checked <?php } ?> value="Female">Female</p>
                    </div>

                    <div class="form-group">
                      <input class="btn btn-primary form-control" type="submit" name="register" value="Register">
                      
                    </div>
                </form>
              </p>
            </div>
          </div>
        </div>

        
        
        <!--  -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>