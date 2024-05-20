<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        session_start(); 
        include("../conn_db.php"); 
        if($_SESSION["utype"]!="ADMIN"){
            header("location: ../restricted.php");
            exit(1);
        }
        if(isset($_POST["rst_confirm"])){
            $c_id = $_POST["c_id"];
            $newpwd = $_POST["new_pwd"];
            $newcfpwd = $_POST["new_cfpwd"];
            if($newpwd != $newcfpwd){
                ?>
                    <script>
                        alert('Your new password is not match.\nPlease re-enter again.');
                        history.back();
                    </script>;
                <?php
                exit(1);
            }else{
                $query = "UPDATE customer SET c_pwd = '{$newpwd}' WHERE c_id = {$c_id}";
                $result = $mysqli -> query($query);
                if($result){
                    header("location: admin_customer_detail.php?c_id={$c_id}&up_pwd=1");
                }else{
                    header("location: admin_customer_detail.php?c_id={$c_id}&up_pwd=0");
                }
            }
        }

        include('../head.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <link href="../img/Project_icon.png" rel="icon">
    <title>Update customer password | Food Frenzy/title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header_admin.php')?>

    <div class="container form-signin mt-auto w-50">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
        <form method="POST" action="admin_customer_pwd.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-key me-2"></i>Update Customer Password</h2>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="rst_pwd" minlength="8" maxlength="45" placeholder="New Password" name="new_pwd"
                    required>
                <label for="rst_pwd">New Password</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="rst_cfpwd" minlength="8" maxlength="45" placeholder="Confirm New Password"
                    name="new_cfpwd" required>
                <label for="rst_cfpwd">Confirm New Password</label>
                <div id="passwordHelpBlock" class="form-text smaller-font">
                    New password must be at least 8 characters long.
                </div>
            </div>
            <input type="hidden" name="c_id" value="<?php echo $_GET["c_id"]?>">
            <button class="w-100 btn btn-success my-3" name="rst_confirm" type="submit" onclick="return confirm('Do you want to update this customer password?');" >Update Password</button>
        </form>
    </div>
    <?php include('admin_footer.php')?>
</body>

</html>