<?php
include 'db.php';
$sql = "SELECT month, tsale, treceived FROM chart";
        $result = $conn->query($sql);
        $table = array();
        $table['cols'] = array(array('label' => 'Month', 'type' => 'string'),
                                array('label' => 'Total Sale', 'type' => 'number'),
                                
                                array('label' => 'Total Received', 'type' => 'number'));
        
        $rows= array();
        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                $temp = array();
	
                if($row['tsale'] || $row['treceived'] != 0){
                    // each column needs to have data inserted via the $temp array
                    $temp[] = array('v' => $row['month']);
                    $temp[] = array('v' => $row['tsale']);

                    $temp[] = array('v' => $row['treceived']);
                    // etc...
	
                    // insert the temp array into $rows
                    $rows[] = array('c' => $temp);
                }
                    
            }
        }
        
        $table['rows'] = $rows;
        $jtable =  json_encode($table);
        echo $jtable;
     