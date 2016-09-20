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
                    <a href="adcat.php" class="list-group-item">Add Category</a>
                    <a href="adpro.php" class="list-group-item">Add Product</a>
                    <a href="category.php" class="list-group-item">Show Categories</a>
                    <a href="products.php" class="list-group-item">Show Products</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-10">
                
            
        <?php
        
    if(isset($_POST['adcat'])){
        
        $cat = mysql_real_escape_string(filter_input(INPUT_POST, 'cat'));
        $cdes = mysql_real_escape_string(filter_input(INPUT_POST, 'cdes'));
        $uname= $_SESSION['usname'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s');
       
        if(empty($cat)){
                ?>
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Category field are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            
           
            }else{
            $sql = "INSERT INTO category (cname, cdes, cby, cdate)
            VALUES ('$cat', '$cdes','$uname', '$timestamp')";

                if($conn->query($sql) === TRUE) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> New Category Added successfully.
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
                <div class="col-lg-offset-1 col-sm-10">
                    <h3>Add Category</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4 col-md-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Category Name</label>
                        <input type="text" class="form-control" name="cat">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4 col-md-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" name="cdes"></textarea>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="input-group">
                        <button type="submit" name="adcat" class="btn btn-raised btn-primary btn-wd">Submit</button>
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
        
        
        