<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Charifit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styling.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <?php if(isset($_SESSION["TID"]) && $_SESSION["TID"]==$_REQUEST["payment_request_id"]){ ?>
                        <div class="payment_header">
                            <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </div>
                        <div class="content">
                            <h1>Payment Successfull !</h1>
                            <p>Your Payment information has been sent to your email.</p>
                            <a href="index">Go to Home</a>
                        </div>
                    <?php }else{ ?>
                        <div class="payment_header">
                            <div class="check"><i class="fa fa-times" aria-hidden="true"></i></div>
                        </div>
                        <div class="content">
                            <h1>Payment Failed !</h1>
                            <p>Sorry! Your payment has been failed. Please Try Again.</p>
                            <a href="index">Go to Home</a>
                        </div>                           
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>