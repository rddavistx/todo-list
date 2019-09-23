<?php

ob_start();
session_start();


 include_once 'dbconnect.php';
 include 'header.php';

if (isset($_POST['login'])) {


    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $result = mysqli_query($db, "SELECT * FROM login WHERE email = '" . $email. "' and password = '" . $password . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name1'] = $row['first_name'];
        $_SESSION['usr_name2'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];

        header("Location: todo.php");
    } else {
      $errormsg = "Incorrect email or password!!!";
    }



}
?>

<?php //include("includes/header.html"); ?>

  <div class="container sign-in-container">
      <!-- <div class="row"> -->
          <!-- <div class="col-md-4 col-md-offset-4 well"> -->
              <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="loginform">
                  <fieldset>
                      <legend>Login</legend>

                      <div class="form-group">
                          <label for="name">Email</label>
                          <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                      </div>

                      <div class="form-group">
                          <label for="name">Password</label>
                          <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                      </div>

                      <div class="form-group">
                          <input type="submit" name="login" value="Login" class="btn btn-primary" />
                      </div>
                  </fieldset>
              </form>
              <div style="text-align:center">
              <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div>
          <!-- </div> -->
      <!-- </div> -->

  </div>
  <?php include "footer.html"; ?>
