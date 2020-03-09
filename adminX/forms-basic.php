<?php
    session_start();
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
    <title>Create User Admin</title>
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
                    <li class="menu-item-has-children active dropdown">
                        <a href="forms-basic.php" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-th"></i> Forms</a>
                    </li>
                      </li>
                       <li class="menu-item-has-children  dropdown">
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
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                           
                        </div>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="settings.php"><i class="fa fa-settings"></i>Settings</a>
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
                                <?php
                                        if (isset($_SESSION['succ_message'])) {
                                                    # code...


                                                        echo ' <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong> </strong>'.$_SESSION['succ_message'].'
                                                              </div>';

                                                        unset($_SESSION['succ_message']);
                                                }else if (isset($_SESSION['err_message'])) {
                                                    # code...
                                                       echo ' <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error! </strong>'.$_SESSION['err_message'].'
                                                              </div>';

                                                        unset($_SESSION['err_message']);
                                                }
                                ?>
                                     <div class="card-title">
                                            <h3 class="text-center">Details</h3>
                                        </div>
                                <form action="create_account.php" method="POST">
                                <div class="form-group">
                                    <label for="first_name" class=" form-control-label">First Name</label>
                                     <input type="text" name="first_name" class="form-control" placeholder="First name" required>

                                </div>
                                <div class="form-group">
                                     <label for="last_name" class=" form-control-label">Last Name</label>
                                     <input type="text" name="last_name" class="form-control" placeholder="Last name">
                                   
                                </div>
                                 <div class="form-group">
                                     <label for="other_name" class=" form-control-label">Other Name</label>
                                     <input type="text" name="other_name" class="form-control" placeholder="Other name">
                                   
                                </div>
                            
                                 <div class="form-group">
                                     <label for="initial_balance" class=" form-control-label">Initial Balance</label>
                                     <input type="text" name="initial_balance" class="form-control" placeholder="0.00" required>
                                   
                                </div>
                                 <div class="form-group">
                                     <label for="account_name" class=" form-control-label">Account Name</label>
                                     <input type="text" name="account_name" class="form-control" placeholder="Full Name" required>
                                   
                                </div>
                                  <div class="form-group">
                                     <label for="email" class=" form-control-label">Email</label>
                                     <input type="email" name="email" class="form-control" placeholder="username@banking.com"  required>
                                   
                                </div>
                               
                    
                                <!-- <div class="form-group"><label for="country" class=" form-control-label">Country</label><input type="text" id="country" placeholder="Country name" class="form-control"></div> -->
                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Create Account</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>




                        <?php

                            $sqlAccount = "SELECT a.email FROM account a where a.email not in ( SELECT c.email from client c)";
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
                                            <?php
                                                if (isset($_SESSION['suc_message'])) {
                                                    # code...


                                                        echo ' <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong></strong>'.$_SESSION['suc_message'].'
                                                              </div>';

                                                        unset($_SESSION['suc_message']);
                                                }  if (isset($_SESSION['err_create_message'])) {
                                                    # code...


                                                        echo ' <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong></strong>'.$_SESSION['err_create_message'].'
                                                              </div>';

                                                        unset($_SESSION['err_create_message']);
                                                } 
                                            ?>
                                            <h3 class="text-center">Details</h3>
                                        </div>
                                        <hr>
                                        <form action="add_client.php" method="post" novalidate="novalidate">
                                              <?php 
                                              if ($numAccount > 0) {
                                                    # code...
                                                    ?>
                                                    <div class="form-group">
                                                    <label for="cc-email" class="control-label mb-1">Email</label>
                                                    <select class="form-control" name="email" required>
                                                    <?php
                                                    while($rowAccount = mysqli_fetch_assoc($QueryAccount)) {
                                                        echo "<option value=".$rowAccount['email'].">".$rowAccount['email']."</option>";
                                                    }
                                                } else {
                                                    echo "Add A new account first";
                                                }
                                                ?>
                                                
                                            </select>

                                            
                                            </div>
                                             <label for="cc-name" class="control-label mb-1">Password</label>
                                            <input  type="password"  minlength="4" name="password" class="form-control" required>
                                        
                                            <label for="cc-name" class="control-label mb-1">Confirm Password</label>
                                            <input  type="password"  minlength="4" name="confirm_password" class="form-control" required><br>
                                        
                                          
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Add Client</span>
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


</body>
</html>
