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
        
        <link rel="stylesheet" href="jQuery/jquery-ui.css">
        <script src="jQuery/jquery-3.1.0.min.js"></script>
        <script src="jQuery/jquery-ui.min.js"></script>
        <script  type="text/javascript" src="adbill3.js"></script>
        <script>
            function getAdd(str) {
                    if (str == "") {
                        document.getElementById("addhint").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("addhint").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","getadd.php?q="+str,true);
                        xmlhttp.send();
                    }
                }
            </script>
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
                    
                    <a href="adbill.php" class="list-group-item">Add Invoice</a>
                    <a href="bills.php" class="list-group-item">Show Invoices</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
    <?php 
        if(isset($_POST['adbill'])){
        
        $bdate = mysql_real_escape_string(filter_input(INPUT_POST, 'bdate'));
        $billno = mysql_real_escape_string(filter_input(INPUT_POST, 'billno'));
   
        $bname = mysql_real_escape_string(filter_input(INPUT_POST, 'bname'));
        
        // get customer table data for update customer's credit value
        $sql = "SELECT cuid, cuname, credit FROM customer WHERE cuname='$bname'";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                      
                        while($row = $result->fetch_assoc()) {
                            $cuid = $row['cuid'];
                            $credit = $row['credit'];
                        }
                         
                    }
                    
                // get chart tabel data for update total sale value    
                   $cmonth = date('m', strtotime($bdate));
           $sqlm = "SELECT tsale, tdue FROM chart WHERE id='$cmonth'";
                        $resultm = $conn->query($sqlm);
                        if ($resultm -> num_rows > 0) {
                      
                        while($rowm = $resultm->fetch_assoc()) {
                            $tsale = $rowm['tsale'];
                            $tdue = $rowm['tdue'];
                        }
                         
                    }         
                        
        $bamt = mysql_real_escape_string(filter_input(INPUT_POST, 'bamt'));
        
        $uname= $_SESSION['usname'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s');
        // $date = date('Y-m-d');
       
        if(empty($billno) || empty($bname) || empty($bamt)){
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
               
                
                    if (!empty($_POST['pro']) && !empty($_POST['qty']) &&
                        is_array($_POST['pro']) && is_array($_POST['qty']) &&
                        count($_POST['pro']) === count($_POST['qty'])
                        ){
                        $pro = $_POST['pro'];
                        $qty = $_POST['qty'];
                        $rate = $_POST['rate'];
                        $titems = count($pro);  // total items
               for($i=0; $i < count($pro); $i++){
                   $npro = mysql_real_escape_string($pro[$i]);
                   $nqty = mysql_real_escape_string($qty[$i]);
                   $irate = mysql_real_escape_string($rate[$i]);
                   
                   $sql = "SELECT pid, price FROM product WHERE pname='$npro'";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                      
                        while($row = $result->fetch_assoc()) {
                            $nnpro = $row['pid'];
                            $nnprice = $row['price'];
                        }
                         
                    }
                   
                   $sql = "INSERT INTO items (billno, items, qty, irate, bprice)
                            VALUES ('$billno', '$nnpro', '$nqty', '$irate','$nnprice')";

                if($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                } 
            }
        }
            
            $sql = "INSERT INTO bill (bdate, billno, total_items, cuid, bamt, dueamt, bstatus, cby, cdate)
                            VALUES ('$bdate','$billno', '$titems', '$cuid', '$bamt', '$bamt','0', '$uname', '$timestamp')";

                if($conn->query($sql) === TRUE) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> New Bill added successfully.
                    </div>
            <?php
            
                // Add bill amount in customer table credit
                    $credit += $bamt;
                     $sql = "UPDATE customer SET credit='$credit', uby='$uname', udate='$timestamp' WHERE cuid='$cuid'";
                        if ($conn->query($sql) === TRUE) {
        
                            } else{
                                   echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            
                // Add bill amount in chart table
                          $tsale += $bamt;
                          $tdue += $bamt;
                    $sqlch = "UPDATE chart SET tsale='$tsale', tdue='$tdue' WHERE id='$cmonth'";
                        if ($conn->query($sqlch) === TRUE) {
        
                            } else{
                                   echo "Error: " . $sqlch . "<br>" . $conn->error;
                            } 
                          
                            
                            
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    ?>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
           <div class="row">
                <div class="col-lg-offset-1 col-sm-8">
                   <h3>Add New Invoice</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Invoice Date</label>
                        <input class="form-control" id="datepicker" type="text" value="" name="bdate"  />
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Invoice No.</label>
                        <input type="text" value="" class="form-control" name="billno" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <div class="ui-widget">
                            <label class="control-label">Customer</label>
                            <input type="text" value="" id="cus" class="form-control" name="bname" onkeyup='getAdd(this.value)' />
                        </div>
                    </div>
                </div>      
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div id="addhint"></div>
                </div>
            </div>
            <br>
           <div class="row">
               <div class="col-lg-offset-1 col-sm-10">
               <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        
                        <tbody id="plus">
                            <tr>
                                <td>
                                    <input type="text" id="pro" placeholder="Item" name="pro[]" onkeyup='getPrice(this.value)' />
                                </td>
                                <td>
                                    <input type="number" value="1" placeholder="Quantity"  id='qty0' name="qty[]" onkeyup='amt(this.value)' />
                                </td>
                                <td>
                                    <div id='txtHint0'><input type='text' value='' id='pri0' placeholder='Rate' name="rate[]" onkeyup='pamt(this.value)' /></div>
                                </td>
                                <td>
                                    <div id='total0'><input type="text" id="ntotal" name="amt[]"></div>
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
                        <hr>      
                </div> 
                
            </div>
              
           <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Amount</label>
                        <input type="text" value="" class="form-control" name="bamt" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <button type="submit" name="adbill" class="btn btn-raised btn-primary btn-wd">Submit</button>
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