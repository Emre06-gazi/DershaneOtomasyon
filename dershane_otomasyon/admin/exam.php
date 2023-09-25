<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/exam.php";
       include "data/grade.php";
       include "data/subject.php";

       $unique_exams = getUniqueTrial($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Sınavlar</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
      <?php
        if ($unique_exams != 0) {
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
    <div class="container mt-5">
            <a href="exam-add.php" class="btn btn-dark">Yeni Sınav Ekle</a>
            
           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Sınav Adı</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($unique_exams as $unique_exam ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$unique_exam['exam_id']?></td>
                    <td>
                      <a href="exam-view.php?exam_id=<?=$unique_exam['exam_id']?>">
                        <?=$unique_exam['exam_name']?>
                      </a>
                    </td>

                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Boş!
              </div>
         <?php } ?>
     </div>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(4) a").addClass('active');
        });
    </script>
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