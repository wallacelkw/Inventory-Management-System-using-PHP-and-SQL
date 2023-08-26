<?php
require_once('config.php');
session_start();
$name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>
        <link rel="shortcut icon"  href="image/Omega-Logo.png"/>
        
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- jQuery UI -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <style>
            .ui-autocomplete
            {
                max-height: 400px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
                /* add padding to account for vertical scrollbar */
                padding-right: 20px; 
                z-index:2;
            }

            .modal-body
            {
                z-index:1;
            }

            table
            {
                white-space: nowrap;
            }
            
            th,tr,td 
            {
                border: 2px solid gray !important;
            }   
        </style>
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include("sidebar_admin.php"); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <?php include("topbar_admin.php"); ?>
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="m-0 font-weight-bold text-primary">DASHBOARD</h1>
                    
                        <div class="col-md-10 p-5" style="margin:0px 0px 0px 20px;">
            <div class="row text-white">
                <!-- box of the total sales -->
                <div class="card bg-info ml-5" style="width: 24rem;">
                <!-- box of the total sales -->
                  <div class="card-body">
                    <div class="card-body-icon">
                        <!--<i class="fas fa-dollar-sign"></i>-->
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <h5 class="card-title">Total Sales (RM)</h5>
                    <!-- Display the total sales-->
                    <div class="display-4">
                        <!-- Declare php calculation here -->
                        <?php
                            $query = ("select total_price from sale");
                            $result = mysqli_query($con,$query);
                            $total=0;
                            while($row=mysqli_fetch_array($result))
                            {
                                $total+=$row['total_price'];
                            }
                            echo number_format($total,2);
                        ?>
                    </div>
                    <!-- Display the total sales-->
                  </div>
                </div>
                <!-- box of the total sales -->

                <!-- box of the total sales current week -->
                <div class="card bg-success ml-4 " style="width: 24rem;">
                <!-- box of the total sales current week -->
                  <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h5 class="card-title">Total Sales In This Week</h5>
                    <!-- Display the total sales current week-->
                    <div class="display-4">
                        <!-- Declare php calculation here -->
                        <?php
                            $sql=("select total_price,sale_date from sale where YEARWEEK(sale_date) = YEARWEEK(NOW())");
                            $result2=mysqli_query($con,$sql);
                            $totalweek=0;
                            while($row2=mysqli_fetch_array($result2))
                            {
                                $totalweek+=$row2['total_price'];
                            }
                            echo number_format($totalweek,2);
                        ?>
                    </div>
                  </div>
                </div>
                <!-- box of the total sales current week -->

                <!-- box of the total sales current day -->
                <div class="card bg-danger ml-4" style="width: 24rem;">
                <!-- box of the total sales current day -->
                  <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h5 class="card-title">Total Sales Today</h5>
                    <!-- Display the total sales current day-->
                    <div class="display-4">
                        <!-- Declare php calculation here -->
                        <?php
                            $sql=("select total_price,sale_date from sale where sale_date = curdate()");
                            $result3=mysqli_query($con,$sql);
                            $totalday=0;
                            while($row3=mysqli_fetch_array($result3))
                            {
                                $totalday+=$row3['total_price'];
                            }
                            echo number_format($totalday,2);
                        ?>
                    </div>
                  </div>
                </div>
                <!-- box of the total sales current day -->
            </div>
            <!-- total customer-->
            <div class="row mt-4">
                <div class="card ml-5 text-white text-center" style="width: 24rem;">
                  <div class="card-header bg-warning display-4 pt-4 pb-4">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-warning">Total Number Of Customers</h5>
                    <p class="card-text text-success" style="font-weight:bold;">
                        <!-- php calculation -->
                        <?php
                            $sql=("select cust_id from customer");
                            $result4=mysqli_query($con,$sql);
                            $totalcust=0;
                            while($row4=mysqli_fetch_array($result4))
                            {
                                $totalcust++;
                            }
                            echo $totalcust;
                        ?>
                    </p>
                  </div>
                </div>
                <!-- total customer-->
                <!-- total supplier-->
                <div class="card ml-4 text-white text-center" style="width: 24rem;">
                  <div class="card-header bg-primary display-4 pt-4 pb-4">
                    <i class="fas fa-user-check"></i>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-primary">Total Number Of Supplier</h5>
                    <p class="card-text text-info" style="font-weight:bold;">
                        <!-- php calculation -->
                        <?php
                            $sql=("select supp_id from supplier");
                            $result5=mysqli_query($con,$sql);
                            $totalsupp=0;
                            while($row5=mysqli_fetch_array($result5))
                            {
                                $totalsupp++;
                            }
                            echo $totalsupp;
                        ?>
                    </p>

                  </div>
                </div>
                <!-- total supplier-->

                <!-- total admin -->
                <div class="card ml-4 text-white text-center" style="width: 24rem;">
                  <div class="card-header bg-secondary display-4 pt-4 pb-4">
                    <i class="fas fa-clipboard-list"></i>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-secondary">Total Number Of Admin</h5>
                    <p class="card-text text-danger" style="font-weight:bold;">
                        <!-- php calculation -->
                        <?php
                            $sql=("select admin_id from admn");
                            $result6=mysqli_query($con,$sql);
                            $totalad=0;
                            while($row6=mysqli_fetch_array($result6))
                            {
                                $totalad++;
                            }
                            echo $totalad;
                        ?>
                    </p>

                  </div>
            </div>
                <!-- total admin -->

            </div>
                <!-- list of super admin -->

            <div class="container_bar" style="margin:80px 0px 0px 50px; width:180%;">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header text-info" style="font-size:18px; font-weight:bold;">
                <i class="fas fa-chart-bar mr-1"></i>
                Monthly Bar Chart
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
  </div>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                <!-- End of Main Content -->
            </div>
        </div>
        <div class="col-md-6 p-3" style="margin:-1100px 0px 0px 1380px;">
            <div class="row text-white">
            <!-- list of super admin -->
                <div class="card m2-1 text-white text-center" style="width: 15rem;">
                  <div class="card-header bg-dark display-4 pt-4 pb-4">
                    <i class="fas fa-cog fa-spin"></i>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-primary">List Of Super Admin</h5>
                    <p class="card-text text-dark" style="font-weight:bold;">
                        <!-- php calculation -->
                        <?php
                            $sql=("select admin_name,admin_status from admn where admin_status='Super Admin'");
                            $result7=mysqli_query($con,$sql);
                            while($row7=mysqli_fetch_array($result7))
                            {
                                echo $row7['admin_name'].'<br>';
                            }
                            
                        ?>
                    </p>

                  </div>
            </div>
            </div>
            </div>
    </div>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

       <?php include("logout_confirm.php"); ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    </body>
</html>
<?php

  $data =array();
    for ($x = 1; $x < 13; $x++)
    {
        $data=mysqli_query($con,"select total_price,sale_date from sale where month(sale_date)= '$x'");

        $total=0;
        while($row=mysqli_fetch_array($data))
        {
            $total+=$row['total_price'];

        }

    $month_data[]=$total;


    }

?>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
    datasets: [{
      label: "Sales (RM)",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo $month_data[0] .",". $month_data[1]. ",".$month_data[2].",". $month_data[3].",". $month_data[4].",". $month_data[5] .",".$month_data[6] .",".$month_data[7] .",".$month_data[8] .",".$month_data[9] .",".$month_data[10] .",". $month_data[11];?> ],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 20
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 150000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>