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
// require 'stockfun.php';
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
      if (isset($_GET['cuid']) && is_numeric($_GET['cuid'])){
                    // get id value
                        $cuid = $_GET['cuid'];
                        $sql = 'SELECT cuname, cutin, cucontact, acucontact, cuemail, cuaddress FROM customer WHERE cuid='.$cuid;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $cuname = $row['cuname'];
                                $cutin = $row['cutin'];
                                $cucontact = $row['cucontact'];
                                $acucontact = $row['acucontact'];
                                $cuemail = $row['cuemail'];
                                $cuaddress = $row['cuaddress'];
                            } 
                        }
                    }  
    ?>
                <form action="customer.php?cuid=<?php echo $cuid; ?>" method="post">
           
            <div class="row">
                <div class="col-lg-offset-1 col-sm-10">
                    <h3>Update Customer</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Customer Name</label>
                        <input type="text" value="<?php echo $cuname; ?>" class="form-control" name="cuname" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Tin No.</label>
                        <input type="number" value="<?php echo $cutin; ?>" class="form-control" name="cutin" />
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Contact No.</label>
                        <input type="number" value="<?php echo $cucontact; ?>" class="form-control" name="cucontact" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Contact No. 2</label>
                        <input type="number" value="<?php echo $acucontact; ?>" class="form-control" name="acucontact" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Email</label>
                        <input type="email" value="<?php echo $cuemail; ?>" class="form-control" name="cuemail" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Address</label>
                        <textarea type="text" value="" class="form-control" name="cuaddress" cols="5"><?php echo $cuaddress; ?></textarea>
                    </div>
                </div>
            </div>
                    
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="input-group">
                        <button type="submit" name="upcus" class="btn btn-raised btn-primary btn-wd">Update</button>
                    </div>
                </div>
            </div>
        </form>
                </div>
    </div>
</div>
  


</body>

    <?php
        require 'footer.php';
        
        
        