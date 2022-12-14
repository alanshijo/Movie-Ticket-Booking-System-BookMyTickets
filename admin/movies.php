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
              <a class="js-arrow" href="users.php">
                <i class="fas fa-users"></i>Users</a>
            </li>
            <li class="active has-sub">
              <a class="js-arrow" href="movies.php">
                <i class="fas fa-film"></i>Movies</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="theatres.php">
                <i class="fa fa-building"></i>Theatres</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="movierequests.php">
                <i class="fa fa-check-circle"></i>Movie requests</a>
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
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="alert alert-success" id="addMovie" style="display:none;">
              Movie added successfully
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert alert-info" id="updateMovie" role="alert" style="display:none;">
              Movie updated successfully
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
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
                        data-bs-target="#studentAddModal">
                        <i class="fa fa-plus"></i>&nbsp; Add movie
                      </button>
                    </h4>
                  </div>
                  <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Sl.No.</th>
                          <th>Poster image</th>
                          <th>Title</th>
                          <th>Language</th>
                          <th>Certificate</th>
                          <th>Total runtime</th>
                          <th>Release date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require '../db_conn.php';

                        $query = "SELECT * FROM tbl_movies WHERE del_status='0'";
                        $query_run = mysqli_query($conn, $query);
                        $i = 1;
                        while ($movie = mysqli_fetch_array($query_run)) {

                        ?>
                        <tr>
                          <td>
                            <?php echo $i; ?>
                          </td>
                          <td style="width: 200px; height: 200px;"><img
                              src="uploads/<?php echo $movie['movie_poster']; ?>" alt="poster"></td>
                          <td>
                            <?= $movie['movie_name'] ?>
                          </td>
                          <td>
                            <?= $movie['movie_lang'] ?>
                          </td>
                          <td>
                            <?= $movie['movie_certificate'] ?>
                          </td>
                          <td>
                            <?= $movie['movie_runtime'] ?>
                          </td>
                          <td>
                            <?= $movie['movie_releasedate'] ?>
                          </td>
                          <td>
                            <button type="button" value="<?php echo $movie['movie_id']; ?>"
                              class="editMovieBtn fa fa-edit" style="color: #0056b3;"></button> &nbsp;
                            <button type="button" value="<?php echo $movie['movie_id']; ?>"
                              class="deleteMovieBtn fa fa-trash" style="color: #0056b3;"></button>
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
      <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter movie details</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>

            </div>
            <form id="saveStudent" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="mb-3">
                  <label for="">Poster image</label>
                  <input type="file" class="form-control" name="poster" id="poster" accept=".jpg, .png, .jpeg" data-parsley-required="true"
                    data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/png, image/jpg"
                    data-parsley-required-message="Required.">
                </div>
                <div class="mb-3">
                  <label for="">Title</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Enter movie name here"
                    data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
                <div class="mb-3">
                  <label for="">Language</label>
                  <select name="lang" id="lang" class="form-control" required=""
                    data-parsley-required-message="You must select an option.">
                    <option value="" hidden>Select language</option>
                    <option value="English">English</option>
                    <option value="Malayalam">Malayalam</option>
                    <option value="Tamil">Tamil</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Kannada">Kannada</option>
                  </select>
                </div>
                <!-- <div class="mb-3">
                  <label for="">Genres</label>
                  <select name="genre[]" class="genre-select form-control" required multiple>
                  <?php
                  $genres = "SELECT * FROM `tbl_genres` ORDER BY `genre_title`";
                  $genres_run = mysqli_query($conn, $genres);
                  foreach ($genres_run as $genre) {
                  ?>
                        <option value="<?php echo $genre['genre_id']; ?>"><?php echo $genre['genre_title']; ?></option>
                        <?php
                  }
                        ?>
                  </select>
                </div> -->
                <div class="mb-3">
                  <label for="">Certificate</label>
                  <select name="certificate" class="form-control" required=""
                    data-parsley-required-message="You must select an option.">
                    <option value="" hidden>Select certificate type</option>
                    <option value="U">U certificate</option>
                    <option value="U/A">U/A certificate</option>
                    <option value="A">A certificate</option>
                    <option value="S">S certificate</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="">Total runtime</label>
                  <input type="text" name="runtime" class="form-control" placeholder="00hr 00min"
                    data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
                <div class="mb-3">
                  <label for="">Release date</label>
                  <input type="date" name="release" class="form-control" placeholder="DD/MM/YYYY"
                    data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save movie</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Student Modal -->
      <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit movie data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateStudent">
              <div class="modal-body">

                <!-- <div id="errorMessageUpdate" class="alert alert-warning d-none"></div> -->

                <input type="hidden" name="movie_id" id="movie_id">

                <div class="mb-3">
                  <label for="">Poster image</label>
                  <input type="file" class="form-control" name="poster" id="poster" accept=".jpg, .png, .jpeg"
                  data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/png, image/jpg" data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
                <div class="mb-3">
                  <label for="">Title</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Enter movie name here"
                    data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
                <div class="mb-3">
                  <label for="">Language</label>
                  <select name="lang" id="lang" class="form-control" required=""
                    data-parsley-required-message="You must select an option.">
                    <option value="" hidden>Select language</option>
                    <option value="English">English</option>
                    <option value="Malayalam">Malayalam</option>
                    <option value="Tamil">Tamil</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Kannada">Kannada</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="">Certificate</label>
                  <select name="certificate" id="certificate" class="form-control" required=""
                    data-parsley-required-message="You must select an option.">
                    <option value="" hidden>Select certificate type</option>
                    <option value="U">U certificate</option>
                    <option value="U/A">U/A certificate</option>
                    <option value="A">A certificate</option>
                    <option value="S">S certificate</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="">Total runtime</label>
                  <input type="text" name="runtime" id="runtime" class="form-control" placeholder="00hr 00min"
                    data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
                <div class="mb-3">
                  <label for="">Release date</label>
                  <input type="date" name="release" id="release" class="form-control" placeholder="DD/MM/YYYY"
                    data-parsley-required="true" data-parsley-required-message="Required.">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Movie</button>
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
  <script src="js/parsley.js"></script>
  <script>
    $('#saveStudent').parsley();
    $('#updateStudent').parsley();
    var app = app || {};

    // Utils
    (function ($, app) {
      'use strict';

      app.utils = {};

      app.utils.formDataSuppoerted = (function () {
        return !!('FormData' in window);
      }());

    }(jQuery, app));

    // Parsley validators
    (function ($, app) {
      'use strict';

      window.Parsley
        .addValidator('filemimetypes', {
          requirementType: 'string',
          validateString: function (value, requirement, parsleyInstance) {

            if (!app.utils.formDataSuppoerted) {
              return true;
            }

            var file = parsleyInstance.$element[0].files;

            if (file.length == 0) {
              return true;
            }

            var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
            return allowedMimeTypes.indexOf(file[0].type) !== -1;

          },
          messages: {
            en: 'Only jpeg, jpg, png formats are supported.'
          }
        });

    }(jQuery, app));


    // Parsley Init
    (function ($, app) {
      'use strict';

      $('#js-file-validation-example').parsley();

    }(jQuery, app));
    $(".genre-select").select2({
      placeholder: 'Select genres'
    });
    $(document).on('submit', '#saveStudent', function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append("save_student", true);
      if ($(this).parsley().isValid()) {
        $.ajax({
          type: "POST",
          url: "save.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            $('#addMovie').show();
            $('#studentAddModal').modal('hide');
            $('#saveStudent')[0].reset();
            $('#myTable').load(location.href + " #myTable");
          }
        });
      }
    });

    $(document).on('click', '.editMovieBtn', function () {

      var movie_id = $(this).val();

      $.ajax({
        type: "GET",
        url: "save.php?movie_id=" + movie_id,
        success: function (response) {

          var res = jQuery.parseJSON(response);
          if (res.status == 200) {
            $('#movie_id').val(res.data.movie_id);
            $('#title').val(res.data.movie_name);
            $('#lang').val(res.data.movie_lang);
            $('#certificate').val(res.data.movie_certificate);
            $('#runtime').val(res.data.movie_runtime);
            $('#release').val(res.data.movie_releasedate);

            $('#studentEditModal').modal('show');
          }
        }
      });

    });

    $(document).on('submit', '#updateStudent', function (e) {
      e.preventDefault();
        if ($(this).parsley().isValid()) {
          var formData = new FormData(this);
          formData.append("update_movie", true);

          $.ajax({
            type: "POST",
            url: "save.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              $('#studentEditModal').modal('hide');
              $('#updateStudent')[0].reset();
              $('#updateMovie').show();

              $('#myTable').load(location.href + " #myTable");

            }
          });
        }
    });

    $(document).on('click', '.deleteMovieBtn', function (e) {
      e.preventDefault();

      if (confirm('Are you sure you want to delete this data?')) {
        var movie_id = $(this).val();
        $.ajax({
          type: "POST",
          url: "save.php",
          data: {
            'delete_movie': true,
            'movie_id': movie_id
          },
          success: function (response) {
            $('#delMovie').show();
            $('#myTable').load(location.href + " #myTable");
          }
        });
      }
    });
  </script>

</body>

</html>
<!-- end document-->