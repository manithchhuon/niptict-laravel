@extends('layouts.master')

@section('content')
 	<div class="w3ls-banner"> 
 		<!-- banner-text -->
 		<div class="banner-text agileinfo"> 
 			<div class="container">
 				<div class="flexslider">
 					<ul class="slides">
 						<li>
 							<div class="banner-w3lstext"> 
 								<h2>Welcome</h2>
 								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida mauris non mi gravida, at sollicitudin odio efficitur. Mauris ex nulla, aliquam ornare facilisis.</p>
 							</div>
 						</li>
 						<li>
 							<div class="banner-w3lstext"> 
 								<h3>Lorem ipsum </h3>
 								<p>Integer gravida mauris non mi gravida, at sollicitudin odio efficitur. Lorem ipsum dolor sit amet elit consectetur adipiscing. Mauris ex nulla, aliquam ornare facilisis.</p>
 							</div> 
 						</li>
 						<li>
 							<div class="banner-w3lstext"> 
 								<h3>Mauris nulla</h3>
 								<p>Integer gravida mauris non mi gravida, at sollicitudin odio efficitur. Lorem ipsum dolor sit amet elit consectetur adipiscing. Mauris ex nulla, aliquam ornare facilisis.</p>
 							</div> 
 						</li>
 					</ul> 
 				</div> 	 
 			</div>  
 		</div>	
 		<!-- //banner-text -->   
 	</div>	

@endsection


@section('js')
		<script defer src={{asset("js/jquery.flexslider.js")}}></script>
		<script type="text/javascript">
			$(window).load(function(){
			  $('.flexslider').flexslider({
				animation: "slide",
				start: function(slider){
				  $('body').removeClass('loading');
				}
			  });
			});
		</script>
		<!-- End-slider-script -->   
		<!-- jarallax -->  
		<script src={{asset("js/SmoothScroll.min.js")}}></script> 
		 
		<script type="text/javascript">
			/* init Jarallax */
			$('.jarallax').jarallax({
				speed: 0.5,
				imgWidth: 1366,
				imgHeight: 768
			})
		</script>  
		<!-- //jarallax --> 
		<!-- start-smooth-scrolling --> 
		<script type="text/javascript" src={{asset("js/move-top.js")}}></script>
		<script type="text/javascript" src={{asset("js/easing.js")}}></script>	
		<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
				
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
		</script>
		<!-- //end-smooth-scrolling -->	
		<!-- smooth-scrolling-of-move-up -->
		<script type="text/javascript">
			$(document).ready(function() {
				/*
				var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
				};
				*/
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		<!-- //smooth-scrolling-of-move-up -->    
		<!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src={{asset("js/bootstrap.js")}}></script>

@endsection