<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/subject.php";
       include "data/grade.php";
       include "data/section.php";

       if(isset($_GET['student_id'])){

       $student_id = $_GET['student_id'];

       $student = getStudentById($student_id, $conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student - Teachers</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        if ($student != 0) {
     ?>
         <div class="d-flex" id="wrapper">

          <!-- Sidebar -->
          <?php include "inc/sidebar.php";?>
          <!-- Sidebar End-->

          <!-- Page Content -->
              <div id="page-content-wrapper">
                <!-- Sidebar-button -->
                <?php include "inc/sidebar-button.php";?>
                <!-- Sidebar-button -->
     <div class="container mt-5" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;">
         <div class="card" style="width: 22rem;">
          <img src="../img/ogrenci-<?=$student['gender']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$student['username']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Adı: <?=$student['fname']?></li>
            <li class="list-group-item">Soyadı: <?=$student['lname']?></li>
            <li class="list-group-item">Kullanıcı Adı: <?=$student['username']?></li>
            <li class="list-group-item">Adres: <?=$student['address']?></li>
            <li class="list-group-item">Doğum Tarihi: <?=$student['date_of_birth']?></li>
            <li class="list-group-item">Email Adres: <?=$student['email_address']?></li>
            <li class="list-group-item">Cinsiyet: <?=$student['gender']?></li>
            <li class="list-group-item">Katılım Tarihi: <?=$student['date_of_joined']?></li>

            <li class="list-group-item">Sınıf: 
                 <?php 
                      $grade = $student['grade'];
                      $g = getGradeById($grade, $conn);
                      echo $g['grade_code'].'-'.$g['grade'];
                  ?>
            </li>
            <li class="list-group-item">Bölüm: 
                 <?php 
                    $section = $student['section'];
                    $s = getSectioById($section, $conn);
                    echo $s['section'];
                  ?>
            </li>
            <li class="list-group-item">Veli Ad: <?=$student['parent_fname']?></li>
            <li class="list-group-item">Veli Soyad: <?=$student['parent_lname']?></li>
            <li class="list-group-item">Veli Telefon No: <?=$student['parent_phone_number']?></li>
          </ul>
          <div class="card-body">
            <a href="student.php" class="card-link">Geri Git</a>
          </div>
        </div>
    </div>
    </div>
    </div>
         <!-- /#page-content-wrapper -->
     <?php 
        }else {
          header("Location: teacher.php");
          exit;
        }
     ?>
     <?php include "inc/sidebar-acma-script.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

    }else {
        header("Location: student.php");
        exit;
    }

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>