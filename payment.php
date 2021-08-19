<?php
session_start();
if(isset($_POST["submit"])){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key:test_85a8c117f0ba42a19ce99fb8b5f",
                    "X-Auth-Token:test_307d204433e4f5a98204dacc635"));
    $payload = Array(
        'purpose' => 'Donate',
        'amount' => $_POST["amount"],
        'phone' => $_POST["phone_no"],
        'buyer_name' => $_POST["name"],
        'redirect_url' => 'http://localhost/charifit-master/redirect',
        'send_email' => true,
        'webhook' => 'http://www.example.com/webhook/',
        'send_sms' => true,
        'email' => $_POST["email_id"],
        'allow_repeated_payments' => false
    );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 
    $response = json_decode($response);        // convert string into array
    $_SESSION["TID"] = $response->payment_request->id;
    header("location:".$response->payment_request->longurl);
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Charifit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styling.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="payment">
                    <div class="payment_header">
                        <h3 class="text-center">Make a Donation</h3>
                    </div>
                    <div class="content">
                        <form class="form-contact contact_form" action="" method="post">
                            <div class="form-group">
                                <input class="form-control valid" name="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Name'" placeholder="Enter your Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control valid" name="phone_no" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Phone Number'" placeholder="Enter your Phone Number" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control valid" name="email_id" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Email ID'" placeholder="Enter your Email ID" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control valid" name="amount" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Amount'" placeholder="Enter Amount" required>
                            </div>
                            <button type="submit" class="btn" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
