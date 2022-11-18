<?php
include 'db_conn.php';
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $fname = mysqli_escape_string($conn,$fname);
    $lname = $_POST['lname'];
    $lname = mysqli_escape_string($conn,$lname);
    $mail = $_POST['mail'];
    $mail = mysqli_escape_string($conn,$mail);
    $phone = $_POST['phone'];
    $phone = mysqli_escape_string($conn,$phone);
    $password = $_POST['password'];
    $password = mysqli_escape_string($conn,$password);
        $check = "SELECT * FROM tbl_login WHERE email='$mail'";
        $rslt = mysqli_query($conn, $check);
        $rsltcheck = mysqli_num_rows($rslt);
        if($rsltcheck == 0){
            $user_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_title` = 'user'";
            $user_check_rslt = mysqli_query($conn,$user_check);
            while($row = mysqli_fetch_array($user_check_rslt)){
                //echo $row['type_id'];
            $type = $row['type_id'];
            $reg = "INSERT INTO `tbl_login`(`email`, `password`, `type_id`) VALUES ('$mail','$password','$type')";
            $reg_query = mysqli_query($conn,$reg);
            $last_id = mysqli_insert_id($conn);
            if($reg_query){
                $user_reg = "INSERT INTO `tbl_users`(`user_fname`, `user_lname`, `user_phno`, `user_status`, `login_id`) VALUES ('$fname','$lname','$phone','active','$last_id')";
                $user_reg_query = mysqli_query($conn,$user_reg);
                echo'<script> alert ("Account created");</script>';
                echo'<script>window.location.href="login.php";</script>'; 
            }
            }
        }
        else{
            echo'<script> alert ("Account already exists!");</script>';
            echo'<script>window.location.href="login.php";</script>'; 
        }
}
?>