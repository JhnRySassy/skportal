<?php
  include ('../includes/connection.php');

  // $sql = "SELECT * FROM tbl_sk";
  // $result = mysqli_query($con, $sql);
  // $row = mysqli_fetch_assoc($result);

  // start Joshua
  // print_r($_SESSION);
  
?>

<nav class="navbar navbar-expand-lg" style="background-color: #0f0f0f">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../assets/SkLogo.png" style="width: 50px;"></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active fs-3 fw-bold text-white " aria-current="page" href="dashboard.php">Prenza Dos Portal</a>
        </li>
      </ul>
      <div class="notification">
        <i class="fa-solid fa-bell fs-4" style="color: white; margin-right: 30px"></i>
      </div>
      <div class="dropdown">
        <button class="btn bg-white dropdown-toggle fw-bold p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right : 30px;">
          <i class="fa-solid fa-user" style="margin-right: 10px;"></i><?php echo $_SESSION['skpos']; echo $_SESSION['skname']; ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-md-start fs-6">
          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user" style="margin-left: 5px; margin-right: 10px;"></i>Profile</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear" style="margin-left: 5px; margin-right: 10px;"></i>Setting</a></li>
          <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-left: 5px; margin-right: 10px;"></i>Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>