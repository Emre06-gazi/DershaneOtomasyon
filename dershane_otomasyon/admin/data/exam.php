<?php  

// Tüm Sınavlar
function getAllTrial($conn){
   $sql = "SELECT * FROM trial_exam";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $trial_exam = $stmt->fetchAll();
     return $trial_exam;
   }else {
    return 0;
   }
}

// Farklı Sınav IDleri
function getUniqueTrial($conn){
  $sql = "SELECT DISTINCT exam_id, exam_name FROM exams";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $unique_exam = $stmt->fetchAll();
    return $unique_exam;
  }else {
   return 0;
  }
}

// ID'ye göre bölüm al
function getSectioById($grade_id, $conn){
   $sql = "SELECT * FROM exams WHERE exam_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$grade_id]);

   if ($stmt->rowCount() != 0) {
     $grade = $stmt->fetchAll();
     return $grade;
   }else {
    return 0;
   }
}