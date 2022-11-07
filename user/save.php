<?php
include '../db_conn.php';
include 'user-session.php';
if (isset($_POST['update_profile'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $login_id = mysqli_real_escape_string($conn, $_POST['login_id']);
    $propic = mysqli_escape_string($conn, $_FILES['propic']['name']);
    $fname = mysqli_escape_string($conn, $_POST['fname']);
    $lname = mysqli_escape_string($conn, $_POST['lname']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $mobile = mysqli_escape_string($conn, $_POST['mobile']);
    move_uploaded_file($_FILES['propic']['tmp_name'], "img/uploads/" . $_FILES['propic']['name']);

    $query = "UPDATE `tbl_users` SET `pro_pic`='$propic',`user_fname`='$fname',`user_lname`='$lname',`user_phno`='$mobile' WHERE `user_id` = '$user_id';";
    $query_run = mysqli_query($conn, $query);
    // $last_id = mysqli_insert_id($conn);
    if($query_run){
        $query = "UPDATE `tbl_login` SET `email`='$email' WHERE `login_id` = '$login_id';";
        $query_run = mysqli_query($conn, $query);
    }
}
