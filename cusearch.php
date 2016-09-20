<?php
   include 'db.php';
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT * FROM customer WHERE cuname LIKE '%".$searchTerm."%' ORDER BY cuname ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['cuname'];
    }
    
    //return json data
    echo json_encode($data);
