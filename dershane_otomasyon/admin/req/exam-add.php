
<?php 

session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	


    
    include '../../DB_connection.php';
    include "../data/student.php";

    $exam_id = $_POST['exam_id'];
    $exam_name = $_POST['exam_name'];
    $student_ids = $_POST['student_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $student_mark = $_POST['student_mark'];

    

    if (empty($exam_id)) {
		$em  = "Sınav ID gerekli";
		header("Location: ../exam-add.php?error=$em&$data");
    exit;
    }else if (empty($exam_name)) {
      $em  = "Sınav adı gerekli";
      header("Location: ../exam-add.php?error=$em&$data");
		exit;
	}else {

        $sql  = "INSERT INTO
                 exams(exam_id, exam_name, student_id, grade_id, section_id, student_mark, fname, lname)
                 VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        
        $i = 0; 
        foreach ($student_ids as $student_id ) { 
            
            $stmt->execute([$exam_id, $exam_name, $student_ids[$i], $grade[$i], $section[$i], $student_mark[$i], $fname[$i], $lname[$i]]);
            $i++;
        }

        $sm = "Yeni Sınav Başarıyla eklendi!";
        header("Location: ../exam-add.php?success=$sm");
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

