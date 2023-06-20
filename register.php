<?php
  session_start(); // start the session
  include("connect_db.php"); // include the database connection file

  if (isset($_POST['register_btn'])){
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_repeat = mysqli_real_escape_string($conn, $_POST['password_repeat']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if($result)
      {
        if( mysqli_num_rows($result) > 0){
          echo '<script language="javascript">';
          echo 'alert("Email already exists")';
          echo '</script>';
        }
        else {
          if($password==$password_repeat) {           //Create User
              $password=md5($password); //hash password before storing for security purposes
              $sql="INSERT INTO users (fname, lname, email,password ) VALUES('$fname','$lname','$email','$password')"; 
              mysqli_query($conn,$sql); 
              // Set session variables
              $_SESSION['message'] = 'You are now successfully registered!';
              echo '<script>alert("' . $_SESSION['message'] . '");</script>';
            // Redirect to login.php immediately after the alert
              echo '<script language="javascript">';
              echo 'window.location.href = "login.php";'; 
              echo '</script>';

            } else {
                $_SESSION['message'] = 'Password do not match';
                echo '<script>alert("' . $_SESSION['message'] . '");</script>';
                unset($_SESSION['message']);
            }
        }
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Register - Shop Minimalist</title>
  <link rel="icon" type="image/png" sizes="1946x1946" href="assets/img/imported_images/logo-circle.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="register-bg" class="bg-gradient-primary">
  <div class="container">
    <div class="card shadow-lg o-hidden border-0 my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-flex">
            <div class="flex-grow-1 bg-register-image"
              style="background-image: url('assets/img/imported_images/logo.jpg');">
            </div>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h4 class="text-dark mb-4">Create an Account!</h4>
              </div>
              <form class="user" method="post" action="register.php">
                <div class="row mb-3">
                  <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text"
                      id="exampleFirstName" placeholder="First Name" name="first_name" required></div>
                  <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleLastName"
                      placeholder="Last Name" name="last_name" required></div>
                </div>
                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail"
                    aria-describedby="emailHelp" placeholder="Email Address" name="email" required></div>
                <div class="row mb-3">
                  <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password"
                      id="examplePasswordInput" placeholder="Password" name="password" required></div>
                  <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                      id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat" required></div>
                </div><button class="btn btn-primary d-block btn-user w-100" id="btn-register" type="submit" name="register_btn">Register
                  Account</button>
                <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i
                    class="fab fa-google"></i>&nbsp; Register with Google</a><a
                  class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i
                    class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                <hr>
              </form>
              <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
              <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/script.min.js?h=bdf36300aae20ed8ebca7e88738d5267"></script>
  <script src="assets/js/script.min.js"></script>

</body>

</html>