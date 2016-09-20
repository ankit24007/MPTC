<?php
session_start();
include 'db.php';

function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
?>

<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8" />
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />        
        
        
	<!-- CSS Files -->
        <link href="bootmdl/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="bootmdl/assets/css/material-kit.css" rel="stylesheet"/>
        
        <!--Load the AJAX API-->
        <script type="text/javascript" src="ajax-api/loader.js"></script>
        <script type="text/javascript" src="ajax-api/ajax-api-jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "chartdata.php",
          dataType: "json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      
      var options = {
      title : 'Sales Report Year 2016',
      vAxis: {title: 'Amount', gridlines: { count: 6 } },
      hAxis: {title: 'Month'},
      colors: ['skyblue','yellowgreen'],
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };


      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    </script>
        
        
          
        <style>
            body{
                background-color: white;
            }
        </style>

    </head>
<?php
    require 'navbar.php';
?>
<body>

    <div class="container"> 
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <p style="color: skyblue; font-size: 20px">Total Sales</p>
                        <?php
                        $sql = "SELECT bamt FROM bill";
                        $result = $conn->query($sql);
                        $tamt =0;
                        if ($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $bamt = $row['bamt'];
                                $tamt += $bamt;
                            }
                        }
                        echo "<a href='bills.php'><p style='font-size: 20px; color: black'>Rs.".$tamt."</p></a>";
                        ?>
                        
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <p style="color: orange; font-size: 20px">Total Due's</p> 
                        <?php
                        $sql = "SELECT dueamt FROM bill";
                        $result = $conn->query($sql);
                        $tdamt =0;
                        if ($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $damt = $row['dueamt'];
                                $tdamt += $damt;
                            }
                        }
                        echo "<a href='customer.php'><p style='font-size: 20px; color: black'>Rs.".$tdamt."</p></a>";
                        ?>
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <p style="color: yellowgreen; font-size: 20px">Total Received</p>
                        <?php 
                            $treceipt = $tamt - $tdamt;
                            echo "<a href='payments.php'><p style='font-size: 20px; color: black'>Rs.".$treceipt."</p></a>";
                        ?>
                        <br>
                    </div>
                </div>    

            </div>
        </div>
        
        
        

    </div> 
    <div class="container-fluid">
        <!--Div that will hold the pie chart-->
        <div id="chart_div" style="width: 100%; height: 400px;"></div>
    </div>
    
<?php

require 'footer.php';
