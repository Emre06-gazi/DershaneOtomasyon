<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/grade.php";
       $grades = getAllGrades($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Sınıflar</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        if ($grades != 0) {
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
                  <div class="table-responsive">
                  <div style="padding-top: 15px;">Sınıf Listesi</div>
                      <table class="table table-bordered mt-3 n-table">
                        
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sınıf ID</th>
                            <th scope="col">Sınıf</th>
                            <th scope="col">Sınıf Kodu</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 0; foreach ($grades as $grade) { 
                            $i++;  ?>
                          <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$grade['grade_id']?></td>
                            <td><?=$grade['grade']?></td>
                            <td><?=$grade['grade_code']?></td>
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
             $("#navLinks li:nth-child(3) a").addClass('active');
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