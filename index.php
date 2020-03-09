<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
session_start();


if (isset($_POST['submit'])) {

    require 'include/Connection_DB.php';
    $db = new Connection_DB(); 
    $con = $db->connect();
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $_SESSION['counterLoginChecker'];
    if(isset($_SESSION['counterLoginChecker'])){
        // $_SESSION['counterLoginChecker']= $count;
    }else {
        // $count = 0;
    }

    $sql = "SELECT * FROM client WHERE email='$email' ";

    $response = mysqli_query($con, $sql);

    $result = array();
    // $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);
         // password_verify($password, $row['password']);
         // echo  $row['password'];

        if ( md5($password) == $row['password'] ) {
            $index = [
                    'email' => $row['email'],
                    'id' =>  $row['id']
            ];

            $internalSQL = "SELECT * FROM account WHERE email = '$email'";
            $internalQuery = mysqli_query($con, $internalSQL);
            if (mysqli_num_rows($internalQuery) === 1) {
                # code...

                $rows = mysqli_fetch_assoc($internalQuery);
                $_SESSION['account_number'] = $rows['account_number'];
                  $_SESSION['password_changed'] = $rows['password_changed'];
                $_SESSION['email'] = $email;

            }

            
            $_SESSION['account_name'] = $row['account_name'];
            header("location: client/index.php");
            array_push($result, $index);

            // $result['success'] = "1";
            // $result['message'] = "success";
            echo json_encode($result);

            echo "WELL";



            mysqli_close($con);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
          //   echo json_encode($result);

          // echo "NIGGA ".mysqli_error($con);
             $_SESSION['error_message'] = "Incorrect Password";
          //      if (!isset($_SESSION['counterLoginChecker'])) {
          //        # code...
          //       $_SESSION['counterLoginChecker'] += 1;
          //    }else {
          //    $_SESSION['counterLoginChecker'] += 1;
          //     echo $_SESSION['counterLoginChecker'];
          // }
        } 

    }else {
             $_SESSION['error_message'] = "Wrong E-mail address";
          //    if (isset($_SESSION['counterLoginChecker'])) {
          //        # code...
          //       $_SESSION['counterLoginChecker'] += 1;
          //       echo $_SESSION['counterLoginChecker'];
          //    }else {
          //        $_SESSION['counterLoginChecker'] += 1;
          //     echo $_SESSION['counterLoginChecker'];
          // }
        }


    # code...
}

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Client Login</title>
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
    <link rel="stylesheet" href="client/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="client/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark" style="background-image: url(index.jpg); background-size: cover;">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                    <h2 style="font-family:MY TURTLE; background-color: #fff; color:#000; ">WELCOME TO THE <strong>R</strong>emote <strong>B</strong>anking <strong>S</strong>ystem</h2>
                </div>
                <div class="login-form">

                    <?php

                     if (isset( $_SESSION['error_message'])) {
                         # code...
                        echo ' <div class="alert alert-warning">
                                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                   <strong></strong>'.$_SESSION['error_message'].'
                               </div>';
                        // echo "<i class='alert alert-warning'>".$_SESSION['error_message']."</i>";
                        unset( $_SESSION['error_message']);
                     }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" required="" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required="" class="form-control" placeholder="Password">
                        </div>
                       <!--  <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div> -->
                        <?php
                        // if(){

                            if (isset($_SESSION['counterLoginChecker']) && $_SESSION['counterLoginChecker'] == 3) {
                                # code...
                                ?>
                                  Page will refreshvin 10secs, Try again then.
                                  <button type="submit" disabled="" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <?php

                                 
                               
                            $_SESSION['counterLoginChecker']=0;
                            // sleep(4);
                                 header("Refresh:5; url=index.php");
                            }else {
                        ?>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <?php
                          }

                        ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
