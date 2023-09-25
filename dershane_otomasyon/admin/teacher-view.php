<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/teacher.php";
       include "data/subject.php";
       include "data/grade.php";
       include "data/section.php";

       if(isset($_GET['teacher_id'])){

       $teacher_id = $_GET['teacher_id'];

       $teacher = getTeacherById($teacher_id,$conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Öğretmenler</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        if ($teacher != 0) {
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
     <div class="container mt-5" style="  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;">
         <div class="card" style="width: 22rem;">
          <img src="../img/ogretmen-<?=$teacher['gender']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$teacher['username']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Adı: <?=$teacher['fname']?></li>
            <li class="list-group-item">Soyadı: <?=$teacher['lname']?></li>
            <li class="list-group-item">Kullanıcı Adı: <?=$teacher['username']?></li>

            <li class="list-group-item">Çalışan Sayısı: <?=$teacher['employee_number']?></li>
            <li class="list-group-item">Adres: <?=$teacher['address']?></li>
            <li class="list-group-item">Doğum Günü: <?=$teacher['date_of_birth']?></li>
            <li class="list-group-item">Telefon Numarası: <?=$teacher['phone_number']?></li>
            <li class="list-group-item">Vasıf: <?=$teacher['qualification']?></li>
            <li class="list-group-item">Email adres: <?=$teacher['email_address']?></li>
            <li class="list-group-item">Cinsiyet: <?=$teacher['gender']?></li>
            <li class="list-group-item">Katıldığı Tarih: <?=$teacher['date_of_joined']?></li>

            <li class="list-group-item">Ders: 
                <?php 
                   $s = '';
                   $subjects = str_split(trim($teacher['subjects']));
                   foreach ($subjects as $subject) {
                      $s_temp = getSubjectById($subject, $conn);
                      if ($s_temp != 0) 
                        $s .=$s_temp['subject_code'].', ';
                   }
                   echo $s;
                ?>
            </li>
            <li class="list-group-item">Sınıf: 
                 <?php 
                   $g = '';
                   $grades = str_split(trim($teacher['grades']));
                   foreach ($grades as $grade) {
                      $g_temp = getGradeById($grade, $conn);
                      if ($g_temp != 0) 
                        $g .=$g_temp['grade_code'].'-'.
                             $g_temp['grade'].', ';
                   }
                   echo $g;
                  ?>
            </li>
            <li class="list-group-item">Bölüm: 
                 <?php 
                   $s = '';
                   $sections = str_split(trim($teacher['section']));
                   foreach ($sections as $section) {
                      $s_temp = getSectioById($section, $conn);
                      if ($s_temp != 0) 
                        $s .= $s_temp['section'].', ';
                   }
                   echo $s;
                  ?>
            </li>
            
          </ul>
          <div class="card-body">
            <a href="teacher.php" class="card-link">Geri Git</a>
          </div>
        </div>
     </div>
     </div>
     </div>
     <!-- /#page-content-wrapper -->
     <?php include "inc/sidebar-acma-script.php";?>
     <?php 
        }else {
          header("Location: teacher.php");
          exit;
        }
     ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

    }else {
        header("Location: teacher.php");
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