<?php
session_start();
include 'db.php';
require 'header.php';
function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
require 'navbar.php';

?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adseller.php" class="list-group-item">Add Seller</a>
                    <a href="seller.php" class="list-group-item">Show Seller</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                
            
        
    <?php 
        if(isset($_POST['adseller'])){
        
        $sname = mysql_real_escape_string(filter_input(INPUT_POST, 'sname'));
        $scontact = mysql_real_escape_string(filter_input(INPUT_POST, 'scontact'));
        $sdetails = mysql_real_escape_string(filter_input(INPUT_POST, 'sdetails'));
        
        $uname= $_SESSION['usname'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s');
       
        if(empty($sname)){
                ?>
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Seller name field are empty. Please fill seller name.
            </div>
                  
       <?php
            
           }else{
            $sql = "INSERT INTO seller (sname, scontact, sdetails, cby, cdate)
            VALUES ('$sname','$scontact', '$sdetails', '$uname', '$timestamp')";

                if($conn->query($sql) === TRUE) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> New Seller details added successfully.
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
                <div class="col-lg-offset-1 col-sm-11">
                   <h3>Add Seller</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Seller Name</label>
                        <input type="text" value="" class="form-control" name="sname" />
                    </div>
                </div>      
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Contact No.</label>
                        <input type="number" value="" class="form-control" name="scontact" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Seller Details</label>
                        <textarea class="form-control" rows="5" name="sdetails"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="adseller" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>  
        </form>
    </div>
</div>
</div>
    

<?php

require 'footer.php';


