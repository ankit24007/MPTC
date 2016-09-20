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
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	 <script src="pay.js"></script>
         <script src="addbill.js"></script>
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
        <script>
            $(function() {
                $('#datepicker').datepicker({ 
                    dateFormat: 'yy-mm-dd'
                }).datepicker('setDate', new Date());
                
            });
            
            // cheque date
            $(document).on('focus.datepicker', '.po', function() {
                $( "#datepicker2" ).datepicker({ 
                    dateFormat: 'yy-mm-dd'
                }).datepicker('setDate', new Date());
            });
                
                function showUser(str) {
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
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
                                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","getbillid.php?q="+str,true);
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
                    <a href="adpay.php" class="list-group-item">Add Payment</a>
                    <a href="payments.php" class="list-group-item">Show Payments</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
    <?php 
        if(isset($_POST['adpay'])){
        
        $date = mysql_real_escape_string(filter_input(INPUT_POST, 'date'));
        $cuname = mysql_real_escape_string(filter_input(INPUT_POST, 'cuname'));
        
        $sql = "SELECT cuid, cuname, credit FROM customer WHERE cuname='$cuname'";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                      
                        while($row = $result->fetch_assoc()) {
                            $cuid = $row['cuid'];
                            $credit = $row['credit'];
                        }
                         
                    }
                    
                    
                    $month = date('m', strtotime($date));
                    $sqlch = "SELECT treceived FROM chart WHERE id='$month'";
                        $resultch = $conn->query($sqlch);
                        if ($resultch -> num_rows > 0) {
                      
                        while($rowch = $resultch->fetch_assoc()) {
                            $treceived = $rowch['treceived'];
                            
                        }
                         
                    }
                    
        $billno = mysql_real_escape_string(filter_input(INPUT_POST, 'billno'));
        $pytype = mysql_real_escape_string(filter_input(INPUT_POST, 'pytype'));
        $tamt = mysql_real_escape_string(filter_input(INPUT_POST, 'tamt'));
        $tbank = mysql_real_escape_string(filter_input(INPUT_POST, 'tbank'));
        $refno = mysql_real_escape_string(filter_input(INPUT_POST, 'refno'));
        $pdate = mysql_real_escape_string(filter_input(INPUT_POST, 'pdate'));
        
        $uname= $_SESSION['usname'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s');
        // $date = date('Y-m-d');
       
        if(empty($tamt)){
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
                     if(!empty($_POST['bnid']) && !empty($_POST['getpay']) &&
                        is_array($_POST['bnid']) && is_array($_POST['getpay']) &&
                        count($_POST['bnid']) === count($_POST['getpay'])
                        ){
                        $bnid = $_POST['bnid'];
                        $getpay = $_POST['getpay'];
                        
                        for($i=0; $i < count($bnid); $i++){
                            $nbnid = mysql_real_escape_string($bnid[$i]);
                            $ngetpay = mysql_real_escape_string($getpay[$i]);
                            $dueamt = 0;
                            $sql = "SELECT bamt, dueamt FROM bill WHERE billno='$nbnid'";
                                $result = $conn->query($sql);
                                if ($result -> num_rows > 0) {
                                    
                                while($row = $result->fetch_assoc()) {
                                     $dueamt = $row['dueamt'];
                                     $nbamt = $row['bamt'];
                                }
                            }
                            $dueamt -= $ngetpay;
                            $status = 0;
                            if($dueamt == 0){
                                $status = 1;
                            } else if($dueamt != $nbamt){
                                $status = 2;
                            }
                            $sqlbi = "UPDATE bill SET dueamt='$dueamt', bstatus='$status', uby='$uname', udate='$timestamp' WHERE billno='$nbnid'";
                                if ($conn->query($sqlbi) === TRUE) {
        
                                } else{
                                   echo "Error: " . $sqlbi. "<br>" . $conn->error;
                                }
                                
                    
                            }
                        }
        
                        // add received amount in chart table
                        $treceived += $tamt;
                        $sqlh = "UPDATE chart SET treceived='$treceived' WHERE id='$month'";
                        if ($conn->query($sqlh) === TRUE) {
        
                            } else{
                                   echo "Error: " . $sqlh. "<br>" . $conn->error;
                            }
                        
                    // deduct due amount from customer table credit
                    $credit -= $tamt;
                     $sqlcu = "UPDATE customer SET credit='$credit', uby='$uname', udate='$timestamp' WHERE cuid='$cuid'";
                        if ($conn->query($sqlcu) === TRUE) {
        
                            } else{
                                   echo "Error: " . $sqlcu . "<br>" . $conn->error;
                            }
                        
               
                    $sql = "INSERT INTO paytype (date, type, bank, refnum, cby, cdate) "
                            . "VALUES ('$pdate', '$pytype','$tbank','$refno', '$uname', '$timestamp')";
                    
                    if($conn->query($sql) === TRUE) {
                        $pyTypeID = $conn->insert_id;
                    }
               
               $sql = "INSERT INTO payment (date, cuid, billno, pytype, amt, cby, cdate)
            VALUES ('$date', '$cuid', '$billno', '$pyTypeID', '$tamt', '$uname', '$timestamp')";

                if($conn->query($sql) === TRUE) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> Transaction added successfully.
                    </div>
            <?php
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    ?>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
           <div class="row">
                <div class="col-lg-offset-1 col-sm-9">
                   <h3>New Transaction</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Transaction Date</label>
                        <input class="form-control" id="datepicker" type="text" value="" name="date" />
                    </div>
                </div>      
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <div class="ui-widget">
                            <label class="control-label">Customer</label>
                            <input type="text" value="" id="cus" class="form-control" name="cuname" onkeyup="showUser(this.value)" />
                        </div>
                    </div>
                </div>      
            </div>
           
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label ">Amount Received</label>
                        <input type="text" value="" class="form-control" name="tamt" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group">
                        <label>Payment Type: </label>    

                        <select name="pytype" id="tomm" style="width:345px">
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="NEFT">NEFT</option>    
                        </select>
                    </div>                    
                </div>
            </div>
            
             <div class="row">
                 <div class="col-lg-offset-1 col-sm-4">
                    <div id="pluss"></div> 
                 </div>
                    
                
            </div>
            
             <br>
             
             
            <!-- get bill no from getbillid.php  -->
            
            <div class="row">
               <div class="col-lg-offset-1 col-sm-10">
               <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice Number</th>
                                <th>Invoice Amount</th>
                                <th>Amount Due</th>
                                <th>Payment</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody id="txtHint">
                           
                        </tbody>
               </table>
               </div>
                
            </div>
           
         
            
            
            
           
            
            
            
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="adpay" class="btn btn-raised btn-primary btn-wd">Submit</button>
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