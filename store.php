<?php

    require 'database/QueryBuilder.php';
    $db = new QueryBuilder;
    $data = [
 
        "title" => $_POST["title"],
        "content" => $_POST["content"],
 
    ];
    $db->store("tasks", $data);

    header("Location: /"); exit;
?>