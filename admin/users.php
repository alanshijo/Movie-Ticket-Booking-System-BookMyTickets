<?php
include 'admin-session.php';
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
  <script>
    function validateForm() {
      var pw1 = document.getElementById("newPassword").value;
      var pw2 = document.getElementById("renewPassword").value;
      if (pw2 != "" && pw1 != pw2) {
        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Password doesnot match";
        return false;
      } else {
        document.getElementById('msg1').style.display = "none";
      }
    }
  </script>
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
            <li class="active has-sub">
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
      <?php
      $user_check = "SELECT `type_id` FROM `tbl_usertype` WHERE `type_title` = 'user'";
      $user_check_rslt = mysqli_query($conn, $user_check);
      while ($row = mysqli_fetch_array($user_check_rslt)) {
        $type = $row['type_id'];
        $users = "SELECT * FROM `tbl_users` as a, `tbl_login` as b WHERE a.login_id=b.login_id and b.type_id='$type'";
        $users_run = mysqli_query($conn, $users);
        $i = 1;
      ?>
        <!-- HEADER DESKTOP-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="col">
                <!-- USER DATA-->
                <div class="user-data m-b-30">
                  <h3 class="title-3 m-b-30">
                    <i class="zmdi zmdi-account-calendar"></i>user data
                  </h3>
                  <div class="table-responsive table-data" style="height: 80%;">
                    <table class="table">
                      <thead style="text-align: center;">
                        <tr>
                          <th>Sl.No.</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone number</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php while ($data = mysqli_fetch_array($users_run)) { ?>
                        <tbody>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['user_fname'] . " " . $data['user_lname']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['user_phno']; ?></td>
                            <td><?php echo $data['user_status']; ?></td>
                            <td>
                              <a class="btn btn-outline-success btn-sm" href="?actid=<?php echo $data["user_id"]; ?>">&nbsp;Activate&emsp;</a><br><br>
                              <a class="btn btn-outline-danger btn-sm" href="?deactid=<?php echo $data["user_id"]; ?>">Deactivate</a>
                            </td>
                          </tr>
                      <?php
                        $i++;
                      }
                    }
                      ?>
                        </tbody>
                    </table>
                  </div>
                </div>
                <?php
                if (isset($_GET['actid'])) {
                  $id = $_GET['actid'];
                  $act = "UPDATE `tbl_users` SET `user_status`='active' WHERE `user_id`='$id'";
                  $act_run = mysqli_query($conn, $act);
                  if ($act_run) {
                    echo '<script>alert("Activated");</script>';
                    echo '<script>window.location.href="users.php"</script>';
                  }
                }
                if (isset($_GET['deactid'])) {
                  $id = $_GET['deactid'];
                  $act = "UPDATE `tbl_users` SET `user_status`='deactive' WHERE `user_id`='$id'";
                  $act_run = mysqli_query($conn, $act);
                  if ($act_run) {
                    echo '<script>alert("Deactivated");</script>';
                    echo '<script>window.location.href="users.php"</script>';
                  }
                }
                ?>
                <!-- END USER DATA-->
              </div>
            </div>
          </div>
        </div>
        <!-- MAIN CONTENT-->

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