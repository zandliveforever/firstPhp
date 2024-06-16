<?php

    require 'database/QueryBuilder.php';
    $db = new QueryBuilder;
    $id = $_GET["id"];
    $task = $db->getOne("tasks", $id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $task['title'];?></h1>
                <p><?= $task['content'];?></p>
                <a href="/" class="btn btn-success">Go back</a>              
            </div>
        </div>
    </div>
</body>
</html>