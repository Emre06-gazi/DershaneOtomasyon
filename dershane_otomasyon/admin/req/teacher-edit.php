<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname'])      &&
    isset($_POST['lname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['teacher_id']) &&
    isset($_POST['address'])  &&
    isset($_POST['employee_number']) &&
    isset($_POST['phone_number'])  &&
    isset($_POST['qualification']) &&
    isset($_POST['email_address']) &&
    isset($_POST['gender'])        &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['sections'])       &&
    isset($_POST['subjects'])   &&
    isset($_POST['grades'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];

    $address = $_POST['address'];
    $employee_number = $_POST['employee_number'];
    $phone_number = $_POST['phone_number'];
    $qualification = $_POST['qualification'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];

    $teacher_id = $_POST['teacher_id'];
    
    $grades = "";
    foreach ($_POST['grades'] as $grade) {
    	$grades .=$grade;
    }

    $subjects = "";
    foreach ($_POST['subjects'] as $subject) {
    	$subjects .=$subject;
    }

    $sections = "";
    foreach ($_POST['sections'] as $section) {
        $sections .=$section;
    }

    $data = 'teacher_id='.$teacher_id;

    if (empty($fname)) {
		$em  = "Ad gerekli";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Soyadı gerekli";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Kullanıcı adı gerekli";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $teacher_id)) {
		$em  = "Kullanıcı adı alınmış! başka birini dene";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($address)) {
        $em  = "Adres gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($employee_number)) {
        $em  = "Çalışan numarası gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($phone_number)) {
        $em  = "Telefon numarası gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($qualification)) {
        $em  = "Vasıf  gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "E-posta adresi gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($gender)) {
        $em  = "Cinsiyet gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($date_of_birth)) {
        $em  = "Doğum tarihi adresi gerekli";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE teachers SET
                username = ?, fname=?, lname=?, subjects=?, grades=?,
                address = ?, employee_number=?, date_of_birth = ?, phone_number = ?, qualification = ?, gender = ?, email_address = ?, section=?
                WHERE teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fname, $lname, $subjects, $grades, $address, $employee_number, $date_of_birth, $phone_number, $qualification, $gender, $email_address, $sections,        $teacher_id]);
        $sm = "Başarıyla güncellendi!";
        header("Location: ../teacher-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "Bir hata oluştu";
    header("Location: ../teacher.php?error=$em");
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
