<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    	<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MPTC</a>
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
		
                      
                        
                        <li><a href="products.php">Products</a></li>
                        <li><a href="seller.php">Seller</a></li>
                        <li><a href="customer.php">Customer</a></li>
                        <li><a href="bills.php">Invoice</a></li>
                        <li><a href="payments.php">Payments</a></li>
                        <li><a href="currentStock.php">Stock</a></li>
                    
        	
        	<!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li><a href="adstock.php">Add Stock</a></li>
                       <li><a href="stockIssue.php">Stock Issue</a></li>
                    </ul>
                </li> -->
                
                <li><a href="offReport.php">Report</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                    
                   
                  
                
        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">account_circle</i><?php print_r($_SESSION['usname']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        
                        
                        <li class="divider"></li>
                        
                        <li><a href="logout.php" class="btn btn-danger btn-raised btn-wd">Log out</a></li>
                    </ul>
                    
        	</li>
                
            </ul>
    	</div>
    </div>
</nav>