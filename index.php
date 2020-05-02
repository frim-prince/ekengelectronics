<?php include 'settings.php'; 
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
insertCart();
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php include_once('link.php') ?>


</head>


<body>

	<?php  include_once('header.php') ?>
	<?php  include_once('nav.php') ?>
	
	<div class="banner">
        <div class="row"> 
        	<?php include_once("aside.php")  ?>
		<div class='col-md-2'>
			
		</div>
		<div class="w3l_banner_nav_right col-md-7">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3 style="font-size: 21px;font-weight: 600">Pay For Your<span style="color: #FA1818"><i>Laptop</i></span>In Installment.</h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3 style="font-size: 21px; font-weight: 600">Get a Chance <span style="color: #FA1818"><i>To Own</i></span> a Laptop.</h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3> Get The<i>Best</i> Offer.</h3>
								<div class="more">
									<a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now" style="color: ">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
			<!-- //fresh-vegetables -->

				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
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
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>

	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			
				
			
				
					<div class="container">
    <h3 class="h3" style="font-family: Times New Roman, Times, serif;">Ekeng Types </h3>
    <div class="row">
        <div class="col-md-3 col-sm-6">
          
        </div>
        
         <?php  getekengtypes() ?>
  
    </div>
</div>
				
				
				
				
				<div class="clearfix"> </div>
			
		</div>
	</div>
<!-- //top-brands -->
<!-- //script-for sticky-nav -->
 <?php include_once("news.php") ?>

<?php include_once('footer.php')  ?>



<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
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
<!-- //here ends scrolling icon -->
<script src="js/mini.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total > 1) {
				 swal.fire({
                      title: 'Oops',
                       text: 'Please, You Can Not Checkout More Than One Laptop',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
               
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>