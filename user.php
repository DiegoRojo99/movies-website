<?php 
	include ("connectToDB.inc");
	
	$actualPage=$_GET['page'];
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

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

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
								<img src="img/logo.svg" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- home -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="index.php" role="button" id="dropdownMenuHome">Home</a>
								</li>
								<!-- end home -->

								<!-- catalog -->
								<li class="header__nav-item">
									<a href="catalog1.php" class="header__nav-link">Catalog</a>
								</li>
								<!-- end catalog -->

								<li class="header__nav-item">
									<a href="pricing.html" class="header__nav-link">Pricing Plan</a>
								</li>

								<li class="header__nav-item">
									<a href="profile.php" class="header__nav-link">Profile</a>
								</li>

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="about.html">About</a></li>
										<li><a href="signin.php">Sign In</a></li>
										<li><a href="signup.php">Sign Up</a></li>
										<li><a href="404.html">404 Page</a></li>
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>

								<a href="signin.php" class="header__sign-in">
									<i class="icon ion-ios-log-in"></i>
									<span>sign in</span>
								</a>
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="#" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" placeholder="Search for a movie, TV Series that you are looking for">

							<button type="button">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">
							<?php
								echo $_GET['user'];
							?>
						</h2>
						<!-- end section title -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
				<h2 class="section__title">
					Section B
				</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<h2 class="section__title">Movies Recently Watched</h2>
			<div class="row">
			

				<!-- cards -->
				<?php

				$dataBase = connectDB();
			
				$query='SELECT * FROM Watched w JOIN Movie m ON m.MovieId=w.MovieId WHERE w.Username="'
				.$_GET["user"].'" ORDER BY WatchedDate DESC;';
				$result=mysqli_query($dataBase,$query) or die('Query failed: '.mysqli_error($dataBase));
				$movies=0;
				$moviesToSkip=($actualPage-1)*6;
					$skippedMovies=0;
					$moviesDisplayed=0;

				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
				{
				extract($row);
					echo '
					<div class="col-6 col-sm-4 col-lg-3 col-xl-2">';

					

					if($moviesToSkip==$skippedMovies && $moviesDisplayed<6){
						echo '<div class="card">
						<div class="card__cover">
							<img src="'.$Poster.'" alt="">
							<a href="#" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="movieDetails.php?id='.$MovieId.'">'.$Title.'</a></h3>
							<span class="card__category">';

							$dataBase2 = connectDB();
							$query2='SELECT * FROM Belong b JOIN Category c ON c.CategoryId=b.CategoryId WHERE MovieId="'.$MovieId.'";';
							$result2=mysqli_query($dataBase2,$query2) or die("Query failed: ".mysqli_error($dataBase2));
			
							while ($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC))
							{
							extract($row2);
							echo '<a href="#">'.$CategoryName.'</a>';
							}    

							mysql_close($dataBase2);
							echo '
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i>'.$Rating.'</span>
						</div>
					</div>';
					$moviesDisplayed++;
					}else{
						$skippedMovies++;
					}

					echo '</div>';
					$movies=$movies+1;
				}								
				mysql_close($dataBase);
				?>
				<!-- end cards -->

				<!-- paginator -->
				<div class="col-12">
					
				<?php
					if($movies%6==0){
						$numberPages=intdiv($movies,6);
					}else{
						$numberPages=intdiv($movies,6)+1;
					}

					
					if($numberPages>0){
						echo '<ul class="paginator">';

						if($actualPage!=1){					
							echo '<li class="paginator__item paginator__item--prev">
							<a href="user.php?user=';

							echo $_GET['user'];
							echo '&page=';
							$actualPage=$_GET["page"];
							$prevPage=$actualPage-1;
							echo $prevPage;
							echo'
							"><i class="icon ion-ios-arrow-back"></i></a>
						</li>';
						}

										
					for ($i = 1; $i <= $numberPages; $i++) {
						echo '<li class="paginator__item';
						if($i==$_GET['page']){
							echo ' paginator__item--active';
						}
						echo '"><a href="user.php?user=';
						echo $_GET['user'];
						echo '&page='.$i.'">'.$i.'</a></li>';
					}
					
					if($actualPage!=$numberPages){		
						echo '<li class="paginator__item paginator__item--prev">
						<a href="user.php?user=';

						echo $_GET['user'];
						echo '&page=';
						$actualPage=$_GET["page"];
						$prevPage=$actualPage+1;
						echo $prevPage;
						echo'
						"><i class="icon ion-ios-arrow-forward"></i></a></li>';
					}
					
					echo '</ul>';
				}
				?>
											
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->

	<!-- expected premiere -->
	<section class="section section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">People Followed</h2>
				</div>
				<!-- end section title -->

				<!-- cards -->
				<?php

				$dataBase = connectDB();
			
				$query='SELECT * FROM Follower f JOIN User u ON f.userFollowed=u.Username WHERE f.User="'.$_GET["user"].'";';
				$result=mysqli_query($dataBase,$query) or die('Query failed: '.mysqli_error($dataBase));

				while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
				{
					extract($row);
					echo '<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
						<div class="card">
							<div class="card__cover">
								<img src="img/avatars/avatar'.$Avatar.'.png" alt="Avatar Image" width="100px">
							</div>
							<div class="card__content">
								<h3 class="card__title"><a href="user.php?user='.$UserFollowed.'&page=1">'.$UserFollowed.'</a></h3>
								<span class="card__category">
								</span>
								<span class="card__rate"></span>
							</div>
						</div>
					</div>';
				}									
				mysql_close($dataBase);
				?>
				<!-- end cards -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">Download Our App</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
						<li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Resources</h6>
					<ul class="footer__list">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Pricing Plan</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Legal</h6>
					<ul class="footer__list">
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Contact</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
						<li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="whatsapp">
							<a href="whatsapp://send?text=http://diego-rojo.epizy.com/movies-website/index.php">
								<i class="icon ion-logo-whatsapp"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
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