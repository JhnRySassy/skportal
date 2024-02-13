<?php 
    include ('../users/includes/connection.php');

    if (isset($_POST['submit'])) {

        $f_name=$_POST['f_name'];
        $m_init=$_POST['m_init'];
        $s_name=$_POST['s_name'];
        $suffix=$_POST['suffix'];
        $b_date=$_POST['b_date'];
        $sex=$_POST['sex'];
        $email=$_POST['email'];
        $addr=$_POST['addr'];
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        $r_pass=md5($_POST['r_pass']);

        $errors = array();


        if (empty($f_name) OR empty($m_init) OR empty($s_name) OR empty($b_date) OR empty($sex) OR empty($email) OR empty($addr) OR empty($user) OR empty($pass)) {
            array_push($errors,"All fields are required!");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
            array_push($errors,"Email is not valid!");
        }
        if (strlen($pass < 8)) {
            array_push($errors,"Password must be at lease 8 character long!");
        }
        if ($pass !== $r_pass) {
            array_push($errors,"Password does not match!");
        }
        $check_email = mysqli_query($con, "SELECT * FROM tbl_users WHERE email = '$email'");
        $rowCount = mysqli_num_rows($check_email);
        if ($rowCount > 0) {
            array_push($errors,"Email is already exist");
        }
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $warn = "<div class='alert alert-danger text-center alert-dismissible fade show'> $error
                        <button class='btn-close' aria-label='close' data-bs-dismiss='alert'>
                        </button>
                        </div>";
            }
        } else {
            $query = mysqli_query($con, "INSERT INTO tbl_users(f_name, m_init, s_name, suffix, b_date, sex, email, addr, user, pass, r_pass) VALUES ('$f_name', '$m_init', '$s_name', '$suffix', '$b_date', '$sex', '$email', '$addr', '$user', '$pass', '$r_pass')");
            $succ = "<div class='alert alert-success text-center alert-dismissible'> Register Successfuly
                    <button class='btn-close' aria-label='close' data-bs-dismiss='alert'></button>
                    </div>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../users/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../users/css/register.css">
    <title>Create New Account</title>
</head>
<body style="background-color: #103cbe">
    <form method="POST" novalidate>
        <div class="container fluid d-flex justify-content-center align-items-center flex-column">
            <div class="logo-img mb-3 mt-3">
                <img src="../users/assets/SkLogo.png" style="width: 180px;">
                <div class="header mt-1">
                    <h1 class="text-white text-wrap text-center fs-2">Sign Up</h1>
                </div>
            </div>
            <?php
                if(isset($warn)) {
                    echo $warn;
                }
                if(isset($succ)) {
                    echo $succ;
                }
            ?>
            <div class="row border rounded-4 shadow p-3 left-info bg-white mb-5">
                <h4 style="padding-left: 30px;">User Information <hr></h4>
                <div class="col-md-8">
                    <div class="username-group d-flex justify-content-between mb-2">
                            <input type="text" class="form-control bg-light f-name" id="f_name" name="f_name" placeholder="First Name">
                            <input type="text" class="form-control bg-light m-init" id="m_init" name="m_init" placeholder="Middle Initial">
                    </div>
                    <div class="username-group mb-2 d-flex">
                        <input type="text" class="form-control bg-light" placeholder="Surname" id="s_name" name="s_name">
                        <select class="suffix form-select bg-light" id="suffix" name="suffix">
                            <option value=" "> Suffix</option>
                            <option value="Jr">Jr</option>
                            <option value="Sr">Sr</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="b-date mb-2">
                        <input type="date" class="form-control bg-light" id="b_date" name="b_date">
                    </div>
                    <div class="Sex">
                        <select class="form-select bg-light" id="sex" name="sex">
                            <option value=" ">Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="email-add mb-5">
                    <input type="email" class="form-control bg-light" placeholder="Email Address" id="email" name="email">
                </div>
                <h4 style="padding-left: 30px;">Address <hr></h4>
                <div class="col-md">
                    <div class="address mb-5">
                        <input type="text" class="form-control bg-light" placeholder="Full Address" id="addr" name="addr">
                    </div>
                </div>
                <h4 style="padding-left: 30px;">Account <hr></h4>
                <div class="col-md d-flex justify-content-evenly mb-5">
                    <div class="accounts">
                        <input type="text" class="form-control bg-light" placeholder="Username" id="user" name="user">
                    </div>
                    <div class="accounts">
                        <input type="password" class="form-control bg-light" placeholder="Password" id="pass" name="pass">
                    </div>
                    <div class="accounts">
                        <input type="password" class="form-control bg-light" placeholder="Repeat Password" id="r_pass" name="r_pass">
                    </div>
                </div>
                <div class="reg-btn d-flex justify-content-evenly">
                    <a href="../users/index.php" class="btn btn-danger form-control">Cancel</a>
                    <input type="submit" name="submit" class="btn btn-primary form-control" value="Register">
                </div>
            </div>
        </div>
    </form>
</body>
<!-- <script>
    const form = document.querySelector("form")

    form.addEventListener('submit', e => {
        if (!form.checkValidity()) {
            e.preventDefault()
        }
        form.classList.add('was-validated')
    })
</script> -->
</html>