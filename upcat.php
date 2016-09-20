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
                    <a href="category.php" class="list-group-item">Show Categories</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                
            
        <?php
      if (isset($_GET['eid']) && is_numeric($_GET['eid'])){
                    // get id value
                        $eid = $_GET['eid'];
                        $sql = 'SELECT cname, cdes FROM category WHERE cid='.$eid;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $cname = $row['cname'];
                                $cdes = $row['cdes'];
                            } 
                        }
                    }  
    ?>
                <form action="category.php?eid=<?php echo $eid; ?>" method="post">
           
            <div class="row">
                <div class="col-lg-offset-1 col-sm-10">
                    <h3>Update Category</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4 col-md-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Category Name</label>
                        <input type="text" class="form-control" name="upncat" value="<?php echo $cname; ?>">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4 col-md-5">
                    <div class="form-group label-floating">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" name="updes" ><?php echo $cdes; ?></textarea>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="input-group">
                        <button type="submit" name="upcat" class="btn btn-raised btn-primary btn-wd">Update</button>
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
        
        
        