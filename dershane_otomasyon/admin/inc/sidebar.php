        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper" style="border-bottom-right-radius: 15px;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
            <a class="sidebar-heading navbar-brand m-5" style="width: 500px;" href="index.php">
					<img src="../logo.png" width="100px">
			    </a>
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">EK Egitim</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa fa-home m-2" aria-hidden="true"></i> Anasayfa</a>
                
                <?php if ($_SESSION['role'] == 'Admin') {?>
                <a href="teacher.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-light fa-user m-2"></i>Ögretmenler</a>
                <?php } ?>

                
                <?php if ($_SESSION['role'] == 'Teacher' || $_SESSION['role'] == 'Admin') {?>
                <a href="student.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-solid fa-graduation-cap m-2"></i>Öğrenciler</a>
                 <?php } ?>
                <a href="exam.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-regular fa-clipboard m-2"></i>Deneme Sınavları</a>
                <a href="grade.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa fa-cubes m-2"></i>Sınıf</a>
                <a href="section.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa fa-columns m-2" ></i>Bölüm</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-power-off m-2"></i>Çıkış</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->