<?php  include_once('settings.php')  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include_once 'link.php';   ?>
</head>
<body>
<?php include_once 'header.php';   ?>
<?php include_once 'nav.php'; ?>
  <div class="products-breadcrumb" style="background-color: #9D2E36">
		<div class="container">
			<ul>
				<li style="font-weight: bolder;"><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li style="font-weight: bolder;">Events</li>
			</ul>
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
<!-<div class="banner">
        <div class="row"> 
        	<?php include_once("aside.php")  ?>
		<div class='col-md-2'>
			
		</div>
		<div class="w3l_banner_nav_right col-md-7">
			<div class="events-bottom">
				<div class="col-md-6 events_bottom_left">
					<div class="col-md-4 events_bottom_left1">
						<div class="events_bottom_left1_grid">
							<h4>20</h4>
							<p>July, 2016</p>
						</div>
					</div>
					<div class="col-md-8 events_bottom_left2">	
						<img src="images/15.jpg" alt=" " class="img-responsive" />
						<h4>ut aut reiciendis facere possimus</h4>
						<ul>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i>3:00 PM</li>
							<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
						</ul>
						<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
							impedit quo minus id quod maxime placeat facere possimus, omnis voluptas 
							assumenda est.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 events_bottom_left">
					<div class="col-md-4 events_bottom_left1">
						<div class="events_bottom_left1_grid">
							<h4>21</h4>
							<p>July, 2016</p>
						</div>
					</div>
					<div class="col-md-8 events_bottom_left2">	
						<img src="images/19.jpg" alt=" " class="img-responsive" />
						<h4>maxime placeat facere possimus</h4>
						<ul>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i>3:30 PM</li>
							<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
						</ul>
						<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil 
							impedit quo minus id quod maxime placeat facere possimus, omnis voluptas 
							assumenda est.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="clearfix"></div>
         


	
<!-- //services-bottom -->
	</div>
	</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<br>
<br>
<br>
<?php include_once 'news.php'; ?>
<?php include_once 'footer.php'; ?>	



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