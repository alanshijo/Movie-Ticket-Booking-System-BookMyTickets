<?php
session_start();
include '../db_conn.php';

if (isset($_GET['actid'])) {
    $id = $_GET['actid'];
    $act = "UPDATE `tbl_users` SET `user_status`='active' WHERE `user_id`='$id'";
    $act_run = mysqli_query($conn, $act);
}

if (isset($_GET['deactid'])) {
    $id = $_GET['deactid'];
    $act = "UPDATE `tbl_users` SET `user_status`='deactive' WHERE `user_id`='$id'";
    $act_run = mysqli_query($conn, $act);
}

if (isset($_POST['save_student'])) {
    $poster = mysqli_escape_string($conn, $_FILES['poster']['name']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $lang = mysqli_escape_string($conn, $_POST['lang']);
    $cert = mysqli_escape_string($conn, $_POST['certificate']);
    $runtime = mysqli_escape_string($conn, $_POST['runtime']);
    $release = mysqli_escape_string($conn, $_POST['release']);
    move_uploaded_file($_FILES['poster']['tmp_name'], "uploads/" . $_FILES['poster']['name']);
    $add_query = "INSERT INTO `tbl_movies`(`movie_poster`, `movie_name`, `movie_lang`, `movie_certificate`, `movie_runtime`, `movie_releasedate`) VALUES ('$poster', '$title', '$lang', '$cert', '$runtime', '$release')";
    $add_query_run = mysqli_query($conn, $add_query);
}

if (isset($_GET['movie_id'])) {
    $movie_id = mysqli_real_escape_string($conn, $_GET['movie_id']);

    $query = "SELECT * FROM tbl_movies WHERE movie_id='$movie_id'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $movie = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'data' => $movie
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_movie'])) {
    $movie_id = mysqli_real_escape_string($conn, $_POST['movie_id']);

    $poster = mysqli_escape_string($conn, $_FILES['poster']['name']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $lang = mysqli_escape_string($conn, $_POST['lang']);
    $cert = mysqli_escape_string($conn, $_POST['certificate']);
    $runtime = mysqli_escape_string($conn, $_POST['runtime']);
    $release = mysqli_escape_string($conn, $_POST['release']);
    move_uploaded_file($_FILES['poster']['tmp_name'], "uploads/" . $_FILES['poster']['name']);

    $query = "UPDATE `tbl_movies` SET `movie_poster`='$poster',`movie_name`='$title',`movie_lang`='$lang',`movie_certificate`='$cert',`movie_runtime`='$runtime',`movie_releasedate`='$release' WHERE `movie_id` = '$movie_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_movie'])) {
    $movie_id = mysqli_real_escape_string($conn, $_POST['movie_id']);

    $query = "UPDATE `tbl_movies` SET `del_status`='1' WHERE `movie_id`='$movie_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['save_thtr'])) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $loc = mysqli_escape_string($conn, $_POST['location']);
    $price = mysqli_escape_string($conn, $_POST['price']);
    $add_query = "INSERT INTO `tbl_theatres`(`thtr_name`, `thtr_place`, `ticket_price`) VALUES ('$name','$loc','$price')";
    $add_query_run = mysqli_query($conn, $add_query);
}

if (isset($_GET['thtr_id'])) {
    $thtr_id = mysqli_real_escape_string($conn, $_GET['thtr_id']);

    $query = "SELECT * FROM `tbl_theatres` WHERE `thtr_id` = '$thtr_id'";
    $query_run = mysqli_query($conn, $query);


    if (mysqli_num_rows($query_run) == 1) {
        $thtr = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'data' => $thtr
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_thtr'])) {
    $thtr_id = mysqli_real_escape_string($conn, $_POST['thtr_id']);

    $name = mysqli_escape_string($conn, $_POST['name']);
    $loc = mysqli_escape_string($conn, $_POST['location']);
    $price = mysqli_escape_string($conn, $_POST['price']);

    $query = "UPDATE `tbl_theatres` SET `thtr_name`='$name',`thtr_place`='$loc',`ticket_price`='$price' WHERE `thtr_id` = '$thtr_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_thtr'])) {
    $thtr_id = mysqli_real_escape_string($conn, $_POST['thtr_id']);

    $query = "UPDATE `tbl_theatres` SET `del_status`='1' WHERE `thtr_id` = '$thtr_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['save_show'])) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $time = mysqli_escape_string($conn, $_POST['time']);
    $add_query = "INSERT INTO `tbl_shows`(`show_name`, `show_time`) VALUES ('$name','$time')";
    $add_query_run = mysqli_query($conn, $add_query);
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

    $name = mysqli_escape_string($conn, $_POST['name']);
    $time = mysqli_escape_string($conn, $_POST['time']);

    $query = "UPDATE `tbl_shows` SET `show_name`='$name',`show_time`='$time' WHERE `show_id` = '$show_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_show'])) {
    $show_id = mysqli_real_escape_string($conn, $_POST['show_id']);

    $query = "UPDATE `tbl_shows` SET `del_status`='1' WHERE `show_id` = '$show_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['assign_movie'])) {
    $thtr_id = mysqli_escape_string($conn, $_POST['thtr']);
    $movies_id = $_POST['movies'];
    $shows_id = $_POST['shows'];

    foreach($movies_id as $movie_id){
        $query = "INSERT INTO `tbl_theatremovies`(`thtr_id`, `movie_id`) VALUES ('$thtr_id','$movie_id')";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
            $last_id = mysqli_insert_id($conn);
            foreach($shows_id as $show_id){
                $query = "INSERT INTO `tbl_theatreshows`(`show_id`, `tm_id`) VALUES ('$show_id','$last_id')";
                $query_run = mysqli_query($conn,$query);
            }
        }
    }
}
