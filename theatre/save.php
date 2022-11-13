<?php
include '../db_conn.php';
include 'thtr-session.php';
if (isset($_POST['save_show'])) {
    $time = mysqli_escape_string($conn, $_POST['time']);
    $thtr_id = "SELECT a.*, b.* FROM `tbl_login` a INNER JOIN `tbl_theatres` b ON a.login_id=b.login_id and a.email = '$username'";
    $thtr_id_run = mysqli_query($conn, $thtr_id);
    while($thtr = mysqli_fetch_array($thtr_id_run)){
    $thtrid = $thtr['thtr_id'];
    $add_query = "INSERT INTO `tbl_shows`(`thtr_id`, `show_time`) VALUES ('$thtrid','$time')";
    $add_query_run = mysqli_query($conn, $add_query);
    }
}
if (isset($_GET['show_id'])) {
    $show_id = mysqli_real_escape_string($conn, $_GET['show_id']);

    $query = "SELECT * FROM `tbl_shows` WHERE `show_id` = '$show_id'";
    $query_run = mysqli_query($conn, $query);


    if (mysqli_num_rows($query_run) == 1) {
        $show = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'data' => $show
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_show'])) {
    $show_id = mysqli_real_escape_string($conn, $_POST['show_id']);

    $time = mysqli_escape_string($conn, $_POST['time']);

    $query = "UPDATE `tbl_shows` SET `show_time`='$time' WHERE `show_id` = '$show_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_show'])) {
    $show_id = mysqli_real_escape_string($conn, $_POST['show_id']);

    $query = "UPDATE `tbl_shows` SET `del_status`='1' WHERE `show_id` = '$show_id'";
    $query_run = mysqli_query($conn, $query);
}
?>