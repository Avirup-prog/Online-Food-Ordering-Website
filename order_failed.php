<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start(); 
        include("conn_db.php"); 
        include('head.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">

    <title>Failed to place an order | Food Frenzy</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header.php')?>
    <div class="mt-5"></div>
    <div class="container form-signin text-center reg-fail mt-auto">
            <?php
                if(isset($_GET["err"])){
                    $error_code = $_GET["err"];
                    $err_type = 1;
                    $display_msg =  "Error Code: {$error_code}";
                }else if(isset($_GET["pmt_err"])){
                    $err_type = 2;
                    $display_msg = "Message: ".ucfirst($_GET["pmt_err"]);
                }
            ?>
            <i class="mt-4 bi bi-exclamation-circle text-danger h1 display-2"></i>
            <h3 class="mt-2 mb-3 fw-normal text-bold">Unable to place your order</h3>
            <p class="mb-3 fw-normal text-bold">
            </p>
            <a class="btn btn-danger btn-sm w-50" href="index.php">Return to Home</a>
    </div>
    <?php include('footer.php')?>
</body>

</html>