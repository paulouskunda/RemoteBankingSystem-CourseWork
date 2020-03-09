<?php
 session_start();
 if (isset($_SESSION['account_number'])) {
    require '../include/Connection_DB.php';
    $db = new Connection_DB(); 
    $con = $db->connect();

    $account_number = $_SESSION['account_number'];
// Check connection


// QUERY THE ACCOUNTS TABLE BASED ON THE ACCOUNT SESSION PROVIDED.
$accountSQL = "SELECT * FROM account WHERE account_number  = '$account_number'";
$accountQuery = mysqli_query($con, $accountSQL);
$numb = mysqli_num_rows($accountQuery);

//balance variable
$balance = "9.0";
if ($numb > 0) {
    # code...
    while ($accountRow = mysqli_fetch_assoc($accountQuery)) {
        # code...
        $balance = $accountRow['balance'];
    }

    echo $balance;
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zesco Bills</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                       
                        <ul class="sub-menu children dropdown-menu">                       
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="table_data.php">Personal Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-Zdata.php">Zesco Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="forms-basic.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        

                        

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-user"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                            <a class="nav-link" href="settings.php"><i class="fa fa-cog"></i>Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Zesco Bills Paid</strong>
                            </div>

                            <div class="card-body">
                                <div>

            
                                </div>
                        
                                <?php
                                        $result = mysqli_query($con,"SELECT * FROM utility_transactions WHERE utility_acc_no ='ZESCO' AND client_acc_no = '$account_number'");

                                        if (mysqli_num_rows($result) > 0) {?>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Trans. ID</th>
                                            <th>Date & Time (IST)</th>
                                            <th>Remarks</th>
                                            <th>Amount (ZWK)</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $num = 0;
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo ++$num; ?></td>
                                            <td>
                                                <?php
                                                    $time = strtotime($row["trans_date"]);
                                                    $sanitized_time = date("d/m/Y", $time);
                                                    echo $sanitized_time;
                                                 ?>
                                            </td>
                                            <td><?php echo $row["remark"]; ?> Bills</td>
                                            <td><?php echo number_format($row["transaction_amount"]); ?></td>
                                          
                                        </tr>
                                         <?php } ?>
                                    </tbody>

                                </table>
                                <?php
                                    } else {  ?>
                                        <p id="none"> No results found :(</p>
                                    <?php }?>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                         &copy; 2019 RBS
                    </div>
                    <div class="col-sm-6 text-right">
                        
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

    <script>
    // Sticky search-bar
    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });

        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>


</body>
</html>
<?php
 } else {
    header("location: login.php");
 }
?>