<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/grade.php";
       $students = getAllStudents($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Öğrenciler</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        if ($students != 0) {
     ?>
  <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "inc/sidebar.php";?>
        <!-- Sidebar End-->
        <div id="page-content-wrapper">
        <!-- Page Content -->


         <!-- Sidebar-button -->
        <?php include "inc/sidebar-button.php";?>
        <!-- Sidebar-button -->
        <div class="container mt-5">
            <a href="student-add.php"
              class="btn btn-dark">Yeni Öğrenci Ekle</a>
              <form action="student-search.php" 
                    class="mt-3 n-table"
                    method="get">
                <div class="input-group mb-3">
                    <input type="text" 
                          class="form-control"
                          name="searchKey"
                          placeholder="Ara...">
                    <button class="btn btn-primary">
                            <i class="fa fa-search" 
                              aria-hidden="true"></i>
                          </button>
                </div>
              </form>

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Adı</th>
                    <th scope="col">Soyadı</th>
                    <th scope="col">Kullanıcı Adı</th>
                    <th scope="col">Sınıf</th>
                    <th scope="col">Eylemler</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($students as $student ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student['student_id']?></td>
                    <td>
                      <a href="student-view.php?student_id=<?=$student['student_id']?>">
                        <?=$student['fname']?>
                      </a>
                    </td>
                    <td><?=$student['lname']?></td>
                    <td><?=$student['username']?></td>
                    <td>
                      <?php 
                           $grade = $student['grade'];
                           $g_temp = getGradeById($grade, $conn);
                           if ($g_temp != 0) {
                              echo $g_temp['grade_code'].'-'.
                                     $g_temp['grade'];
                            }
                        ?>
                    </td>
                    <td>
                        <a href="student-edit.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-warning">Düzenle</a>
                        <a href="student-delete.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-danger">Sil</a>
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
         <?php } ?></div>
     </div>
     </div>
     <!-- /#page-content-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
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