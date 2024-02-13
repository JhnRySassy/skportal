<?php
session_start();


include ('../includes/connection.php');
if(isset($_POST['submit'])) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = mysqli_query($con, "SELECT * FROM tbl_sk WHERE sk_user='$user' && sk_pass='$pass'");
    $ret = mysqli_fetch_assoc($sql);

    if ($ret > 0) {
        $_SESSION['skwebsite'] = $ret['sk_id'];
        $_SESSION['skpos'] = $ret['sk_position'];
        $_SESSION['skname'] = $ret['sk_fname'];
        header('location: dashboard.php');
    } else {
        $wrong = "<div class='alert alert-danger text-center alert-dismissible fade show'> Wrong username or password
                        <button class='btn-close' aria-label='close' data-bs-dismiss='alert'>
                        </button>
                        </div>";
    }
}

if(isset($_SESSION["skwebsite"])){

    echo "<script>window.location.href='dashboard.php';</script>";

 }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>SK Prenza Dos</title>
</head>
<body>
    <form method='POST'>
    <div class="container d-flex justify-content-center align-items-center flex-column min-vh-100">
        <?php
            if (isset($wrong)) {
                echo $wrong;
            }
        ?>
        <div class="row border p-3 rounded-5 shadow bg-white box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"  style="background-color: #103cbe";>
                <div class="feature-img p-3">
                    <img src="../assets/SkLogo.png" class="img-fluid" style="width: 230px;">
                </div>
                <p class="text-white fs-3" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Barangay Prenza Dos</p>
                <small class="text-white text-center text-wrap">Halina't Maglingkod para sa Prenza Dos,</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row">
                    <div class="header">
                        <h2>Prenza Dos (Admin)</h2>
                        <p>Please Log In</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="user" name="user" placeholder="Username or Email Address">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="pass" name="pass" placeholder="Password">
                    </div>
                    <div class="input-group mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="formCheck">
                            <label for="formCheck"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="signup.html">Forgot Password</a></small>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" id="submit" name="submit">Log In</button>
                    </div>
                    <!-- <div class="input-group" style="font-family: 'Poppins', sans-serif;">
                        <small>Don't have an account? <a href="../php/register.php">Sign Up</a></small>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>