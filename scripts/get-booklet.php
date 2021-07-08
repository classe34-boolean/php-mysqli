<?php
require_once __DIR__ . "/database.php";

// possibile ottimizzazione: sostituire query() con Prepared Statement
// $sql = "SELECT 
//     `students`.`name`, `students`.`surname`,
//     `students`.`registration_number`, 
//     `courses`.`id`, 
//     `courses`.`name` AS `course_name`,
//     `exams`.`date`, 
//     `exam_student`.`vote`
//     FROM `exam_student`
//     JOIN `students` ON `exam_student`.`student_id` = `students`.`id`
//     JOIN `exams` ON `exam_student`.`exam_id` = `exams`.`id`
//     JOIN `courses` ON `exams`.`course_id` = `courses`.`id`
//     WHERE `students`.`id` = ".$_GET["id"] . "
//     AND `exam_student`.`vote` >= 18";
// $result = $conn->query($sql);

// versione Prepared Statement
$stmt = $conn->prepare("SELECT 
    `students`.`name`, `students`.`surname`,
    `students`.`registration_number`, 
    `courses`.`id`, 
    `courses`.`name` AS `course_name`,
    `exams`.`date`, 
    `exam_student`.`vote`
    FROM `exam_student`
    JOIN `students` ON `exam_student`.`student_id` = `students`.`id`
    JOIN `exams` ON `exam_student`.`exam_id` = `exams`.`id`
    JOIN `courses` ON `exams`.`course_id` = `courses`.`id`
    WHERE `students`.`id` = ?
    AND `exam_student`.`vote` >= 18");

$stmt->bind_param("s", $_GET["id"]);    	
$stmt->execute();
$result = $stmt->get_result();

$exams = [];
while($row = $result->fetch_assoc()) {
    $exams[] = $row;
}