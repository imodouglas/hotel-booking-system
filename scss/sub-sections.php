<?php
    include 'conn.php';

    $table = $_GET['sec'];

    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();
    
    echo json_encode($result);
?>
