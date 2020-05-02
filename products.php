<?php include 'settings.php';  
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php  include_once("link.php")  ?>
	
	 
</head>
<body>
    <?php  include_once('header.php') ?>
    
	<?php  include_once('nav.php');


	 ?>
     

     <div class="products-breadcrumb" style="background-color: #9D2E36">
		<div class="container">
			<ul>
				<li style="font-weight: bolder;"><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li style="font-weight: bolder;">Details</li>
			</ul>
		</div>
	</div>

	<div class="banner">
        <div class="row"> 
        	<?php include_once("aside.php")  ?>
		<div class='col-md-2'>
			
		</div>
		<div class="w3l_banner_nav_right col-md-7">
			
			
		         <br>
		         <br>
		         <br>
		       

				<div class="row">
					
				
                    <?php
                       insertCart();
                     getallProducts(); ?>
                    <br>
                    <br>

				</div>

				</div>
			
		
			
		</div>
		<div class="clearfix"></div>
	
	</div>
  



<!-- //banner -->
<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			
				<div class="w3ls_w3l_banner_nav_right_grid1">
				<h3 style="font-size: 25px;"> Recent View</h3>
				<br>
				<br>
				<br>
				<br>
					<div class="row">
					
				
                    <?php getRecentView(); ?>

				</div>
		</div>
	</div>
<!-- //brands -->

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

<?php include_once("news.php") ?>
<?php  include_once("footer.php") ?>

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

<script type="text/javascript">
	   $(document).ready(function(){
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })                        
        }) 
	   </script>
</body>
</html>