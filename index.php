<?php

  require 'database/QueryBuilder.php';
  $db = new QueryBuilder;
  $tasks = $db->all("tasks");

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
        
        <h1>All Tasks</h1>
        <a href="create.php" class="btn btn-success">Add task</a>
        <table class="table">
            
            <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Actions</th>
            </tr> 
            </thead>

            <tbody>
              <?php foreach($tasks as $task):?>
              <tr>
                <td><?= $task['id'];?></td>
                <td><?= $task['title']?></td>
                  <td>
                    <a href="show.php?id=<?= $task['id'];?>" class="btn btn-info">Show</a>
                    <a href="edit.php?id=<?= $task['id'];?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?= $task['id'];?>" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
      </div>
    
    </div>
  
  </div>
</body>
</html>