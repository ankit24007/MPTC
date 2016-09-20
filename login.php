<?php
session_start();
    require 'header.php';
    require 'fun.php';
    
    if(!empty($_SESSION['usname'])){
        header('Location: index.php');
    }
    
    
    
    ?>

<body class="signup-page">
    <div class="wrapper">
	<div class="header header-filter" style="background-image: url('bootmdl/assets/img/city.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
	<?php loginhandler(); ?>
                
                <div class="row">
                    
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        
			<div class="card card-signup">
                            <form class="form" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
				<div class="header header-primary text-center">
                                    <h4>Login</h4>
                                    <!--
                                    <div class="social-line">
                                        <a href="#" class="btn btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                                        <a href="#" class="btn btn-just-icon"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="btn btn-just-icon"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                    -->
				</div>
                                
			<!--	<p class="text-divider">Or Be Classical</p> -->
				
                                <div class="content">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">face</i></span>
					<input type="text" class="form-control" placeholder="Name or Email" name="lname">
                                    </div>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                        </span>
					<input type="password" placeholder="Password..." class="form-control" name="lpass" />
                                    </div>

			<!-- If you want to add a checkbox to this form, uncomment this code
                                    <div class="checkbox">
                                        <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked>
                                                Subscribe to newsletter
                                        </label>
                                    </div> -->
				</div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-primary btn-raised btn-wd" name="login">Log in</button>
                                    <hr />
                                   
                                    <h4>Create new account</h4>
                                    <p><a href="signup.php" class="btn btn-primary btn-raised btn-wd">Sign up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
		</div>
            </div>

            

<?php
    require 'footer.php';