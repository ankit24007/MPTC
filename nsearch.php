<?php
   include 'db.php';
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT pname FROM product WHERE pname LIKE '%".$searchTerm."%' ORDER BY pname ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['pname'];
    }
    
    //return json data
    echo json_encode($data);
