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
                <h1>Edit Task</h1>
                <form action="update.php?id=<?= $task['id'];?>" method='post'>

                <!-- <input type="text" name='id' value="*id*"> -->

                    <div class="form-group">
                        <input name="title" type="text" class="form-control" value='<?=$task['title'];?>'>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control"><?=$task['content'];?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>