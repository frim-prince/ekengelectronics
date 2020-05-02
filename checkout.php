<?php  include_once("settings.php");

   if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
 
    
}else{
	include_once("login.php");
}
}

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


<div class="products-breadcrumb" style="background-color: #9D2E36">
		<div class="container">
			<ul>
				<li style="font-weight: bolder;"><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li style="font-weight: bolder;">register</li>
			</ul>
		</div>
	</div>


<div class="banner">
        <div class="row"> 
        	<?php include_once("aside.php")  ?>
		<div class='col-md-2'>
			
		</div>
		<div class="w3l_banner_nav_right col-md-7">
			
		<div class="privacy about">
			<h3 style="font-family: Times New Roman, Times, serif;">Chec<span>kout</span></h3>
			<span><?php removeCart() ?></span>

	      <div class="checkout-right">
					<h4 style="font-family: Times New Roman, Times, serif;">Your shopping cart contains: <span><?php echo getCartNum();   ?> Product(s)</span></h4>
			<form method="post">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Quality</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>

					<?php getCartItems();   ?>

				</tbody>
			</table>
		</form>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4 style="background-color: #D4AF37;font-family: Times New Roman, Times, serif;">Order Details</h4>

					<ul>
						<?php  getOderdetails();  ?>
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4 style="font-family: Times New Roman, Times, serif;">Review / Update Your Details</h4>
					  <div ><span><?php comfirmDetails() ?></span></div>
				   <form id="myForm"  method="post" class="creditly-card-form agileinfo_form">
			            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
				            <div class="information-wrapper">
					           <div class="first-row form-group">
                                  <!-- row start -->
                                  <?php getCustomerDetails(); ?>
                               

                                 
											
								</div>
							</div>
						
					</form>
							
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>


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

 <br>
 <br>

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
                       text: 'Please You Can Checkout Only One Laptop',
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
	   <script>
        $('#datepicker').datepicker({
            
            dateFormat: 'yy-mm-dd'
        });

    </script>
</body>
</html>