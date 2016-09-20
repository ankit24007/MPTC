<?php 
require 'header.php';
require 'fun.php';
if(!empty($_SESSION['usname'])){
        header('Location: index.php');
    }
?>

<body class="signup-page">
    <!--
    <nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
            <!-- Brand and toggle get grouped for better mobile display 
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">MPTC</a>
            </div>
            
            
            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../components-documentation.html" class="btn" target="_blank">Components</a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="btn">Download</a>
                    </li>
		    <li>
		        <a href="#" target="_blank" class="btn btn-simple">
                            <i class="fa fa-twitter"></i>
                        </a>
		    </li>
		    <li>
		        <a href="#" target="_blank" class="btn btn-simple">
                            <i class="fa fa-facebook-square"></i>
			</a>
                    </li>
                    <li>
		        <a href="#" target="_blank" class="btn btn-simple">
                            <i class="fa fa-instagram"></i>
			</a>
		    </li>
                </ul>
            </div>
            
    	</div>
    </nav>
-->

    <div class="wrapper">
	<div class="header header-filter" style="background-image: url('bootmdl/assets/img/bg.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
              <?php  signup();  ?>
		<div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="card card-signup">
                            <form class="form" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
				<div class="header header-primary text-center">
                                    <h4>Sign Up</h4>
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
					<input type="text" class="form-control" placeholder="Name..." name="rname">
                                    </div>
                                    <div class="input-group">
					<span class="input-group-addon"><i class="material-icons">email</i></span>
					<input type="email" class="form-control" placeholder="Email..." name="remail">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                        </span>
					<input type="password" placeholder="Password..." class="form-control" name="rpass"/>
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
                                    <button type="submit" class="btn btn-primary btn-wd btn-lg" name="signup">Get Started</button>
                                        <hr />
                                   
                                    <h4>Already have an account?</h4>
                                    <p><a href="login.php" class="btn btn-primary btn-raised btn-wd">Log in</a></p>
                                </div>
                            </form>
			</div>
                    </div>
		</div>
            </div>

                
<?php

require 'footer.php';