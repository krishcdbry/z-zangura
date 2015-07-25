<!DOCTYPE html>
<html lang="en" ng-app="zanguApp">
<?php function csrf_token($length = 15) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$_-';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return hash('sha512', hash('sha256', "kr!5hCdbry_ZvNGuhack53c".$randomString));
} ?>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<meta name="description" content='zangura'/>
	<meta name='keywords' content='zangura'/>
	<title>Zangura</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>

	<!-- Loading stylesheets  -->
	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/final/css/zangu.min.css">

	<!-- Loading scripts -->
	<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../node_modules/angular/angular.min.js"></script>
	<script type="text/javascript" src="assets/final/scripts/zangu.min.js"></script>
	<script type="text/javascript" src="http://localhost/zangoora/js/nicescroll.js"></script>
</head>
<body ng-controller="mainController">
<nav class="navbar navbar-default navbar-inverse zangu-header navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
			        data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Zangura</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><i class="fa fa-bell"></i></b></a>
					<ul id="zangu-notification" class="dropdown-menu" role="menu">
						<li>
							<div class="row">
								<div class="col-md-12">
									<span class="center center-block">
										No notifications
									</span>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="modal"
					   data-target="#myModal">Login
					</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<div class="container-fluid zangura-search-div center">
	<div class="wrapper"></div>
	<form class="zangu-search form-group col-md-8 col-md-offset-2">
		<center><h1 class="center">Find out your favourites deals</h1></center>
		<div class="container-fluid zangu-search-body">
			<div class="row">
				<div class="col-md-7 search-items-input">
					<span class="fa fa-search"></span>
					<input type="search" class="zangu-search-input" placeholder="Search for shops, costumes, dress etc"
					       ng-model="searchTerm"
					       ng-change="searchZangu(searchTerm)" ng-click="showSuggested('item')" required>
				</div>
				<div class="col-md-4 search-items-location">
					<span class="fa fa-map-marker"></span>
					<input type="search" class="zangu-search-location" placeholder="Delhi NCR" ng-model="zanguLocation"
					       ng-change="searchLocation(zanguLocation)" ng-click="showSuggested('location')" required>
				</div>
				<div class="col-md-1">
					<button class="btn btn-lg zangu-search-btn pull-right col-xs-12">
						Go
					</button>
				</div>
			</div>
		</div>
		<div class="container-fluid zangu-res-body">
			<div class="row">
				<div class="col-md-7">
					<div class="search-item-suggested search-res-div">
						<div class="col-xs-12 suggested-heading">
							Suggested Items
						</div>
						<ul>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Party fashion</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Punjabi wear</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> College trends</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Marriage costumes</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Salwar kameeez</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Holiday costumes</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Professional costumes</a></li>
							<li><a href="javascript:;"><i class="fa fa-compass"></i> Festival dhamaka</a></li>
						</ul>
					</div>
					<div class="search-item-results search-res-div">
						<div class="col-xs-12 suggested-heading">
							Results
						</div>
						<ul>
							<li ng-repeat="item in items">
								<a href="javascript:;"><i class="fa fa-compass"></i> {{item}}</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="search-location-suggested search-res-div">
						<div class="col-xs-12 suggested-heading">
							Suggested Locations
						</div>
						<ul>
							<li><a href="javascript:;"><i class="fa fa-map-marker"></i> Delhi NCR</a></li>
							<li><a href="javascript:;"><i class="fa fa-map-marker"></i> Mumbai</a></li>
							<li><a href="javascript:;"><i class="fa fa-map-marker"></i> Banglore</a></li>
							<li><a href="javascript:;"><i class="fa fa-map-marker"></i> Chandighar</a></li>
							<li><a href="javascript:;"><i class="fa fa-map-marker"></i> Hyderabad</a></li>
						</ul>
					</div>
					<div class="search-location-results search-res-div">
						<div class="col-xs-12 suggested-heading">
							Results
						</div>
						<ul>
							<li ng-repeat="location in locations">
								<a href="javascript:;"><i class="fa fa-map-marker"></i> {{location}}</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="zangu-space container-fluid">
</div>
<div class="container-fluid zangu-container-2">
	<center>
		<div class="container normal-data center">
			<h1 class="fa fa-compass"></h1>

			<h1>Explore Best Deals in Your City</h1>

			<p>Discover local shops in India that provides better deals & find out the best shops that deliver to your
				doorstep </p>
		</div>
	</center>
</div>

<div class="container-fluid zangu-container-3">
	<center>
		<h2> Find the best shops in Delhi </h2>
		<br/>
		<div class="shop-1 zangu-shop-block">
			<h2>Salwar kameez</h2>
		</div>
		<div class="shop-2 zangu-shop-block">
			<h2>Salwar kameez</h2>
		</div>
		<div class="shop-3 zangu-shop-block">
			<h2>Salwar kameez</h2>
		</div>
	</center>
</div>

<div class="container-fluid zangura-weekly-trends">

</div>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content" style="padding: 10px;">
			<div class="zangu-login-intro-model">
				<div class="col-md-6" style="border-right: 5px solid #f0f0f0;">
					<h1> Zangura </h1>

					<p> Join in zangura to get connected with lastest trends & local shops in India</p>
					<br/>

					<div class="zangu-intro-join-btns">
						<a href="javascript:;" ng-click="showZanguRegistration()"
						   class="btn btn-info btn-lg col-xs-12 zangura-join-btn">Join Zangura</a>
					</div>
					<div class="zangu-intro-login-btns">
						<a href="javascript:;" ng-click="showZanguLogin()"
						   class="btn btn-info btn-lg col-xs-12 zangura-join-btn">Login</a>
					</div>

					<div class="img-blocks img-block-1 col-xs-4">
					</div>
					<div class="img-blocks img-block-2 col-xs-4">
					</div>
					<div class="img-blocks img-block-3 col-xs-4">
					</div>
				</div>
				<div class="col-md-6 center zangu-login-one">
					<zangu-login></zangu-login>
				</div>
				<div class="bottom text-center">
					Take me to the <a href="#">Zangu search</a>
				</div>
			</div>
			<div class="zangu-registration-model">

			</div>
		</div>
	</div>
</div>
</body>
<meta name="secCsrfToken" ng-init="csrf_token='<?php echo csrf_token(); ?>'">
</html>