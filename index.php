<!DOCTYPE HTML>

<html>
	<head>
		<title>GPS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.html">GPSMEGA</a></h1>

							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="#">Home</a></li>
									<li><a href="#">Refresh</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Intro -->
				<div id="intro-wrapper" class="wrapper style1">
					<div class="title">Upload</div>
					<section id="intro" class="container">

						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

						<script>
							$( document ).ready(function() {
									document.getElementById('browseBtn').onclick = function() {
										document.getElementById('hiddenFile').click();
									};
									$('input[type=file]').change(function (e) {
										document.getElementById('fileLocation').value = $(this).val();
								});
							});
						</script>
						<form method="post" action="action.php" enctype="multipart/form-data">


						<div class="wrapper style2">
							<div class="title">The Endorsements</div>
							<div id="highlights" class="container">


<input id="fileLocation" name="fileLocation" type="text" class="form-control" placeholder="Image to upload" style="display:none">
									 		<button type="button" value="Browse..." id="browseBtn" class="title">Select files...</button>
											<textarea type="text" name="locationstring" id="coordinates" style="display:none;"/></textarea>
									 	 	<input type="file" name="file" id="hiddenFile" style="display: none;"/>
									 		<textarea id="content" name="imagetext" class="form-control" type="text" rows="2"  style="width:50%;margin-left:calc(50% - 250px);position:relative;"placeholder="Text Below Image"/></textarea>
									 		<br>
									 		<br>
											<input type="submit" value="Upload" name="submit"/>
								 </form>
								</div>
							</div>

					</section>
				</div>


			<!-- timeline -->
				<div class="wrapper style3">
					<div class="title">Your City</div>
					<div id="highlights" class="container">
						<div class="row 150%">

							<?php
								// Establish connection to database
								$conn = mysql_connect("localhost", "root", "") or die(mysql_error());
								//Select database
								$db = mysql_select_db("gpsmega");
								$query = "SELECT * FROM images ORDER BY ID DESC";
								$response = mysql_query($query);
								while($row = mysql_fetch_array($response)){
									echo '<div class="4u 12u(mobile)">';
										echo '<section class="highlight">';
												echo '<a class="image featured"><img src='.$row["image"].' alt="" /></a>';
												echo '<h3><a href="#"><i class="fa fa-map-marker"></i> '.$row["locationstring"].'</a></h3>';
												echo '<p>'.$row["imagetext"].'</p>';
										echo '</section>';
									echo '</div>';
								}
							?>


						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper" class="wrapper">
					<div class="title">The Rest Of It</div>

					<div id="copyright">
						<ul>
							<li>&copy; Team DrejgonSleijers</li><li>Not finished lul</li>
							<li>Your IP is:</li><li><span id="ip"></span></li>
						</ul>
					</div>
				</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
		$.ajax({
				url: "https://geoip-db.com/jsonp",
				jsonpCallback: "callback",
				dataType: "jsonp",
				success: function( location ) {
						$('#coordinates').html(location.state+', '+location.country_name);
						$('#country').html(location.country_name);
						$('#state').html(location.state);
						$('#city').html(location.city);
						$('#ip').html(location.IPv4);
				}
		});
</script>
	</body>
</html>
