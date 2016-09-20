<?php
session_start();
require 'header.php';
function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
require 'navbar.php';

include 'db.php';
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adcus.php" class="list-group-item">Add Customer</a>
                    <a href="customer.php" class="list-group-item">Show Customer</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
    <?php 
        if(isset($_POST['adcus'])){
        
        $cuname = mysql_real_escape_string(filter_input(INPUT_POST, 'cuname'));
        $cutin = mysql_real_escape_string(filter_input(INPUT_POST, 'cutin'));
        $cucontact = mysql_real_escape_string(filter_input(INPUT_POST, 'cucontact'));
        $acucontact = mysql_real_escape_string(filter_input(INPUT_POST, 'acucontact'));
        $cuemail = mysql_real_escape_string(filter_input(INPUT_POST, 'cuemail'));
        $cuaddress = mysql_real_escape_string(filter_input(INPUT_POST, 'cuaddress'));
        
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
                Error! Some fields are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            
           }else{
            $sql = "INSERT INTO customer (cuname, cutin, cucontact, acucontact, cuemail, cuaddress, cby, cdate)
            VALUES ('$cuname','$cutin', '$cucontact', '$acucontact','$cuemail', '$cuaddress', '$uname', '$timestamp')";

                if($conn->query($sql) === TRUE) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> Details Added successfully.
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
                   <h3>Add New Customer </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Customer Name</label>
                        <input type="text" value="" class="form-control" name="cuname" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Tin No.</label>
                        <input type="number" value="" class="form-control" name="cutin" />
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Contact No.</label>
                        <input type="number" value="" class="form-control" name="cucontact" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Contact No. 2</label>
                        <input type="number" value="" class="form-control" name="acucontact" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Email</label>
                        <input type="email" value="" class="form-control" name="cuemail" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Address</label>
                        <textarea type="text" value="" class="form-control" name="cuaddress" cols="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="adcus" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>  
        </form>
    </div>
    </div>
</div>
        



</body>

    <?php
        require 'footer.php';