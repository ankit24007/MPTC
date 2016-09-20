<?php
session_start();

include 'db.php';
require 'header.php';
?>

<div class="container">
    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Congratulations!</strong> You are Registered successfully.
                    </div>
</div>
<?php
if (isset($_GET['id'])){
            $id = $_GET['id'];
        }
if(isset($_POST['welcome'])){
        
        
        $pass = mysql_real_escape_string(filter_input(INPUT_POST, 'pass'));
       
        if(empty($id) || empty($pass)){
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
            $sql = "SELECT uname, ustatus FROM users WHERE (uname= '$id' OR umail = '$id') AND upass = '$pass'";
            
    
            $result = $conn->query($sql);

            if ($result -> num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $_SESSION['usname'] = $row['uname'];
                    $_SESSION['ustatus'] = $row['ustatus'];
                    header('Location: index.php');
                }
            }else{
                 
                echo "<div class='alert alert-danger'>
                    
                        <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                        <b>Error Alert:</b> Password you entered did not match our records. Please try again.
                    
                </div>";
                
            } 
        }
    }
    ?>
<div class="container">
    <div class="jumbotron">
        <h2>Welcome<small></small></h2>
        
        <form action="welcome.php?id=<?php echo $id; ?>" method="post">
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Enter Your Password</label>
                        <input type="password" value="" class="form-control" name="pass" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="welcome" class="btn btn-raised btn-primary btn-wd">Dashboard</button>
                </div> 
            </div>
        </form>
    </div>
</div>

    