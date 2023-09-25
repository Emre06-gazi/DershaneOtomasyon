<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['username']) &&
    isset($_POST['pass'])     &&
    isset($_POST['address'])  &&
    isset($_POST['employee_number']) &&
    isset($_POST['phone_number'])  &&
    isset($_POST['qualification']) &&
    isset($_POST['email_address']) &&
    isset($_POST['gender'])        &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['section'])       &&
    isset($_POST['subjects'])      &&
    isset($_POST['grades'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

    $address = $_POST['address'];
    $employee_number = $_POST['employee_number'];
    $phone_number = $_POST['phone_number'];
    $qualification = $_POST['qualification'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];

    $grades = "";
    foreach ($_POST['grades'] as $grade) {
    	$grades .=$grade;
    }

    $subjects = "";
    foreach ($_POST['subjects'] as $subject) {
    	$subjects .=$subject;
    }

    $sections = "";
    foreach ($_POST['section'] as $section) {
        $sections .=$section;
    }

    $data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&address='.$address.'&en='.$employee_number.'&pn='.$phone_number.'&qf='.$qualification.'&email='.$email_address;

    if (empty($fname)) {
		$em  = "Adı gerekli";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Soyadı gerekli";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Kullanıcı adı gerekli";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "Kullanıcı adı alınmış! başka birşey dene";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Şifre gereklidir";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($address)) {
        $em  = "Adres gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($employee_number)) {
        $em  = "Çalışan numarası gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($phone_number)) {
        $em  = "Telefon numarası gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($qualification)) {
        $em  = "Vasıf gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "E-posta adresi gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($gender)) {
        $em  = "Cinsiyet gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($date_of_birth)) {
        $em  = "Doğum tarihi adresi gerekli";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($pass)) {
        $em  = "Şifre gereklidir";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else {

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 teachers(username, password, fname, lname, subjects, grades, section, address, employee_number, date_of_birth, phone_number, qualification, gender, email_address)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $subjects, $grades, $sections, $address, $employee_number, $date_of_birth, $phone_number, $qualification, $gender, $email_address]);
        $sm = "Yeni öğretmen Başarıyla kaydedildi.";
        header("Location: ../teacher-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Bir hata oluştu";
    header("Location: ../teacher-add.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
