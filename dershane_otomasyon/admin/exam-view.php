<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/exam.php";

       if (isset($_GET['exam_id'])) $exam_id = $_GET['exam_id'];

       $exam = getSectioById($exam_id, $conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Sınav Görüntüle</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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

        <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
        <div class="mb-3">
            <br/>     
           <span>Sınav ID: </span> <span><?=$exam[0]["exam_id"]?></span>
        </div>
        <div class="mb-3">
        <span>Sınav Adı: </span><span><?=$exam[0]["exam_name"]?></span>
        </div>
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
                <?php $grade_list = [] ?>
                <?php $i = 0; foreach ($exam as $student_exam ) { 
                    $i++;  ?>
                  <tr>
                      <th scope="row"><?=$i?></th>
                      <td><?=$student_exam['student_id']?></th>
                      <td><?=$student_exam['fname']?></td>
                      <td><?=$student_exam['lname']?></td>
                      
                      <?php
                      if (array_key_exists($student_exam['grade_id'], $grade_list)){
                        array_push($grade_list[$student_exam['grade_id']], $student_exam['student_mark']);
                      }else{
                        $grade_list[$student_exam['grade_id']] = array($student_exam['student_mark']);
                      }
                      
                      ?>
                      <td><?=$student_exam['grade_id']?></td>
                      <td><?=$student_exam['section_id']?></td>
                      <td><?=$student_exam['student_mark']?></td>
                      </tr>

                      <?php } ?>
          
              </tbody>
            </table>
            
            <div class="ozet">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

            <?php 
            $xValues = [];
            $yValues = [];
            foreach ($grade_list as $grade_i => $grade_array ) { 
                array_push($xValues, $grade_i);
                array_push($yValues, array_sum($grade_array) / count($grade_array));

              } ?>



            <script>
                  var xValues = [<?=implode(",",$xValues)?>];
                  var yValues = [<?=implode(",",$yValues)?>];
                  var barColors = ["red", "green","blue","orange","brown"];

                  new Chart("myChart", {
                    type: "bar",
                    data: {
                      labels: xValues,
                      datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                      }]
                    },
                    options: {
                      legend: {display: false},
                      title: {
                        display: true,
                        text: "Sınav Ortalamaları"
                      },
                      scales: {
                          yAxes: [{
                              display: true,
                              ticks: {
                                  suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                  // OR //
                                  beginAtZero: true   // minimum value will be 0.
                              }
                          }]
                      }
                    }
                  });
              </script>

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