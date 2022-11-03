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
?>