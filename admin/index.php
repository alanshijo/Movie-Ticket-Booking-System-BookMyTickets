<!-- <?php
      include 'admin-session.php';
      ?> -->
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
  <title>Dashboard</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-user-alt"></i>Customers</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <!-- <a href="#">
          <img src="images/icon/logo.png" alt="Cool Admin" />
        </a> -->
        <img src="images/icon/main-logo-black.png" alt="" width="300px" height="80px">&ensp;
        <!-- <h1>
        FUELMAN
        </h1> -->
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="active has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="users.php">
                <i class="fas fa-users"></i>Users</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="movies.php">
                <i class="fas fa-film"></i>Movies</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="theatres.php">
                <i class="fa fa-building"></i>Theatres</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="shows.php">
                <i class="fa fa-clock"></i>Shows</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="assignmovies.php">
                <i class="fa fa-check-circle"></i>Assign movies</a>
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
                      <a class="js-acc-btn" href="#">ADMIN</a>
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

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="overview-wrap">
                  <h2 class="title-1">Dashboard</h2>
                </div>
              </div>
            </div>
            <div class="row m-t-25">
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                      </div>
                      <?php
                      include '../db_conn.php';
                      $users = "SELECT count(*) as count FROM tbl_login WHERE type_id = '2'";
                      $users_run = mysqli_query($conn, $users);
                      foreach ($users_run as $count)
                      ?>
                      <div class="text">
                        <h2><?php echo $count['count']; ?></h2>
                        <span>Users</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="fas fa-film"></i>
                      </div>
                      <?php
                      $movies = "SELECT count(*) as count FROM tbl_movies WHERE del_status='0'";
                      $movies_run = mysqli_query($conn, $movies);
                      foreach ($movies_run as $count)
                      ?>
                      <div class="text">
                        <h2><?php echo $count['count']; ?></h2>
                        <span>Movies</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="fas fa-video-camera"></i>
                      </div>
                      <?php
                      $thtrs = "SELECT count(*) as count FROM tbl_theatres WHERE del_status='0'";
                      $thtrs_run = mysqli_query($conn, $thtrs);
                      foreach ($thtrs_run as $count)
                      ?>
                      <div class="text">
                        <h2><?php echo $count['count']; ?></h2>
                        <span>Theatres</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                      </div>
                      <div class="text">
                        <h2>0</h2>
                        <span>Total bookings</span>
                      </div>
                    </div>
                    <div class="overview-chart">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-6">
                <div class="au-card recent-report">
                  <div class="au-card-inner">
                    <h3 class="title-2">recent reports</h3>
                    <div class="chart-info">
                      <div class="chart-info__left">
                        <div class="chart-note">
                          <span class="dot dot--blue"></span>
                          <span>products</span>
                        </div>
                        <div class="chart-note mr-0">
                          <span class="dot dot--green"></span>
                          <span>services</span>
                        </div>
                      </div>
                      <div class="chart-info__right">
                        <div class="chart-statis">
                          <span class="index incre">
                            <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                          <span class="label">products</span>
                        </div>
                        <div class="chart-statis mr-0">
                          <span class="index decre">
                            <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                          <span class="label">services</span>
                        </div>
                      </div>
                    </div>
                    <div class="recent-report__chart">
                      <canvas id="recent-rep-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="au-card chart-percent-card">
                  <div class="au-card-inner">
                    <h3 class="title-2 tm-b-5">char by %</h3>
                    <div class="row no-gutters">
                      <div class="col-xl-6">
                        <div class="chart-note-wrap">
                          <div class="chart-note mr-0 d-block">
                            <span class="dot dot--blue"></span>
                            <span>products</span>
                          </div>
                          <div class="chart-note mr-0 d-block">
                            <span class="dot dot--red"></span>
                            <span>services</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="percent-chart">
                          <canvas id="percent-chart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>

  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
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

  <!-- Main JS-->
  <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->