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
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="list-group">
                    
                    <a href="adseller.php" class="list-group-item">Add Seller</a>
                    <a href="seller.php" class="list-group-item">Show Sellers</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-9">
                
            
        <?php
      if (isset($_GET['slid']) && is_numeric($_GET['slid'])){
                    // get id value
                        $slid = $_GET['slid'];
                        $sql = 'SELECT sname, scontact, sdetails FROM seller WHERE sid='.$slid;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $sname = $row['sname'];
                                $scontact = $row['scontact'];
                                $sdetails = $row['sdetails'];
                            } 
                        }
                    }  
    ?>
                <form action="seller.php?slid=<?php echo $slid; ?>" method="post">
           
            <div class="row">
                <div class="col-lg-offset-1 col-sm-10">
                    <h3>Update Seller</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Seller Name</label>
                        <input type="text" value="<?php echo $sname; ?>" class="form-control" name="sname" />
                    </div>
                </div>      
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Contact No.</label>
                        <input type="number" value="<?php echo $scontact; ?>" class="form-control" name="scontact" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Seller Details</label>
                        <textarea class="form-control" rows="5" name="sdetails"><?php echo $sdetails; ?></textarea>
                    </div>
                </div>
            </div>
                    
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="input-group">
                        <button type="submit" name="upsel" class="btn btn-raised btn-primary btn-wd">Update</button>
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
        
        
        