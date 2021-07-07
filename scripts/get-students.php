<?php
require_once __DIR__ . "/database.php";

$sql = "SELECT `students`.*
        FROM `students`
        INNER JOIN `degrees`
        ON `students`.`degree_id` = `degrees`.`id`
        WHERE `degrees`.`name` = 'Corso di Laurea in Ingegneria Informatica'
        ORDER BY `students`.`registration_number`
        LIMIT 40, 20;";
$result = $conn->query($sql);

$students = [];
while($row = $result->fetch_assoc()) {
    $students[] = $row;
}
// var_dump($students);