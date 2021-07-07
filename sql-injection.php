<?php
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "34_db_university");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
// var_dump($conn);

if($conn && $conn->connect_error) {
    echo "Errore di connessione: " . $conn->connect_error;
} else {
    // $sql = "SELECT `students`.*
    //         FROM `students`
    //         INNER JOIN `degrees`
    //         ON `students`.`degree_id` = `degrees`.`id`
    //         WHERE `degrees`.`name` = 'Corso di Laurea in Ingegneria Informatica'
    //         ORDER BY `students`.`registration_number`;
    //         ";

    // $matricola = "620034";
    $matricola = $_GET["user"];

    // $matricola = "paperino' OR 1 -- ";

    $password = "lbellini@sorrentino.it";
    // versione suscettibile di SQL INJECTION
    // $sql = "SELECT *
    //         FROM `students`
    //         WHERE `registration_number` = '" . $matricola .
    //         "' AND `email` = '" . $password . "'";
    // $result = $conn->query($sql);

    // versione "sicura"
    $stmt = $conn->prepare("SELECT *
        FROM `students`
        WHERE `registration_number` = ? AND `email` = ?");
    $stmt->bind_param("ss", $matricola, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // var_dump($result);  
    
    if($result && $result->num_rows > 0) {
        echo "Sei loggato!";
        // echo "Ho ottenuto " . $result->num_rows . " risultati";

        // while($row = $result->fetch_assoc()) {
        //     echo $row["name"] . " " . $row["surname"] . "<br>";
        // }
    } elseif ($result) {
        echo "Non sei loggato!";
    } else {
        echo "Errore nella query";
    }

    $conn->close();
}