<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = 'contacts';
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if($conn->select_db($dbname) === false){
        $sql  = "CREATE DATABASE IF NOT EXISTS contacts";
        
        if($conn->query($sql) ===TRUE){
            $conn->select_db($dbname);
            $sql = "CREATE TABLE contact_info (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                tel int NOT NULL,
                comment VARCHAR(500) NOT NULL
                )";
            if($conn->query($sql) === false){
                echo "Error creating database: " . $db->error;
            }
        } else {
            echo "Error creating database: " . $db->error;
        }
    }
?>