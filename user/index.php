<?php
include 'user-session.php';
include '../db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>BookMyTickets</title>

</head>

<body class="body">

	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="index.html" class="header__logo">
								<img src="../imgs/main-logo.png" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<?php
								$username = "SELECT a.email, b.user_fname, b.user_lname FROM tbl_login as a INNER JOIN tbl_users as b ON a.login_id = b.login_id and a.email = '$username';";
								$username_run = mysqli_query($conn, $username);
								foreach ($username_run as $user) {
								?>
									<div class="header__auth" style="padding-left: 650px;">
										<li class="dropdown header__nav-item">
											<a style="font-size: 20px;" class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class='bx bx-user-circle' style='color:#c2c2c4'></i> <?php echo $user['user_fname'] . " " . $user['user_lname']; ?></a>
										<?php
									}
										?>
										<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
											<li><a href="profile.php">Profile</a></li>
											<li><a href="../logout.php">Log out</a></li>
										</ul>
										</li>
									</div>
									<!-- end header auth -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->

	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
		</div>
		<!-- end home bg -->

		<button class="header__sign-in" style="margin-left: 15%; margin-top: -2%;" type="button" data-bs-toggle="modal" data-bs-target="#thtrModal">
		<span>Select theatre</span>
		</button><br>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>NEW</b> RELEASES</h1>
				</div>

				<?php
				$poster = "SELECT * FROM `tbl_movies` ORDER BY `movie_releasedate` DESC LIMIT 4;";
				$poster_run = mysqli_query($conn, $poster);
				?>
				<div class="col-12">
					<div class="owl-carousel home__carousel">
						<?php
						foreach ($poster_run as $pos) {
						?>
							<div class="item">
								<!-- card -->
								<div class="card card--big">

									<div class="card__content">
										<a href=""><img src="../admin/uploads/<?php echo $pos['movie_poster']; ?>" alt=""></a>
										<h3 class="card__title"><a href="#"><?php echo $pos['movie_name']; ?></a></h3>
										<span class="card__category">
											<a><?php echo $pos['movie_lang']; ?></a>&ensp;
											<a><?php echo $pos['movie_certificate']; ?></a>&ensp;
											<a><?php echo $pos['movie_runtime']; ?></a>
										</span>
										<span class="card__rate"><i></i></span>
									</div>

								</div>

								<!-- end card -->
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Movies</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<!-- <div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New items">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								
							</div>
						</div> -->
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content" id="myTabContent">

				<div class="tab-pane fade active show" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
					<div class="row">
						<?php
						$movies = "SELECT * FROM `tbl_movies` WHERE del_status='0'";
						$movies_run = mysqli_query($conn,$movies);
						while($movie = mysqli_fetch_array($movies_run)){
						?>
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="../admin/uploads/<?php echo $movie['movie_poster']; ?>" alt="">
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#"><?php echo $movie['movie_name']; ?></a></h3>
									<span class="card__category">
										<a><?php echo $movie['movie_lang']; ?></a>
										<a><?php echo $movie['movie_certificate']; ?></a>
									</span>
								</div>
							</div>
						</div>
						<?php
						}
						?>
						<!-- end card -->
					</div>
				</div>
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->
	<!-- Modal -->
<div class="modal fade" id="thtrModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	<!-- footer -->
	<footer class="footer">
		<div class="container">S
			<div class="row">

				<div class="col-12">
					<div class="footer__copyright">

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>