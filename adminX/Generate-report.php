<?php
    require '../include/Connection_DB.php';
    $db = new Connection_DB(); 
    $con = $db->connect();
?>
<!Doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Generate Report Admin</title>
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
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body onload="validDate()">
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="clients.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
   
                        <ul class="sub-menu children dropdown-menu">       

                        </ul>
                    </li>
                  <!--   <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="buggy.php">Zesco Trans</a></li>
                            <li><i class="fa fa-table"></i><a href="table_data.php">Personal Trans</a></li>
                        </ul>
                    </li> -->
                    <li class="menu-item-has-children  dropdown">
                        <a href="forms-basic.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-th"></i> Forms</a>

                    </li>

                    </li>
                       <li class="menu-item-has-children active dropdown">
                        <a href="Generate-Report.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Reports</a>
                        
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
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button> -->
                   <!--      <div class="form-inline">
                            <form class="search-form">
                                <input hidden class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> -->
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                             <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
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
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
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
                    

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Add Client Account Details</strong><small></small></div>
                            <div class="card-body card-block">
                                     <div class="card-title">
                                            <h3 class="text-center">Types of Reports</h3>
                                            <ol>

                                                <li> <strong>List Of Clients :</strong> List of all clients. </li>
                                                <br>
                                                <li> <strong>Clients Added On:</strong> List of clients added between a given date. </li><br>
                                               <li><strong> Single Reports :</strong> Single transaction report for a given account number. </li><br>
                                                <li> <strong>All Transaction:</strong> All transaction performed by the current clients of the system </li><br>
                                                <li> <strong>List of Transaction:</strong> List of transactions performed between a given date. </li>
                                                <br>
                                                <li> <strong>Single Report Between Dates:</strong> Single report for a given account number between two given dates. </li>
                                                <li>List of Zesco Bills Transaction</li>
                                            </ol>
                                        </div>
                                
                            </div>
                        </div>
                    </div>




                        <?php

                            // $sqlAccount = "SELECT a.email FROM account a where a.email not in ( SELECT c.email from client c)";
                        $sqlAccount = "SELECT account_number FROM account";
                            $QueryAccount = mysqli_query($con,$sqlAccount);
                            $numAccount = mysqli_num_rows($QueryAccount);

                        ?>



                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Client</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Reports Generation</h3>
                                        </div>
                                        <hr>
                                        <form action="generateDocuments.php" method="post" novalidate="novalidate">
                                          
                                                
                                            </select>

                                            
                                            </div>
                                              <div class="form-group">
                                                <input type="text" name="type_format" value="pdf" hidden="">
                                            </div>
                                            <div class="form-group">
                                            <select class="form-control" name="reportType"  onchange="accountSelect(this)">
                                                <option value="list">List of clients</option>
                                                <option value="created_on">Clients Added From</option>
                                                <option value="single">Single Reports</option>
                                                <option value="list_trans">All Transactions</option>
                                                <option value="list_date">List Of Transactions Between Dates</option>
                                                <option value="single_date">Single Reports Between Dates</option>
                                                <option value="zesco_bills">Zesco Bills</option>
                                                <option value="single_zesco_bills">Single Zesco Bills</option>
                                                <option value="single_zesco_bills_dates">Single Zesco Bills between</option>
                                            </select>
                                            </div>

                                            <div class="form-group" id="hidden_div" style="display: none;">
                                             <!--    <select class="form-control">
                                                    <option>Emails Here</option>
                                                </select> -->
                                            
                                            <?php 
                                              if ($numAccount > 0) {
                                                    # code...
                                                    ?>
                                                    <!-- <div class="form-group"> -->
                                                    <label for="cc-email" class="control-label mb-1">Account Number</label>
                                                    <select class="form-control" name="account_numb">
                                                    <?php
                                                    while($rowAccount = mysqli_fetch_assoc($QueryAccount)) {
                                                        echo "<option value=".$rowAccount['account_number'].">".$rowAccount['account_number']."</option>";
                                                    }

                                                }
                                                ?> 
                                            </select>



                                        </div>

                                        <div class="form-group" id="hidden_date" style="display: none;">
                                            <label class="control-label mb-1">Pick the Dates</label><br>
                                            <label class="control-label mb-1">From-Date </label>
                                            <input type="date" max="2019-06-04" step="0" name="tranStart_date" id="date" class="form-control" required="true">
                                            <label class="control-label mb-1">To-Date</label>
                                            <input type="date" max="2019-06-04" step="0" name="end_date" class="form-control" required>
                                        </div>


                                            <div>
                                                <button id="payment-button" type="submit" name="ReportSubmit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Get Report</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

                
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; <?php echo date('Y'); ?> RBS
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Team</a>
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
<script type="text/javascript">

function accountSelect(select) {
        // document.getElementById('hidden_div');
        if (select.value == 'single' || select.value == 'single_zesco_bills') {
                document.getElementById('hidden_div').style.display = "block";
        }else if (select.value == 'single_date'){
                document.getElementById('hidden_date').style.display = "block";
                document.getElementById('hidden_div').style.display = "block";
        } else if(select.value == 'list_date' || select.value =='created_on' || select.value == 'single_zesco_bills_dates'){
            document.getElementById('hidden_date').style.display = "block";
                document.getElementById('hidden_div').style.display = "none";
        } else {
            document.getElementById('hidden_div').style.display = "none";
            document.getElementById('hidden_date').style.display = "none";
        }
    }

    function validDate(){
        var today = new Date().toISOString().split('T')[0];
        var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
      document.getElementsByName("date")[0].setAttribute('min', today);
      document.getElementsByName("date")[0].setAttribute('max', nextWeekDate)
    }
</script>

</body>
</html>
