<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css" />
    <title>Emre Korkmaz Egitim Kurumlari</title>
    <link rel="icon" href="../logo.png">
</head>

<body>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php include "inc/sidebar.php";?>
    <!-- Sidebar End-->

    <!-- Page Content -->
        <div id="page-content-wrapper">
          <!-- Sidebar-button -->
          <?php include "inc/sidebar-button.php";?>
          <!-- Sidebar-button -->
            <div class="container mt-5">
                <div class="container text-center">
                    <div class="row-cols-5 gx-5 " id="hoverr">
                    <a href="teacher.php"  class="col btn btn-dark m-2 py-3">
                        <i class="fa fa-user fs-1" aria-hidden="true"></i><br>
                        Öğretmenler
                    </a> 
                    <a href="student.php" class="col btn btn-dark m-2 py-3" >
                        <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                        Öğrenciler
                    </a> 
                    <a href="exam.php" class="col btn btn-dark m-2 py-3">
                        <i class="fa fa-pencil-square fs-1" aria-hidden="true"></i><br>
                        Deneme Sınavları
                    </a> 
                    <a href="grade.php" class="col btn btn-dark m-2 py-3">
                        <i class="fa fa-cubes fs-1" aria-hidden="true"></i><br>
                        Sınıf
                    </a> 
                    <a href="section.php" class="col btn btn-dark m-2 py-3">
                        <i class="fa fa-columns fs-1" aria-hidden="true"></i><br>
                        Bölüm
                    </a> 
                    <a id="cikis" href="../logout.php" class="col btn btn-warning m-2 py-3">
                        <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                        Çıkış
                    </a> 
                    </div>
                </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
            <script>
                $(document).ready(function(){
                    $("#navLinks li:nth-child(1) a").addClass('active');
                });
            </script>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php include "inc/sidebar-acma-script.php";?>

</body>
</html>

<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>