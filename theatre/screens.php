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
    <title>Screens</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />


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
                        <li class="active has-sub">
                        <a class="js-arrow" href="screens.php">
                            <i class="fas fa-film"></i>Screens</a>
                        </li>
                        <li class="has-sub">
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="alert alert-success" id="addShow" style="display:none;">
                            Show added successfully
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-info" id="updateShow" role="alert" style="display:none;">
                            Show updated successfully
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger" id="delShow" role="alert" style="display:none;">
                            Show deleted successfully
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Screens

                                            <button type="button" class="btn btn-success" style="float: right;"
                                                data-bs-toggle="modal" data-bs-target="#screenAddModal">
                                                <i class="fa fa-plus"></i>&nbsp; Add screen
                                            </button>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl.No.</th>
                                                    <th>Screen title</th>
                                                    <th>Screen Resolution</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $_SESSION['thtr_id'] = $name['thtr_id'];
                                                $thtr_id = $_SESSION['thtr_id'];
                                                $query = "SELECT a.*, b.* FROM `tbl_theatrescreens` a INNER JOIN tbl_theatres b ON a.thtr_id=b.thtr_id and b.thtr_id='$thtr_id' and a.del_status='0'";
                                                $query_run = mysqli_query($conn, $query);
                                                $i=1;
                                                while($row = mysqli_fetch_array($query_run)){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['scrn_title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['scrn_resolution']; ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="<?php echo $row['scrn_id']; ?>"
                                                            class="editShowBtn fa fa-edit"
                                                            style="color: #0056b3;"></button> &nbsp;
                                                        <button type="button" value="<?php echo $row['scrn_id']; ?>"
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
            <!-- Add Screen -->
            <div class="modal fade" id="screenAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter show details</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                        </div>
                        <form id="saveScreen">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="">Screen title</label>
                                    <input type="text" name="scrn_title" class="form-control" placeholder="Enter screen title here"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="">Screen Resolution</label>
                                    <select name="resolution" id="resolution" class="form-control" required>
                                        <option hidden>Select resolution</option>
                                        <option value="4k">4K</option>
                                        <option value="2k">2K</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save screen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Screen Modal -->
            <div class="modal fade" id="screenEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Screen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateScreen">
                            <div class="modal-body">

                                <!-- <div id="errorMessageUpdate" class="alert alert-warning d-none"></div> -->

                                <input type="hidden" name="scrn_id" id="scrn_id">
                                <div class="mb-3">
                                    <label for="">Screen title</label>
                                    <input type="text" name="scrn_title" id="scrn_title" class="form-control" placeholder="Enter screen title here"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="">Screen Resolution</label>
                                    <select name="resolution" id="resolution" class="form-control" required>
                                        <option hidden>Select resolution</option>
                                        <option value="4k">4K</option>
                                        <option value="2k">2K</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update screen</button>
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

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script>
        $(document).on('submit', '#saveScreen', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_scrn", true);

            $.ajax({
                type: "POST",
                url: "save.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // $('#addShow').show();
                    $('#screenAddModal').modal('hide');
                    $('#saveScreen')[0].reset();
                    $('#myTable').load(location.href + " #myTable");
                }
            });

        });

        $(document).on('click', '.editShowBtn', function () {

            var scrn_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "save.php?scrn_id=" + scrn_id,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {

                        $('#scrn_id').val(res.data.scrn_id);
                        $('#scrn_title').val(res.data.scrn_title);
                        $('#resolution').val(res.data.scrn_resolution);

                        $('#screenEditModal').modal('show');
                    }
                }
            });

        });

        $(document).on('submit', '#updateScreen', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_scrn", true);

            $.ajax({
                type: "POST",
                url: "save.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#screenEditModal').modal('hide');
                    $('#updateScreen')[0].reset();
                    // $('#updateShow').show();
                    $('#myTable').load(location.href + " #myTable");

                }
            });

        });

        $(document).on('click', '.deleteShowBtn', function (e) {
            e.preventDefault();

            if (confirm('Are you sure you want to delete this data?')) {
                var scrn_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: {
                        'delete_scrn': true,
                        'scrn_id': scrn_id
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