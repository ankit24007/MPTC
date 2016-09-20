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
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="bill.js"></script>
        <script>
            $(function() {
                $('#datepicker').datepicker({ 
                    dateFormat: 'yy-mm-dd'
                });
                
            
                $('#datepicker2').datepicker({ 
                    dateFormat: 'yy-mm-dd'
                });
                
            });
         
        </script>
          
        <style>
            body{
                background-color: white;
            }
        </style>

    </head>


<body>
    <?php require 'navbar.php'; ?>
    <div class="container">
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        Select Date
                    </div>
                </div>
                
            <div class="col-sm-2">
                <div class="form-group label-floating">
                    <label class="control-label">From</label>
                    <input class="form-control" id="datepicker" type="text" value="" name="rdate1"  />
                </div>
            </div>
            
            <div class=" col-sm-2">
                <div class="form-group label-floating">
                    <label class="control-label">To</label>
                    <input class="form-control" id="datepicker2" type="text" value="" name="rdate2"  />
                </div>
            </div>
                <div class="col-sm-4">
                    <div class="form-group label-floating">
                             <button type="submit" name="rd" class="btn btn-raised btn-primary btn-sm">Submit</button>
                    </div>
                   
                </div> 
        </div>
            
        </form>
        
        <?php
            if(isset($_POST['rd'])){
                $rdate1 = mysql_real_escape_string(filter_input(INPUT_POST, 'rdate1'));
                $rdate2 = mysql_real_escape_string(filter_input(INPUT_POST, 'rdate2'));
                
                ?>
        
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                
                    
                <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h4>Sales Report 
                    <small> &nbsp; &nbsp; (<?php echo $newDate = date("d-m-Y", strtotime($rdate1));?>&nbsp;  
                           -&nbsp; <?php echo $newDate2 = date("d-m-Y", strtotime($rdate2));?>) 
                    </small>
                </h4>
                <h6><?php  
                        date_default_timezone_set('Asia/Calcutta'); 
                        echo date('d M Y ( h:i A )'); 
                        ?>
                </h6>
            </div>
                <table class="table table-hover table-striped">
            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Products</th>
                    <th>Total Sales</th>
                    <th>Price</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pid=0;
                 $sql = "SELECT pid FROM product";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        // output data of each row
                    
                        while($row = $result->fetch_assoc()) {
                            $pid = $row['pid'];
                        }
                    } else {
                        echo "No records Found.";
                    }
                    
                    $fprice = 0;
                    $tsales = 0;
                for($i=1; $i<=$pid;$i++){
                    $sql = "SELECT product.pname, SUM(items.qty) AS sumqty, items.bprice  FROM bill INNER JOIN items ON bill.billno = items.billno 
                        INNER JOIN product ON items.items = product.pid 
                        where  bill.bdate >= '$rdate1' AND bill.bdate <= '$rdate2' AND product.pid = $i";
                    
                    $result = $conn->query($sql);
                     
                    if ($result->num_rows > 0) {
                        ?>
                <?php
                        while($row = $result->fetch_assoc()) {
                            $tprice = $row['sumqty'] * $row['bprice'];
                            if($row['sumqty']!=0){
                                echo "<tr><td>". $i ."</td><td>". $row['pname']. "</td><td>". $row['sumqty']. "</td><td>". $row['bprice']. "</td><td>". $tprice. "</td></tr>";
                            $tsales += $row['sumqty'];
                            $fprice += $tprice;
                            }
                             
                            
                        }
                        ?>
                        
                       
                        <?php
                    } else {
                          echo "No records Found.";
                    }
                }
                    
                ?>
                <tr>
                            <td>-</td>
                            <th>Total</th>
                            <th><?php echo $tsales; ?></th>
                            <td>-</td>
                            <th><?php echo $fprice; ?></th>
                        </tr>
            </tbody>
            
             
        </table>
            </div>
            
        <?php
            }
        ?>
              <button onclick="window.print()" class="btn btn-raised btn-default">Print</button>  
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

