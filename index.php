<?php require_once __DIR__ . "/scripts/get-students.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Studenti di Ingegneria Informatica</title>
</head>
    <body>
        <?php include __DIR__ . "/partials/header.php"; ?>

        <main class="table-responsive px-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!-- <?php 
                            $firstStudent = $students[0];

                            foreach ($firstStudent as $key => $value) {
                        ?>
                            <th><?= $key; ?></th>
                        <?php } ?> -->

                        <th>Matricola</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Data di iscrizione</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student) { ?>
                        <tr>
                        <!-- <?php foreach($student as $value) { ?>
                            <td><?= $value; ?></td>     
                        <?php } ?> -->
                        <td><?= $student["registration_number"]; ?></td>
                        <td><?= $student["name"]; ?></td>
                        <td><?= $student["surname"]; ?></td>
                        <td><?= $student["enrolment_date"]; ?></td>
                        <td><?= $student["email"]; ?></td>
                        <td>
                            <a href="booklet.php?id=<?= $student["id"] ?>" class="btn btn-primary">Libretto</a>
                        </td>                            
                        </tr>   
                    <?php } ?>            
                </tbody>
            </table>
        </main>
    </body>
</html>