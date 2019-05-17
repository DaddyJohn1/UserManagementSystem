<?php include 'includes/admin_header.php';?>

<?php require_once '../db.php';
  $db = new Database();
 ?>




<?php ob_start(); ?>
<?php session_start(); ?>

<?php if (!isset($_SESSION['jamb_number'])) {
  header("Location: ../index.php"); 
} ?>

    <!-- carousel -->

    <!-- Navigation -->
      <?php include 'includes/admin_navigation.php';?>
    <!-- Page Content -->
<div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Welcome
        <small class="username"><?php echo $_SESSION['firstname']; ?></small>
      </h1>
      <p>Course Registration</p>
      <div class="row">
        
        <div class="col-lg-8 portfolio-item">
          <table class="table  table-hover">
            <thead>
              <th>Course Code</th>
              <th>Course Title</th>
              <th>Course Unit</th>
            </thead>
            <tbody>
      <?php
          if (!empty($_POST['add_course'])) {
            
            $course_code = $_POST['course_code'];
            if (empty($course_code)) {
              $code_error="Enter course code";
            }

            $course_code = $db->secureSQL($course_code);
            $course_code = $db->secureInput($course_code);

            if (!isset($code_error)) {
              $select_query = "SELECT * FROM courses WHERE course_code = '{$course_code}' ";
              $select_result = $db->selectQuery($select_query);
              
              $db_course_code = $db_course_title = $db_course_unit = '';
              while ($row = mysqli_fetch_assoc($select_result)) {
                $db_course_code = $row['course_code'];
                $db_course_title = $row['course_title'];
                $db_course_unit = $row['course_unit'];
              }

                  if ($course_code == $db_course_code) {
                    echo "<tr>";
                    echo "<td>{$course_code}</td>";
                    echo "<td>{$db_course_title}</td>";
                    echo "<td>{$db_course_unit}</td>";
                    echo "</tr>";
                  }elseif ($course_code !== $db_course_code) {
                    $code_error = "Invaid course code";
                  }else{

                  }
                }                
          }

            




       ?>
                <tr>
                  <th colspan="2">Total Course Unit</th>
                  <td>0</td>
                </tr> 








            
            </tbody>
          </table>
          <form action="" method="post">
<?php if (isset($code_error)) {?>
  <div class="code_error">
    <div><?php if (isset($code_error)) echo $code_error; ?></div>
  </div>
<?php } ?>
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-group">
                <input class="form-control" type="text" name="course_code">
                </div>
              </div> <!-- End of Col-md-2-->
              <div class="col-md-2">
                <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_course" value="Add Course">
                </div>
              </div> <!-- End of Col-md-2-->

            </div>
          </form>
            
        </div> <!--col-lg-8-->

   </div> <!--Class-Row -->      


</div>
<!-- /.container -->

    <!-- Footer -->
    <?php include 'includes/admin_footer.php'; ?>
