<?php
session_start();
include 'db.php';

function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();


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
        
        <script type="text/javascript" src="addstock.js"></script>
       
          
        <style>
            body{
                background-color: white;
            }
        </style>

    </head>

<body>
    <?php require 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adstock.php" class="list-group-item">Add Stock</a>
                    <a href="stockIssue.php" class="list-group-item">Issue Stock</a>
                    <a href="return-form.php" class="list-group-item">Return</a>
                    <a href="return-form.php" class="list-group-item">Replace</a>
                    <a href="return-form.php" class="list-group-item">Damages</a>
                     <a href="currentStock.php" class="list-group-item">Current Stock</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-10">
        <?php 
    
        if(isset($_POST['adstock'])){
            $asdate = mysql_real_escape_string(filter_input(INPUT_POST, 'asdate'));
            $asname = mysql_real_escape_string(filter_input(INPUT_POST, 'asname'));
            $uname= $_SESSION['usname'];
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date('Y-m-d h:i:s');
            // $date = date('Y-m-d');
       
             if(empty($_POST['pro']) && empty($_POST['qty']) &&
                        is_array($_POST['pro']) && is_array($_POST['qty']) &&
                        count($_POST['pro']) === count($_POST['qty'])
                        ){
                ?>
                <div class="alert alert-danger" role="alert">
                    <div class='alert-icon'>
                        <i class='material-icons'>error_outline</i>
                    </div>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                    </button>
                    <span class="sr-only">Error:</span>
                        Error! Some fields are empty. Please fill the required details.
                </div>
                  
                <?php
            
                }else{
                    $sql = "INSERT INTO addstock (addStockDate, asname, uby, udate)
                            VALUES ('$asdate','$asname','$uname', '$timestamp')";
                    if($conn->query($sql) === TRUE) {
                        $asID = $conn->insert_id;
                ?>
                
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> Stock Issued successfully.
                    </div>
                <?php
                    $pro = $_POST['pro'];
                    $qty = $_POST['qty'];
                    $titems = count($pro);  // total items
                    
                    for($i=0; $i < count($pro); $i++){
                        $npro = mysql_real_escape_string($pro[$i]);
                        $nqty = mysql_real_escape_string($qty[$i]);
                        $sql = "SELECT pid, pname FROM product WHERE pname='$npro'";
                        $result = $conn->query($sql);
                        
                        if ($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $nnpro = $row['pid'];
                            }
                        }
                   
                        $sql = "INSERT INTO addstockitem (asID, asItem, qty)
                            VALUES ('$asID', '$nnpro', '$nqty')";

                        if($conn->query($sql) === FALSE) {
                           echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        $sql = "SELECT qty FROM current_stock WHERE pid='$nnpro'";
                        $result = $conn->query($sql);
                        
                        if ($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $currentQty = $row['qty'];
                            }
                        }
                        
                        $total = $nqty + $currentQty;
                        
                        $sql = "UPDATE current_stock SET qty='$total' where pid='$nnpro'";

                        if($conn->query($sql) === FALSE) {
                           echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                
            }
        }
    ?>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
           <div class="row">
                <div class="col-lg-offset-1 col-sm-11">
                   <h3>Add Stock</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Date</label>
                        <input class="form-control" id="datepicker" type="text" value="" name="asdate"  />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" value="" name="asname"  />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <br>
            </div>        
                        
                   
            <div class="row">
               <div class="col-lg-offset-1 col-sm-6">
               <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody id="plus">
                            <tr>
                                <td>
                                    <input type="text" id="pro" placeholder="Item"  name="pro[]" />
                                </td>
                                <td>
                                    <input type="number" value="1" placeholder="Quantity" name="qty[]" />
                                </td>
                            </tr>
                       
                    </tbody>
               </table>
           </div>
           </div>
            
            <div class="row">
               <div class="col-lg-offset-1 col-sm-10">
                    <span class="input-group"  id="tom">
                        <div class="form-group">
                            <a href="javascript:void(0);"><i class="material-icons">add_circle</i> Add Item</a>
                        </div>
                    </span>          
                   <hr />
                </div> 
                
            </div>
               
            
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="adstock" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>  
        </form>
    </div>
        </div>
    </div>


<footer class="footer">
		<div class="container">
		   
                    <div class="copyright pull-right">
		        &copy; 2016, made with <i class="fa fa-heart heart"></i> by 
                        <a href="index.php">MPTC</a>
		    </div>
		</div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files 
	<script src="bootmdl/assets/js/jquery.min.js" type="text/javascript"></script> -->
	<script src="bootmdl/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="bootmdl/assets/js/material.min.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="bootmdl/assets/js/nouislider.min.js" type="text/javascript"></script>
        
        <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="bootmdl/assets/js/material-kit.js" type="text/javascript"></script>    

        
</html>

