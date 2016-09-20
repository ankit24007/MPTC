<?php
function signup(){
    include 'db.php';
    if(isset($_POST['signup'])){
        $rname = filter_input(INPUT_POST, 'rname');
        $remail = filter_input(INPUT_POST, 'remail');
        $rpass = filter_input(INPUT_POST, 'rpass');
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s'); 
    
        if(empty($rname) || empty($remail) || empty($rpass)){
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
            $sql = "INSERT INTO users (uname, umail, upass, ustatus, cdate, udate)
            VALUES ('$rname', '$remail', '$rpass', '1', '$timestamp','$timestamp')";

                if($conn->query($sql) === TRUE) {
                    
                    header('Location: welcome.php?id='.$rname);
            
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
}
// sign up function ends here *******************************************************

function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
// login checker function ends here *******************************************************

function loginhandler(){
    include 'db.php';
    if(isset($_POST['login'])){
        
        $lname = mysql_real_escape_string(filter_input(INPUT_POST, 'lname'));
        $lpass = mysql_real_escape_string(filter_input(INPUT_POST, 'lpass'));
       
        if(empty($lname) || empty($lpass)){
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
            $sql = "SELECT uname, ustatus FROM users WHERE (uname= '$lname' OR umail = '$lname') AND upass = '$lpass'";
            
    
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
                        <b>Error Alert:</b> The username and password you entered did not match our records. Please try again.
                    
                </div>";
                
            } 
        }
    }
}
