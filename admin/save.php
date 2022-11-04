<?php
session_start();
include '../db_conn.php';
if(isset($_POST['save_student']))
{
    $poster = mysqli_escape_string($conn,$_FILES['poster']['name']);
    $title = mysqli_escape_string($conn,$_POST['title']);
    $lang = mysqli_escape_string($conn,$_POST['lang']);
    $cert = mysqli_escape_string($conn,$_POST['certificate']);
    $runtime = mysqli_escape_string($conn,$_POST['runtime']);
    $release = mysqli_escape_string($conn,$_POST['release']);
    move_uploaded_file($_FILES['poster']['tmp_name'],"uploads/".$_FILES['poster']['name']);
    $add_query = "INSERT INTO `tbl_movies`(`movie_poster`, `movie_name`, `movie_lang`, `movie_certificate`, `movie_runtime`, `movie_releasedate`) VALUES ('$poster', '$title', '$lang', '$cert', '$runtime', '$release')";
    $add_query_run = mysqli_query($conn,$add_query);
}

if(isset($_GET['movie_id']))
{
    $movie_id = mysqli_real_escape_string($conn, $_GET['movie_id']);

    $query = "SELECT * FROM tbl_movies WHERE movie_id='$movie_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $movie = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'data' => $movie
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['update_movie']))
{
    $movie_id = mysqli_real_escape_string($conn, $_POST['movie_id']);

    $poster = mysqli_escape_string($conn,$_FILES['poster']['name']);
    $title = mysqli_escape_string($conn,$_POST['title']);
    $lang = mysqli_escape_string($conn,$_POST['lang']);
    $cert = mysqli_escape_string($conn,$_POST['certificate']);
    $runtime = mysqli_escape_string($conn,$_POST['runtime']);
    $release = mysqli_escape_string($conn,$_POST['release']);
    move_uploaded_file($_FILES['poster']['tmp_name'],"uploads/".$_FILES['poster']['name']);

    $query = "UPDATE `tbl_movies` SET `movie_poster`='$poster',`movie_name`='$title',`movie_lang`='$lang',`movie_certificate`='$cert',`movie_runtime`='$runtime',`movie_releasedate`='$release' WHERE `movie_id` = '$movie_id'";
    $query_run = mysqli_query($conn, $query);
}

if(isset($_POST['delete_movie']))
{
    $movie_id = mysqli_real_escape_string($conn, $_POST['movie_id']);

    $query = "UPDATE `tbl_movies` SET `del_status`='1' WHERE `movie_id`='$movie_id'";
    $query_run = mysqli_query($conn, $query);
}
?>