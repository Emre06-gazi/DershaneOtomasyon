<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/subject.php";
       include "data/grade.php";
       include "data/section.php";
       $subjects = getAllSubjects($conn);
       $grades   = getAllGrades($conn);
       $sections = getAllSections($conn);


       $fname = '';
       $lname = '';
       $uname = '';
       $address = '';
       $en = '';
       $pn = '';
       $qf = '';
       $email = '';

       if (isset($_GET['fname'])) $fname = $_GET['fname'];
       if (isset($_GET['lname'])) $lname = $_GET['lname'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['address'])) $address = $_GET['address'];
       if (isset($_GET['en'])) $en = $_GET['en'];
       if (isset($_GET['pn'])) $pn = $_GET['pn'];
       if (isset($_GET['qf'])) $qf = $_GET['qf'];
       if (isset($_GET['email'])) $email = $_GET['email'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Öğretmen Ekle</title>
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
        <a href="teacher.php"
           class="btn btn-dark">Geri Git</a>

        <form method="post"
              class="table-responsive shadow p-3 mt-5 form-w"
              action="req/teacher-add.php">
        <h3>Yeni Öğretmen Ekle</h3><hr>
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
          <label class="form-label">Adı</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$fname?>" 
                 name="fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Soyadı</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$lname?>"
                 name="lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Kullanıcı Adı</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$uname?>"
                 name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Şifre</label>
          <div class="input-group mb-3">
              <input type="text" 
                     class="form-control"
                     name="pass"
                     id="passInput">
              <button class="btn btn-secondary"
                      id="gBtn">
                      Rastgele Oluştur</button>
          </div>
          
        </div>
        <div class="mb-3">
          <label class="form-label">Adres</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$address?>"
                 name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">Çalışan No</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$en?>"
                 name="employee_number">
        </div>
        <div class="mb-3">
          <label class="form-label">Tel No</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pn?>"
                 name="phone_number">
        </div>
        <div class="mb-3">
          <label class="form-label">Vasıf-Deneyim</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$qf?>"
                 name="qualification">
        </div>
        <div class="mb-3">
          <label class="form-label">Email Adres</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$email?>"
                 name="email_address">
        </div>
        <div class="mb-3">
          <label class="form-label">Cinsiyet</label><br>
          <input type="radio"
                 value="Male"
                 checked 
                 name="gender"> Erkek
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Female"
                 name="gender"> Kadın
        </div>
        <div class="mb-3">
          <label class="form-label">Doğum Tarihi</label>
          <input type="date" 
                 class="form-control"
                 value=""
                 name="date_of_birth">
        </div>
        <div class="mb-3">
          <label class="form-label">Ders</label>
          <div class="row row-cols-5">
            <?php foreach ($subjects as $subject): ?>
            <div class="col">
              <input type="checkbox"
                     name="subjects[]"
                     value="<?=$subject['subject_id']?>">
                     <?=$subject['subject']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Sınıf</label>
          <div class="row row-cols-5">
            <?php foreach ($grades as $grade): ?>
            <div class="col">
              <input type="checkbox"
                     name="grades[]"
                     value="<?=$grade['grade_id']?>">
                     <?=$grade['grade_code']?>-<?=$grade['grade']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Bölüm</label>
          <div class="row row-cols-5">
            <?php foreach ($sections as $section): ?>
            <div class="col">
              <input type="checkbox"
                     name="section[]"
                     value="<?=$section['section_id']?>">
                     <?=$section['section']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>

      <button type="submit" class="btn btn-primary">Ekle</button>
     </form>
     </div>
     </div>
     </div>

     <?php include "inc/sidebar-acma-script.php";?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
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