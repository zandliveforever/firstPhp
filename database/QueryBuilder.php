<?php

    class QueryBuilder {

        public $pdo;

        function __construct() {
            
            $this->pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
        }
        
        function all($table) {
        
            $sql = "SELECT * FROM $table";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            return $results;
        
        }

        function store($table, $data) {
            
            $keys = array_keys($data);
            $stringOfKeys = implode(", ", $keys);
            $placeholder = ":" . implode(", :", $keys);
            $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholder)";
            $statement = $this->pdo->prepare($sql);
            $result = $statement->execute($data);
            
        }

        function getOne($table, $id) {
            
            $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        
            return $result;
        
        }

        function update($table, $data) {
            
            $fields = '';
            foreach ($data as $key => $value) {
                $fields .=$key . "=:" . $key . ", ";
            }
            
            $fields = rtrim($fields, ", ");
            $sql = "UPDATE tasks SET $fields WHERE id=:id";
            $statement=$this->pdo->prepare($sql);
            $result = $statement->execute($data);
        
        }

        function delete($table, $id) {

            $sql = "DELETE FROM $table WHERE id=:id";
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
        
        }
        
    };

?>