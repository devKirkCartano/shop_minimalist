<?php
    session_start();
    
    if(isset($_SESSION['email']) )
    {
        header("location: index.php");
        die();
    }
    //connect to database
    include("connect_db.php");

    if($conn)
    {
        if(isset($_POST['login_btn']))
        {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password=md5($password); 
            // check email if already exists in the database
            $query = "SELECT * FROM users WHERE email = '$email'";
            $email_result = mysqli_query($conn, $query);
            // check if email and password are correct
            $sql="SELECT * FROM users WHERE  email='$email' AND password='$password'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            if($email_result){
                if( mysqli_num_rows($email_result) == 0){
                    $_SESSION['message']="User associated with this email is not found";
                    echo '<script>alert("'. $_SESSION['message'] . '")</script>';
                    unset($_SESSION['message']);
                }
                else {
                    if($result) {
                        if( mysqli_num_rows($result)>=1) { 
                            $_SESSION['email']=$email;
                            $_SESSION['fname']=$row['fname'];
                            $_SESSION['lname']=$row['lname'];
                            $_SESSION['message']="You are now logged in, ";
                            echo '<script>alert("'. $_SESSION['message'] . $row["fname"]. '")</script>';
                            echo '<script>window.location.href = "index.php";</script>';
                            unset($_SESSION['message']);
                        } 
                        else {
                            $_SESSION['message']="Password is incorrect";
                            echo '<script>alert("'. $_SESSION['message'] . '")</script>';
                            unset($_SESSION['message']);
                        }
                    }   
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
    <title>Login - Shop Minimalist</title>
    <link rel="icon" type="image/png" sizes="1946x1946" href="assets/img/imported_images/logo-circle.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="login-bg" class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background-image: url('assets/img/imported_images/logo.jpg');">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" action="login.php" method="post">
                                        <div class="mb-3"><input id="exampleInputEmail"
                                                class="form-control form-control-user" type="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                name="email" required/></div>
                                        <div class="mb-3"><input id="exampleInputPassword"
                                                class="form-control form-control-user" type="password"
                                                placeholder="Password" name="password" required/></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input id="formCheck-1"
                                                        class="form-check-input custom-control-input"
                                                        type="checkbox" /><label
                                                        class="form-check-label custom-control-label"
                                                        for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button id="btn-login" class="btn btn-primary d-block btn-user w-100"
                                            type="submit" name="login_btn">Login</button>
                                        <hr /><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2"
                                            role="button"><i class="fab fa-google"></i>  Login with Google</a><a
                                            class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i
                                                class="fab fa-facebook-f"></i>  Login with Facebook</a>
                                        <hr />
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php">Forgot
                                            Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an
                                            Account!</a></div>
                                </div>
                            </div>
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