<?php
session_start(); 
include 'db_conn.php';
if(isset($_POST['submit_login'])){
    $user = $_POST['username'];
    $password = $_POST['password'];
    $login_check = "SELECT a.*, b.*, c.*, d.* FROM tbl_login a INNER JOIN tbl_usertype b ON a.email='$user' and a.password='$password' and a.type_id=b.type_id LEFT OUTER JOIN tbl_users c ON a.login_id = c.login_id LEFT OUTER JOIN tbl_theatres d ON a.login_id = d.login_id";
	$login_check_result = mysqli_query($conn, $login_check);
	$rsltcheck = mysqli_num_rows($login_check_result);
    $row = mysqli_fetch_array($login_check_result);
    if($rsltcheck == 1){        
        if($row['email'] == $user && $row['password'] == $password && $row['type_title'] == "user" && $row['user_status'] == "active"){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type_title'] = $row['type_title'];
            header("location: user/");
        }
        else if($row['email'] == $user && $row['password'] == $password && $row['type_title'] == "user" && $row['user_status'] == "deactive"){
            echo '<script> alert ("Your account has been blocked.");</script>';
	        echo'<script>window.location.href="login.php";</script>';
        }
        else if($row['email'] == $user && $row['password'] == $password && $row['type_title'] == "theatre"){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type_title'] = $row['type_title'];
            header("location: theatre/");
        }
        else if($row['email'] == $user && $row['password'] == $password && $row['type_title'] == "admin"){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type_title'] = $row['type_title'];
            header("location: admin/");
        }
    }
    else{
        echo '<script> alert ("Invalid credentials");</script>';
	    echo'<script>window.location.href="login.php";</script>';
    }

}
?>