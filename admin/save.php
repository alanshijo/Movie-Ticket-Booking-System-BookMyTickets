<?php
session_start();
include '../db_conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
if (isset($_GET['actid'])) {
    $id = $_GET['actid'];
    $act = "UPDATE `tbl_users` SET `user_status`='active' WHERE `user_id`='$id'";
    $act_run = mysqli_query($conn, $act);
    if($act_run){
        $res = [
            'status' => 200
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['deactid'])) {
    $id = $_GET['deactid'];
    $act = "UPDATE `tbl_users` SET `user_status`='deactive' WHERE `user_id`='$id'";
    $act_run = mysqli_query($conn, $act);
    if($act_run){
        $res = [
            'status' => 200
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['save_student'])) {
    $poster = mysqli_escape_string($conn, $_FILES['poster']['name']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $lang = mysqli_escape_string($conn, $_POST['lang']);
    $genres_id = $_POST['genre'];
    $cert = mysqli_escape_string($conn, $_POST['certificate']);
    $runtime = mysqli_escape_string($conn, $_POST['runtime']);
    $release = mysqli_escape_string($conn, $_POST['release']);
    move_uploaded_file($_FILES['poster']['tmp_name'], "uploads/" . $_FILES['poster']['name']);
    $add_query = "INSERT INTO `tbl_movies`(`movie_poster`, `movie_name`, `movie_lang`, `movie_certificate`, `movie_runtime`, `movie_releasedate`) VALUES ('$poster', '$title', '$lang', '$cert', '$runtime', '$release')";
    $add_query_run = mysqli_query($conn, $add_query);
    // $last_id = mysqli_insert_id($conn);
    // if($add_query_run){
    //     foreach($genres_id as $genre_id){
    //         $assign_genre = "INSERT INTO `tbl_moviegenres`(`genre_id`, `movie_id`) VALUES ('$genre_id','$last_id')";
    //         $assign_genre_run = mysqli_query($conn, $assign_genre);
    //     }
    // }
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

if (isset($_POST['savethtr'])) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $loc = mysqli_escape_string($conn, $_POST['location']);
    $thtr_email = mysqli_escape_string($conn, $_POST['email']);
    $check_user = "SELECT * FROM `tbl_login` WHERE `email` = '$thtr_email'";
    $check_user_run = mysqli_query($conn, $check_user);
    $check_user_rslt = mysqli_num_rows($check_user_run);
    if ($check_user_rslt == 0) {
        $pass = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $gen_pass = substr(str_shuffle($pass), 0, 8);
        $type_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_title` = 'theatre'";
        $type_check_rslt = mysqli_query($conn, $type_check);
        while ($type = mysqli_fetch_array($type_check_rslt)) {
            $thtrid = $type['type_id'];
            $insertlogin = "INSERT INTO `tbl_login`(`email`, `password`,`type_id`) VALUES ('$thtr_email','$gen_pass','$thtrid')";
            $insertlogin_run = mysqli_query($conn, $insertlogin);
            $last_id = mysqli_insert_id($conn);
            if ($insertlogin_run) {
                $inserttheatre = "INSERT INTO `tbl_theatres`(`login_id`, `thtr_name`, `thtr_place`) VALUES ('$last_id','$name','$loc')";
                $inserttheatre_run = mysqli_query($conn, $inserttheatre);
                if ($inserttheatre_run) {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP(); //Send using SMTP
                    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                    $mail->SMTPAuth = true; //Enable SMTP authentication
                    $mail->Username = 'alanshijo2023a@mca.ajce.in'; //SMTP username
                    $mail->Password = ''; //SMTP password
                    $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
                    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('alanshijo2023a@mca.ajce.in', 'BookMyTickets');
                    $mail->addAddress($thtr_email); //Add a recipient
                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'BookMyTickets - Theatre account';
                    $body = "<strong><u>Login details</u></strong><br><br>
                            Username/email: $thtr_email<br>
                            Password: $gen_pass";
                    $mail->Body = $body;
                    $mail->AltBody = strip_tags($body);
                    $mail->send();
                }
            }
            else{
                
            }
        }

    } else {
    }

}

if (isset($_GET['thtr_id'])) {
    $thtr_id = mysqli_real_escape_string($conn, $_GET['thtr_id']);
    $query = "SELECT a.*,b.* FROM tbl_theatres as a INNER JOIN tbl_login as b ON a.login_id = b.login_id and `thtr_id` = '$thtr_id'";
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

    $thtr_email = mysqli_escape_string($conn, $_POST['email']);
    $name = mysqli_escape_string($conn, $_POST['name']);
    $loc = mysqli_escape_string($conn, $_POST['location']);
    $query = "UPDATE tbl_theatres a JOIN tbl_login b ON a.login_id = b.login_id and a.thtr_id = '$thtr_id' SET a.thtr_name = '$name', a.thtr_place = '$loc', b.email = '$thtr_email'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_POST['delete_thtr'])) {
    $thtr_id = mysqli_real_escape_string($conn, $_POST['thtr_id']);

    $query = "UPDATE `tbl_theatres` SET `del_status`='1' WHERE `thtr_id` = '$thtr_id'";
    $query_run = mysqli_query($conn, $query);
}

if (isset($_GET['app_id'])) {
    $req_id = mysqli_escape_string($conn, $_GET['app_id']);
    $query = "UPDATE `tbl_theatremovies` SET `req_status`='approved' WHERE `tm_id` = $req_id";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $res = [
            'status' => 200
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['rejct_id'])) {
    $req_id = mysqli_escape_string($conn, $_GET['rejct_id']);
    $query = "UPDATE `tbl_theatremovies` SET `req_status`='rejected' WHERE `tm_id` = $req_id";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $res = [
            'status' => 200
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['save_csv'])) {
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)) {
        $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');
        fgetcsv($csvFile);
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
            $name = $getData[0];
            $thtr_email = $getData[1];
            $loc = $getData[2];
            $check_user = "SELECT * FROM `tbl_login` WHERE `email` = '$thtr_email'";
            $check_user_run = mysqli_query($conn, $check_user);
            $check_user_rslt = mysqli_num_rows($check_user_run);
            if ($check_user_rslt ==0) {
                $pass = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                $gen_pass = substr(str_shuffle($pass), 0, 8);
                $type_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_title` = 'theatre'";
                $type_check_rslt = mysqli_query($conn, $type_check);
                while ($type = mysqli_fetch_array($type_check_rslt)) {
                    $thtrid = $type['type_id'];
                    $insertlogin = "INSERT INTO `tbl_login`(`email`, `password`,`type_id`) VALUES ('$thtr_email','$gen_pass','$thtrid')";
                    $insertlogin_run = mysqli_query($conn, $insertlogin);
                    $last_id = mysqli_insert_id($conn);
                    if ($insertlogin_run) {
                        $inserttheatre = "INSERT INTO `tbl_theatres`(`login_id`, `thtr_name`, `thtr_place`) VALUES ('$last_id','$name','$loc')";
                        $inserttheatre_run = mysqli_query($conn, $inserttheatre);
                        if ($inserttheatre_run) {
                            $mail = new PHPMailer(true);
                            $mail->isSMTP(); //Send using SMTP
                            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                            $mail->SMTPAuth = true; //Enable SMTP authentication
                            $mail->Username = 'alanshijo2023a@mca.ajce.in'; //SMTP username
                            $mail->Password = ''; //SMTP password
                            $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
                            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                            //Recipients
                            $mail->setFrom('alanshijo2023a@mca.ajce.in', 'BookMyTickets');
                            $mail->addAddress($thtr_email); //Add a recipient
                            //Content
                            $mail->isHTML(true); //Set email format to HTML
                            $mail->Subject = 'BookMyTickets - Theatre account';
                            $body = "<strong><u>Login details</u></strong><br><br>
                            Username/email: $thtr_email<br>
                            Password: $gen_pass";
                            $mail->Body = $body;
                            $mail->AltBody = strip_tags($body);
                            $mail->send();
                        }
                    }
                }

            } else {
            
            }
        }
        fclose($csvFile);
    }
}