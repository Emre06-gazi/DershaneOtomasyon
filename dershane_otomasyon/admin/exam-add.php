<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/grade.php";
       include "data/section.php";
       include "data/student.php";

       $grades = getAllGrades($conn);
       $sections = getAllSections($conn);
       $students = getAllStudents($conn);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Sınav Ekle</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="exam.php"
           class="btn btn-dark">Geri Git</a>

        <form method="post"
              class="table-responsive shadow p-3 mt-5 form-w" 
              action="req/exam-add.php">
        <h3>Yeni Sınav Ekle</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>

        <div class="mb-3">
          <label class="form-label">Sınav ID</label>
          <input type="text" 
                 class="form-control"
                 name="exam_id">
        </div>
        <div class="mb-3">
          <label class="form-label">Sınav Adı</label>
          <input type="text" 
                 class="form-control"
                 name="exam_name">
        </div>

        <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Öğrenci adı</th>
                    <th scope="col">Öğrenci Soy Adı</th>
                    <th scope="col">Sınıf</th>
                    <th scope="col">Bölüm</th>
                    <th scope="col">Not</th>
                  </tr>
                </thead>
                <tbody>

                <?php $i = 0; foreach ($students as $student ) { 
                    $i++;  ?>
                  <tr>
                      <th scope="row"><?=$i?></th>
                      <td><input type="hidden" name="student_id[]" value="<?=$student['student_id']?>"> <?=$student['student_id']?></th>
                      <td><input type="hidden" name="fname[]" value="<?=$student['fname']?>" ><?=$student['fname']?></td>
                      <td><input type="hidden" name="lname[]" value="<?=$student['lname']?>"><?=$student['lname']?></td>
                      <td><input type="hidden" name="grade[]" value="<?=$student['grade']?>"><?=$student['grade']?></td>
                      <td><input type="hidden" name="section[]" value="<?=$student['section']?>"><?=$student['section']?></td>
                      <td><input name="student_mark[]" type="text"></td>
                      </tr>

                      <?php } ?>
          
              </tbody>
            </table>
          </div>



      <button type="submit" class="btn btn-primary">Kayıt et</button>
      </form>
     </div>
     </div>
     </div>
     <!-- /#page-content-wrapper -->
     <?php include "inc/sidebar-acma-script.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(4) a").addClass('active');
        });
    </script>

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