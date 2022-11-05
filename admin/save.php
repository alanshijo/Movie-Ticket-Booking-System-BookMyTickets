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
    $max_seat = mysqli_escape_string($conn, $_POST['max_seat']);
    $add_query = "INSERT INTO `tbl_theatres`(`thtr_name`, `thtr_place`, `thtr_max_seat`) VALUES ('$name','$loc','$max_seat')";
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
    $max_seat = mysqli_escape_string($conn, $_POST['max_seat']);

    $query = "UPDATE `tbl_theatres` SET `thtr_name`='$name',`thtr_place`='$loc',`thtr_max_seat`='$max_seat' WHERE `thtr_id` = '$thtr_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_thtr'])) {
    $thtr_id = mysqli_real_escape_string($conn, $_POST['thtr_id']);

    $query = "UPDATE `tbl_theatres` SET `del_status`='1' WHERE `thtr_id` = '$thtr_id'";
    $query_run = mysqli_query($conn, $query);
}
