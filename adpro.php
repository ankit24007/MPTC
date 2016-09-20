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
                    <a href="adcat.php" class="list-group-item">Add Category</a>
                    <a href="adpro.php" class="list-group-item">Add Product</a>
                    <a href="category.php" class="list-group-item">Show Categories</a>
                    <a href="products.php" class="list-group-item">Show Products</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
    <?php 
        if(isset($_POST['adpro'])){
        
        $pname = mysql_real_escape_string(filter_input(INPUT_POST, 'pname'));
        $cid = mysql_real_escape_string(filter_input(INPUT_POST, 'cid'));
        $pcode = mysql_real_escape_string(filter_input(INPUT_POST, 'pcode'));
        $pcolor = mysql_real_escape_string(filter_input(INPUT_POST, 'colid'));
        $price = mysql_real_escape_string(filter_input(INPUT_POST, 'price'));
        $ptax = mysql_real_escape_string(filter_input(INPUT_POST, 'ptax'));
        $uname= $_SESSION['usname'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s');
       
        if(empty($pname) || empty($price) || empty($ptax)){
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
            $sql = "INSERT INTO product (pname, cid, pcode, pcolor, price, ptax, cby, cdate)
            VALUES ('$pname','$cid', '$pcode', '$pcolor', '$price', '$ptax', '$uname', '$timestamp')";

                if($conn->query($sql) === TRUE) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> New Product Added successfully.
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
                <div class="col-lg-offset-1 col-sm-5">
                   <h3>Add Product</h3>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group">
                    <label>Select Category: </label>    
                    <?php

                        $sql = "SELECT cid, cname FROM category order by cid asc";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        // output data of each row
                    ?>
                    <select name="cid" style="width:440px">
                    <?php
                        while($row = $result->fetch_assoc()) {
                            if($row['cid']==1){
                                echo "<option value=".$row['cid']." selected>".$row['cname']."</option>";
                            } else {
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
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Product Name</label>
                        <input type="text" value="" class="form-control" name="pname" required />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Model No.</label>
                        <input type="text" value="" class="form-control" name="pcode" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group">
                    <label>Product color: </label>
                    <?php

                        $sql = "SELECT id, name FROM color order by id desc";
                        $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        // output data of each row
                    ?>
                    <select name="colid" style="width:440px">
                    <?php
                        while($row = $result->fetch_assoc()) {
                            if($row['id']==9){
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
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Price</label>
                        <input type="number" value="" class="form-control" name="price" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Tax</label>
                        <input type="number" value="" class="form-control" name="ptax" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                    <button type="submit" name="adpro" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>  
        </form>
       </div>        
    </div>
</div>


</body>

    <?php
        require 'footer.php';