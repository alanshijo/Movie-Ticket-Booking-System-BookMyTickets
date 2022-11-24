<?php
include 'thtr-session.php';
include '../db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Shows</title>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    
  <style>
    .parsley-errors-list {
      list-style-type: none;
      color: red;
    }
  </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/main-logo-black.png" alt="BookMyTickets" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="users.php">
                                <i class="fas fa-user-alt"></i>Users</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="images/icon/main-logo-black.png" alt="" width="300px" height="80px">
                </a>
                <!-- <img src="images/icon/main-logo-black.png" alt="" width="300px" height="80px">&ensp; -->
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="shows.php">
                                <i class="fa fa-clock"></i>Shows</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="movies.php">
                                <i class="fas fa-film"></i>Movies</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="screens.php">
                                <i class="fas fa-film"></i>Screens</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="assignshows.php">
                                <i class="fa fa-check-circle"></i>Assign shows</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content" style="margin-left: 1050px;">
                                        <?php
                                        // echo $username;
                                        $thtrname = "SELECT a.*, b.* FROM `tbl_login` a INNER JOIN `tbl_theatres` b ON a.login_id=b.login_id and a.email='$username'";
                                        $thtrname_run = mysqli_query($conn, $thtrname);
                                        foreach ($thtrname_run as $name)
                                        ?>
                                        <a class="js-acc-btn" href="#">
                                            <?php echo $name['thtr_name']; ?>
                                        </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="change-pass.php">
                                                    <i class="fas fa-lock"></i>Change password</a>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <div class="main-content">
                <div class="section">
                    <div class="container-fluid">
                        <div id="successalert"
                            class="sufee-alert alert with-close alert-success alert-dismissible fade show"
                            style="display: none;">
                            <span class="badge badge-pill badge-success"><i class="fas fa-check"></i></span>
                            Successfully approved the request.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div id="rejectalert"
                            class="sufee-alert alert with-close alert-danger alert-dismissible fade show"
                            style="display: none;">
                            <span class="badge badge-pill badge-danger"><i class="fas fa-ban"></i></span>
                            Request rejected.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Theatre shows

                                            <button type="button" class="btn btn-success" style="float: right;"
                                                data-bs-toggle="modal" data-bs-target="#assignShowModal">
                                                <i class="fa fa-check"></i>&nbsp; Assign show
                                            </button>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl.No.</th>
                                                    <th>Movie</th>
                                                    <th>Screen</th>
                                                    <th>Show timings</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 1;
                                            $thtr = $name['thtr_id'];
                                            $_SESSION['thtr_id'] = $thtr;
                                            $query = "SELECT a.*, b.scrn_title, c.movie_name, d.show_time, e.thtr_id FROM `tbl_assignshows` a INNER JOIN `tbl_theatrescreens` b INNER JOIN `tbl_movies` c 
                                            INNER JOIN `tbl_shows` d INNER JOIN `tbl_theatres` e ON a.scrn_id=b.scrn_id and a.movie_id=c.movie_id and a.show_id=d.show_id and e.thtr_id='$thtr' and a.del_status='0'";
                                            $query_run = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($query_run)) {
                                                $ftime = date('g:i A', strtotime($row['show_time']));
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['movie_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['scrn_title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ftime; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['run_status']; ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="<?php echo $row['as_id']; ?>"
                                                            class="editShowBtn fa fa-edit"
                                                            style="color: #0056b3;"></button> &nbsp;
                                                        <button type="button" value="<?php echo $row['as_id']; ?>"
                                                            class="deleteShowBtn fa fa-trash"
                                                            style="color: #0056b3;"></button>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAIN CONTENT-->
            <!-- Add Student -->
            <div class="modal fade" id="assignShowModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign show</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="assign_show">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="">Screens</label>
                                    <select name="scrn" class="form-control" required="" data-parsley-required-message="You must select an option.">
                                        <option hidden>-Select screen-</option>
                                        <?php
                                        $scrns = "SELECT a.* FROM `tbl_theatrescreens` a INNER JOIN tbl_theatres b ON a.thtr_id=b.thtr_id and a.thtr_id='$thtr' and a.`del_status`='0'";
                                        $scrns_run = mysqli_query($conn, $scrns);
                                        while ($fetch1 = mysqli_fetch_array($scrns_run)) {
                                        ?>
                                        <option value="<?php echo $fetch1['scrn_id']; ?>">
                                            <?php echo $fetch1['scrn_title']; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="">Movies</label>
                                    <select name="movie" class="form-control" required="" data-parsley-required-message="You must select an option.">

                                        <?php
                                        $movies = "SELECT a.* FROM `tbl_movies` a INNER JOIN tbl_theatres b INNER JOIN tbl_theatremovies c ON a.movie_id=c.movie_id and b.thtr_id=c.thtr_id and b.thtr_id='$thtr' and c.req_status='approved' and a.`del_status`='0'";
                                        $movies_run = mysqli_query($conn, $movies);
                                        while ($fetch2 = mysqli_fetch_array($movies_run)) {
                                        ?>
                                        <option hidden>-Select movie-</option>
                                        <option value="<?php echo $fetch2['movie_id']; ?>">
                                            <?php echo $fetch2['movie_name']; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Shows</label>
                                    <select name="shows[]" class="sel-shows form-control" multiple required="" data-parsley-required-message="You must select an option.">
                                        <?php
                                        $shows = "SELECT a.* FROM `tbl_shows` a INNER JOIN `tbl_theatres` b ON b.thtr_id='$thtr' and a.thtr_id=b.thtr_id and a.`del_status` = '0'";
                                        $shows_run = mysqli_query($conn, $shows);
                                        foreach ($shows_run as $show) {
                                            $ftime = date('g:i A', strtotime($show['show_time']));
                                        ?>
                                        <option value="<?php echo $show['show_id']; ?>">
                                            &emsp;
                                            <?php echo $ftime; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Student -->
            <div class="modal fade" id="editassignShowModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign show</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="edit_assign_show">
                            <div class="modal-body">
                                <input type="hidden" name="as_id" id="as_id">
                                <div class="mb-3">
                                    <label for="">Screens</label>
                                    <select name="scrn" id="scrn" class="form-control">
                                        <?php
                                        $scrns = "SELECT a.* FROM `tbl_theatrescreens` a INNER JOIN tbl_theatres b ON a.thtr_id=b.thtr_id and a.thtr_id='$thtr' and a.`del_status`='0'";
                                        $scrns_run = mysqli_query($conn, $scrns);
                                        while ($fetch1 = mysqli_fetch_array($scrns_run)) {
                                        ?>
                                        <option hidden>-Select screen-</option>
                                        <option value="<?php echo $fetch1['scrn_id']; ?>">
                                            <?php echo $fetch1['scrn_title']; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="">Movies</label>
                                    <select name="movie" id="movie" class="form-control">

                                        <?php
                                        $movies = "SELECT a.* FROM `tbl_movies` a INNER JOIN tbl_theatres b INNER JOIN tbl_theatremovies c ON a.movie_id=c.movie_id and b.thtr_id=c.thtr_id and b.thtr_id='$thtr' and c.req_status='approved' and a.`del_status`='0'";
                                        $movies_run = mysqli_query($conn, $movies);
                                        while ($fetch2 = mysqli_fetch_array($movies_run)) {
                                        ?>
                                        <option hidden>-Select movie-</option>
                                        <option value="<?php echo $fetch2['movie_id']; ?>">
                                            <?php echo $fetch2['movie_name']; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Shows</label>
                                    <select name="shows" id="shows" class="form-control">
                                        <?php
                                        $movies = "SELECT a.* FROM `tbl_movies` a INNER JOIN tbl_theatres b INNER JOIN tbl_theatremovies c ON a.movie_id=c.movie_id and b.thtr_id=c.thtr_id and b.thtr_id='$thtr' and c.req_status='approved' and a.`del_status`='0'";
                                        $movies_run = mysqli_query($conn, $movies);
                                        foreach ($shows_run as $show) {
                                            $ftime = date('g:i A', strtotime($show['show_time']));
                                        ?>
                                        <option value="<?php echo $show['show_id']; ?>">
                                            <!-- &emsp; -->
                                            <?php echo $ftime; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Edit show</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Main JS-->
    <script src="js/main.js"></script>
  <script src="js/parsley.js"></script>
    <script>
        
        $(".sel-shows").select2({
            placeholder: 'Select show'
        });

        $('#assign_show').parsley();
        $(document).on('submit', '#assign_show', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("submit_show", true);
            if ($(this).parsley().isValid()) {
            $.ajax({
                type: "POST",
                url: "save.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // alert(response);
                    // $('#addShow').show();
                    $('#assignShowModal').modal('hide');
                    $('#assign_show')[0].reset();
                    $('#myTable').load(location.href + " #myTable");
                }
            });
            }
        });

        $(document).on('click', '.editShowBtn', function () {

            var as_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "save.php?as_id=" + as_id,
                success: function (response) {
                    // alert(response);
                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {

                        $('#as_id').val(res.data.as_id);
                        $('#scrn').val(res.data.scrn_id);
                        $('#movie').val(res.data.movie_id);
                        $('#shows').val(res.data.show_id);

                        $('#editassignShowModal').modal('show');
                    }
                }
            });

        });

        $(document).on('submit', '#edit_assign_show', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_assign_shows", true);

            $.ajax({
                type: "POST",
                url: "save.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // alert(response);
                    $('#editassignShowModal').modal('hide');
                    $('#edit_assign_show')[0].reset();
                    // $('#updateShow').show();
                    $('#myTable').load(location.href + " #myTable");

                }
            });

        });

        $(document).on('click', '.deleteShowBtn', function (e) {
            e.preventDefault();

            if (confirm('Are you sure you want to delete this data?')) {
                var as_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: {
                        'delete_shows': true,
                        'as_id': as_id
                    },
                    success: function (response) {
                        // $('#delShow').show();
                        $('#myTable').load(location.href + " #myTable");
                    }
                });
            }
        });
    </script>

</body>

</html>
<!-- end document-->