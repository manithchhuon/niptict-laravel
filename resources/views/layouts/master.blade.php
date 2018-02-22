<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Test')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Entity Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Custom Theme files -->
	<link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
	<link href={{asset("css/style.css")}} type="text/css" rel="stylesheet" media="all">  
	<link href={{asset("css/font-awesome.css")}} rel="stylesheet">   <!-- font-awesome icons -->  
	<link rel="stylesheet" href={{asset("css/flexslider.css")}} type="text/css" media="all" property="" />
	<link rel="stylesheet" href={{asset("css/lightbox.css")}}>
	<!-- //Custom Theme files -->    
	<!-- js --> 
	<script src={{asset("js/jquery-2.2.3.min.js")}}></script>  
	<!-- //js -->  
	<!-- web-fonts -->     
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i" rel="stylesheet"> 
</head>
<body>
	<div class="header" id="home">
		<div class="container">
			<div class="agile_header_grid"> 
				<div class="header-mdl agileits-logo"><!-- header-two --> 
					<h1><a href="index.html">Entity</a></h1> 
				</div>
				<div class="agile_social_banner">
					<ul class="agileits_social_list">
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>  
				<div class="clearfix"> </div>
			</div>  
		</div>	
	</div>
	@include('layouts.menu')
	@yield('content')

	@yield('js')
</body>
</html>