<?php
session_start();

include 'db.php';
?>
<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8" />
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        
         

	<!-- CSS Files -->
        <link href="bootmdl/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="bootmdl/assets/css/material-kit.css" rel="stylesheet"/>
        
        <!-- jQuery Files -->
        <link rel="stylesheet" href="jQuery/jquery-ui.css">
        <script src="jQuery/jquery-3.1.0.min.js"></script>
        <script src="jQuery/jquery-ui.min.js"></script>
        
        
        
        
          <script src="customer.js"></script>
       
        
        <style>
            body{
                background-color: white;
            }
        </style>

    </head>
   
 <?php
function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
require 'navbar.php';
// require 'stockfun.php';
?>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adcus.php" class="list-group-item">Add Customer</a>
                    <a href="customer.php" class="list-group-item">Manage Customer</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                <?php
                if(isset($_POST['upcus'])){
                    
                    if (isset($_GET['cuid']) && is_numeric($_GET['cuid'])){
                    // get id value
                        $cuid = $_GET['cuid'];
                    }
                    
                    $cuname = filter_input(INPUT_POST, 'cuname');
                    $cutin = filter_input(INPUT_POST, 'cutin');
                    $cucontact = filter_input(INPUT_POST, 'cucontact');
                    $acucontact = filter_input(INPUT_POST, 'acucontact');
                    $cuemail = filter_input(INPUT_POST, 'cuemail');
                    $cuaddress = filter_input(INPUT_POST, 'cuaddress');
                    
                    $uname= $_SESSION['usname'];
                    date_default_timezone_set('Asia/Kolkata');
                    $timestamp = date('Y-m-d h:i:s');
                    if(empty($cuname)){
            ?>
            
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Category field are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            // echo "<br />";     
           
            // exit();
            }else{
            $sql = "UPDATE customer SET cuname='$cuname', cutin='$cutin', cucontact='$cucontact',"
                    . " acucontact='$acucontact', cuemail='$cuemail', cuaddress='$cuaddress',"
                    . "uby='$uname', udate='$timestamp' WHERE cuid='$cuid'";
            
            if ($conn->query($sql) === TRUE) {
        ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <p><strong>Success!</strong> Record Updated successfully.</p> 
                </div>
                <?php
                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
                }
                
                
                
                /*     Direct Delete the record
                if (isset($_GET['id']) && is_numeric($_GET['id'])){
                    // get id value
                    $id = $_GET['id'];

                    // delete the entry
                    $sql = 'DELETE FROM customer WHERE cuid='.$id;

                    if ($conn->query($sql) === TRUE) { 
                        ?>
                <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> Record Deleted successfully.
                                    </div>

                        <?php

                }   
                else {
                    echo "Error deleting record: " . $conn->error;
                    }
                }
                
                */
             
                
                // ***********************  pagination ***************************                
                $page = 0;
                if (isset($_GET["page"])) { 
                    $page  = $_GET["page"];
                        if($page==0){
                            $page = 1;
                        }

                    } else { $page=1; }; 
    
                    $start_from = ($page-1) * 10;
                $sql = "SELECT cuid, cuname, cucontact, cuemail, credit FROM customer ORDER BY credit desc LIMIT $start_from, 10";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                            
                           // count products for pagination    
                        $sqlb = "SELECT COUNT(cuid) FROM customer"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 10);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4>Customer <span class="badge"><?php echo $total_records; ?></span></h4></div>
                    
  
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                
                                <th>Credit</th>
                                
                               
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                <?php    
                
                        $c = $start_from+1;
                            
                            // output data of each row
                    
                        while($row = $result->fetch_assoc()) {
                            
                            
                            echo "<tr><td class='text-center'>".$c."</td>"
                                    . "<td><a href='#' data-toggle='modal' data-target='#myModal' class='one'>".$row['cuname']. 
                                    "</a></td>"
                                    //. "<td>" . $row['cucontact']."</td><td>".$row['cuemail']. "</td>"
                                    . "<td>Rs.".$row['credit']. "</td>".
                                    //"<td><a href='upcustomer.php?cuid=" . $row['cuid'] . "'><i class='material-icons'>mode_edit</i></a></td>".
                                    // "<td><a href='customer.php?id=" . $row['cuid'] . "'><i class='material-icons'>clear</i></a></td>
                                     "</tr>";
                           $c++;
                        }
                    }else {
                        echo "0 results";
                    }
                    ?>
                
                    </table>
                </div>
                
                
                        <nav aria-label="...">
                            <ul class="pager">
                                <?php
                                
                                    if($page <= 1){
                                        echo "<li class='disabled'><a>Previous</a></li>";
                                    }else {
                                        echo "<li><a href='customer.php?page=$pagem'>Previous</a></li>";
                                    }
                                if($page >= $total_pages){
                                    echo "<li class='disabled'><a>Next</a></li>";
                                }else{
                                    echo "<li><a href='customer.php?page=$pagea'>Next</a></li>";
                                }
                                
                                        
                                ?>
                            </ul>
                        </nav>
                
            </div>
        </div>
    </div>

    <!-- Modal for customer bills details -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
          <div id="bdata">
          
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-info ">Save</button> -->
      </div>
    </div>
  </div>
</div>
        </body>
<script>
$(document).ready(function(){
  
    $('.badge').tooltip({title: "Total Customer", placement: "right"}); 
});
</script>
    <?php
        require 'footer.php';
        