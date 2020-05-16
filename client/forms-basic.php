<?php
session_start();


?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Make Transactions</title>
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
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="table_data.php">Personal Table</a></li>
                            <li><i class="fa fa-table"></i><a href="zesco.php">Zesco Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="forms-basic.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-th"></i> Forms</a>
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
                           <span class="fa fa-user"></span>
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
                                <?php

     

           
           

        ?>
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
                            <div class="card-header"><strong>Transfer Money</strong><small></small></div>
                            <div class="card-body card-block">
                                <?php
                                   // echo $_SESSION['error_trans_message'];
                                   if (isset($_SESSION['confirm_message'])) {
                # code...
                                            echo '<div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Success!</strong>'.$_SESSION['confirm_message'].'.
                                                  </div>';
                                        unset($_SESSION['confirm_message']);
                                }   else if (isset($_SESSION['error_trans_message'])) {
                # code...
                                        echo ' <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Error! </strong>'.$_SESSION['error_trans_message'].'
                                              </div>';
                                        unset($_SESSION['error_trans_message']);
                                    }

                                ?>
                                     <div class="card-title">
                                            <h3 class="text-center">Details</h3>
                                        </div>
                                <form action="send_funds.php" method="POST">
                                <div class="form-group">
                                    <label for="account_num" class=" form-control-label">Account Number</label>
                                    <input type="text" id="account_num" name="account_num" placeholder="Eg PE02341RBS" class="form-control">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="vat" class=" form-control-label">Account Holder Name</label>
                                    <input type="text" id="vat" placeholder="Eg. ns C. ChEvaongo" class="form-control">
                                </div> -->
                                <div class="form-group">
                                    <label for="account" class=" form-control-label">Amount</label>
                                    <input type="text" id="account" name="amount" placeholder="Eg 200" class="form-control">
                                </div>
                    
                                <!-- <div class="form-group"><label for="country" class=" form-control-label">Country</label><input type="text" id="country" placeholder="Country name" class="form-control"></div> -->
                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Send Funds</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pay Zesco Bills</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             <?php
                                   // echo $_SESSION['error_trans_message'];
                                   if (isset($_SESSION['con_message'])) {
                # code...
                                            echo '<div class="alert alert-success">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Success!</strong>'.$_SESSION['con_message'].'.
                                                  </div>';
                                        unset($_SESSION['con_message']);
                                }   else if (isset($_SESSION['err_trans_message'])) {
                # code...
                                        echo ' <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Error! </strong>'.$_SESSION['err_trans_message'].'
                                              </div>';
                                        unset($_SESSION['err_trans_message']);
                                    }

                                ?>
                                        <div class="card-title">
                                            <h3 class="text-center">Details</h3>
                                        </div>
                                        <hr>
                                        <form action="buy_units.php" method="post" novalidate="novalidate">
                             
                                            <div class="form-group">
                                             <!--    <label for="cc-payment" class="control-label mb-1">Prepaid Number</label>
                                                <input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="eg. 1000.00"> -->
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Amount  </label>
                                                <input id="cc-name" name="amount" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                        
                             
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Pay Bills</span>
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


</body>
</html>
