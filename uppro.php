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
                    
                    <a href="adpro.php" class="list-group-item">Add Product</a>
                    <a href="products.php" class="list-group-item">Show Products</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                
            
        <?php
      if (isset($_GET['prid']) && is_numeric($_GET['prid'])){
                    // get id value
                        $prid = $_GET['prid'];
                        $sql = 'SELECT pname, cid, pcode, pcolor, price, ptax FROM product WHERE pid='.$prid;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $pname = $row['pname'];
                                $cid = $row['cid'];
                                $pcode = $row['pcode'];
                                $pcolor = $row['pcolor'];
                                $price = $row['price'];
                                $ptax = $row['ptax'];
                            } 
                        }
                    }  
    ?>
                <form action="products.php?prid=<?php echo $prid; ?>" method="post">
           
            <div class="row">
                <div class="col-lg-offset-1 col-sm-10">
                    <h3>Update Product</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group">
                    <label>Select Category: </label>    
                    <?php

                        $sql = "SELECT cid, cname FROM category";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        // output data of each row
                    ?>
                    <select name="cid">
                    <?php
                        while($row = $result->fetch_assoc()) {
                            if($row['cid']==$cid){
                                echo "<option value=".$row['cid']." selected>".$row['cname']."</option>";
                            }else{
                                echo "<option value=".$row['cid'].">".$row['cname']."</option>";
                            }
                            
                        }
                    ?>
    
                    </select>
                    <?php     
                    }
                    ?>
                </div>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Product Name</label>
                        <input type="text" value="<?php echo $pname; ?>" class="form-control" name="pname" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Model No.</label>
                        <input type="text" value="<?php echo $pcode; ?>" class="form-control" name="pcode" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group">
                    <label>Product color: </label>
                    <?php

                        $sql = "SELECT id, name FROM color";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        // output data of each row
                    ?>
                    <select name="colid">
                    <?php
                        while($row = $result->fetch_assoc()) {
                            if($row['id']==$pcolor){
                                echo "<option value=".$row['id']." selected>".$row['name']."</option>";
                            } else {
                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                            }
                            
                        }
                    ?>
    
                    </select>
                    <?php     
                    }
                    ?>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Price</label>
                        <input type="number" value="<?php echo $price; ?>" class="form-control" name="price" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Tax</label>
                        <input type="number" value="<?php echo $ptax; ?>" class="form-control" name="ptax" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="uppro" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>
        </form>
                </div>
    </div>
</div>
  


</body>

    <?php
        require 'footer.php';
        
        
        