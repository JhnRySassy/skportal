<?php


$con=mysqli_connect("localhost", "root", "", "skwebsite");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

// function admin(){
//   if(isset($_SESSION['user']) ){
//     if($_SESSION['user']!="admin"){
//       echo '<script>
//       window.location="logout.php"
//     </script>';
//     }
//   }else{
//     echo '<script>
//     window.location="logout.php"
//   </script>';
//   }
// }
  ?>
