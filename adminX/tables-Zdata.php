<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    // include "validate_customer.php";
    include "../connect.php";
    // include "header.php";
    // include "customer_navbar.php";
    // include "customer_sidebar.php";

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $sql0 = "SELECT * FROM passbook".$_SESSION['loggedIn_cust_id'];
    }

    // Recive sort variables as $_GET
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    }

    // Recieve filter variables as session variables
    if (isset($_POST['search_term'])) {
        $_SESSION['search_term'] = $_POST['search_term'];
    }
    if (isset($_POST['date_from'])) {
        $_SESSION['date_from'] = $_POST['date_from'];
    }
    if (isset($_POST['date_to'])) {
        $_SESSION['date_to'] = $_POST['date_to'];
    }

    // Filter indicator variable
    $filter_indicator = "None";

    // Queries when search is set
    if (!empty($_SESSION['search_term'])) {
        $sql0 .= " WHERE remarks COLLATE latin1_GENERAL_CI LIKE '%".$_SESSION['search_term']."%'";
        $filter_indicator = "Remarks";

        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Remarks & Date From";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Remarks & Date To";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " AND trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Remarks, Date From & Date To";
        }
    }

    // Queries when search is not set
    if (empty($_SESSION['search_term'])) {
        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Date From";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Date To";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " WHERE trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Date From & Date To";
        }
    }

    // Sort Queries
    // Sort acts independent of the filter
    if (isset($_GET['sort'])) {
        if ($sort == 'tid_down') {
            $sql0 .= " ORDER BY trans_id ASC";
        }
        if ($sort == 'tid_up') {
            $sql0 .= " ORDER BY trans_id DESC";
        }
        if ($sort == 'date_down') {
            $sql0 .= " ORDER BY trans_date ASC";
        }
        if ($sort == 'date_up') {
            $sql0 .= " ORDER BY trans_date DESC";
        }
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
    <title>Ela Admin - HTML5 Admin Template</title>
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
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Transfer Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-Zdata.html">Zesco Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="forms-basic.html" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        
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
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
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
                                <strong class="card-title">Zesco Bills Bought</strong>
                            </div>

                            <div class="card-body">
                                <div>

                                    <div class="flex-item-search-by">
                                       <button id="search" onclick="document.getElementById('id01').style.display='block'">Filter</button> Sort By :
                                    <select name="by" onChange="window.location.href=this.value">
                                        <option selected disabled hidden>
                                            <?php if (empty($_GET['sort'])) {?>Tn. ID &darr;<?php } else { ?>
                                                <?php if ($sort == 'tid_down') {?>Tn. ID &darr;<?php } ?>
                                                <?php if ($sort == 'tid_up') {?>Tn. ID &uarr;<?php } ?>
                                                <?php if ($sort == 'date_down') {?>Date &darr;<?php } ?>
                                                <?php if ($sort == 'date_up') {?>Date &uarr;<?php } ?>
                                            <?php } ?>
                                        </option>
                                        <option value="table_data.php?sort=tid_down">Tn. ID &darr;</option>
                                        <option value="table_data.php?sort=tid_up">Tn. ID &uarr;</option>
                                        <option value="table_data.php?sort=date_down">Date &darr;</option>
                                        <option value="table_data.php?sort=date_up">Date &uarr;</option>
                                    </select>
                                </div>
                                </div>
                        
                                <?php
                                        $result = $conn->query($sql0);

                                        if ($result->num_rows > 0) {?>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Trans. ID</th>
                                            <th>Date & Time (IST)</th>
                                            <th>Remarks</th>
                                            <th>Debit (INR)</th>
                                            <th>Credit (INR)</th>
                                            <th>Balance (INR)</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row["trans_id"]; ?></td>
                                            <td>
                                                <?php
                                                    $time = strtotime($row["trans_date"]);
                                                    $sanitized_time = date("d/m/Y, g:i A", $time);
                                                    echo $sanitized_time;
                                                 ?>
                                            </td>
                                            <td><?php echo $row["remarks"]; ?></td>
                                            <td><?php echo number_format($row["debit"]); ?></td>
                                            <td><?php echo number_format($row["credit"]); ?></td>
                                            <td><?php echo number_format($row["balance"]); ?></td>
                                        
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
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
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
