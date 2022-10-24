<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'db_conn.php';
if(isset($_POST['send_otp'])){
    $mail = $_POST['email'];
    $checkMail = "SELECT * FROM tbl_login WHERE email='$mail'";
    $result = mysqli_query($conn,$checkMail);
    $rsltCheck = mysqli_num_rows($result);
    $fetch = mysqli_fetch_array($result);
    if($rsltCheck>0){
        $_SESSION['email'] = $fetch['email'];
        $email = $_SESSION['email'];
        $code = rand(999999, 111111);
        $insert_otp = "UPDATE `tbl_login` SET `otp_code`='$code' WHERE `email`='$email'";
        $data_check = mysqli_query($conn, $insert_otp);
        if($data_check){
        //     $subject = "Password Reset Verification Code";
        //     $message = "Your verification code is $code";
        //     $sender = "From:alanshijo@ymail.com";
        //     if(mail($email, $subject, $message, $sender)){
        //         echo '<script> alert ("OTP sent successfully");</script>';
        //         echo'<script>window.location.href="enter-otp.php";</script>';
        //     }else{
        //         echo '<script> alert ("OTP sent failed");</script>';
        //         echo'<script>window.location.href="forgot.php";</script>';
        // }
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'alanshijo2023a@mca.ajce.in';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('alanshijo2023a@mca.ajce.in', 'BookMyTickets');
        $mail->addAddress($email);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot Password - OTP Verification';
        $body = "Need to reset your password? <br><br> Use your secret code! <br><br> <strong>$code</strong>";
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);
    
        //$mail->send();
        if($mail->send()){
            echo '<script> alert ("OTP sent successfully");</script>';
            echo'<script>window.location.href="enter-otp.php";</script>';
        }else{
            echo '<script> alert ("OTP sent failed");</script>';
            echo'<script>window.location.href="forgot.php";</script>';
        }
        }
    }
    else{
        echo '<script> alert ("The user doesnot exist!");</script>';
	    echo'<script>window.location.href="forgot.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Login</title>
    <style>
        body{
            background-color: #DEDEDE;
        }
     .navbar {
        overflow: hidden;
        background-color: #333;
        position: absolute;
        width: 100%;
        left: 0px;
        top: 0px;
        }


        .navbar a {
        float: right;
        color: white;
        padding-top: 30px;
        margin-right: 50px;
        text-decoration: none;
        font-family: 'Itim';
        }
        .navbar a.left {
            float: left;
            padding: 0%;
            padding-left: 25px;
        }
        .navbar a:hover {
        color: rgb(185, 185, 185);
        }
        .ticket{
            position: absolute;
            width: 561px;
            height: 497px;
            left: 807px;
            top: 163px;
        }
        table{
            position: absolute;
            left: 550px;
            top: 200px;
        }
        table label{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 23px;
            line-height: 48px;
        }
        input:not([type=submit]){
            box-sizing: border-box;
            background: #D9D9D9;
            border: 2px solid #757070;
            border-radius: 9px;
            padding: 10px;
            width: 300px;
            height: 45px;
        }
        input[type="submit"] {
            position: absolute;
            background: #1E1E1E;
            top: 120px;
            height: 40px;
            width: 90px;
            border-radius: 20px;
            color: white;
            border: none;
            font-family: 'Poppins';
            /* font-weight: bold; */
            
        }
        input[type="submit"]:hover{
            background-color: #000000;
            cursor: pointer;
        }
        ::placeholder{
            font-family: 'Poppins';
            padding-left: 8px;
            font-weight: 700;
        }
        </style>
</head>
<body>
    <div class="navbar">
        <a class="left" href="index.php"><img src="imgs/main-logo.png" alt="BookMyTickets" width="200" height="80"></a>
    </div>
    <form action="" method="POST">
    <table>
        <tr><td><label for="email">Reset password</label></td></tr>
        <tr><td><input type="email" name="email" placeholder="Enter your email here" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" title="Please enter a valid email address"></td></tr>
        <tr><td><input type="submit" name="send_otp" value="Send OTP"></td></tr>
    </table>
    </form>
</body>
</html>