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
  <title>Movies</title>

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
            <li class="active has-sub">
              <a class="js-arrow" href="movies.php">
                <i class="fas fa-film"></i>Movies</a>
            </li>
            <li class="has-sub">
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
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="alert alert-success" id="addMovie" style="display:none;">
              Movie added successfully
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- <div class="alert alert-info" id="updateMovie" role="alert" style="display:none;">
              Movie updated successfully
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> -->
            <div class="alert alert-danger" id="delMovie" role="alert" style="display:none;">
              Movie deleted successfully
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Movie data
                      <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal"
                        data-bs-target="#requestMovieModal">
                        <i class="fa fa-plus"></i>&nbsp; Request movie
                      </button>
                    </h4>
                  </div>
                  <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Sl.No.</th>
                          <th>Title</th>
                          <th>Release date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                        <?php
                        $query = "SELECT a.*, b.*, c.*, d.* FROM tbl_login a INNER JOIN tbl_theatres b ON a.login_id=b.login_id INNER JOIN tbl_theatremovies c ON c.thtr_id=b.thtr_id and a.email='$username' INNER JOIN tbl_movies d ON d.movie_id=c.movie_id";
                        $query_run = mysqli_query($conn, $query);
                        $i=1;
                        while($row = mysqli_fetch_array($query_run)){
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['movie_name']; ?></td>
                          <td><?php echo $row['movie_releasedate']; ?></td>
                          <td><?php echo $row['req_status']; ?></td>
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
      <div class="modal fade" id="requestMovieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Request for movies</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
            </div>
            <form id="request_movie" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="mb-3">
                  <select name="movies[]" class="sel-movies form-control" multiple>
                  <?php  
                  $movies = "SELECT * FROM `tbl_movies` WHERE `del_status` = '0'";
                  $movies_run = mysqli_query($conn, $movies);
                  foreach ($movies_run as $movie){
                  ?>
                  <option value="<?php echo $movie['movie_id']; ?>"><?php echo $movie['movie_name']; ?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send request</button>
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
    $(".sel-movies").select2({
      placeholder: 'Select movies'
    });
    $(document).on('submit', '#request_movie', function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("submit_request", true);

      $.ajax({
        type: "POST",
        url: "save.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          $('#requestMovieModal').modal('hide');
          $('#request_movie')[0].reset();
          $('#myTable').load(location.href + " #myTable");
        }
      });

    });

  </script>

</body>

</html>
<!-- end document-->