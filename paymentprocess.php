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


	<style type="text/css">
		
      #paymentPlan:{
      	display: none;
      }


	</style>
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
         <div class="banner">
        <div class="row"> 
        	<?php include_once("aside.php")  ?>
		<div class='col-md-2'>
			
		</div>
		<div class="w3l_banner_nav_right col-md-7" style="font-family: Times New Roman, Times, serif;">
		     	<div class="privacy about">
			<h3>Pay<span>ment</span></h3>
			
	         <div class="checkout-right">
				<!--Horizontal Tab-->
        <div id="payment">
            <ul class="resp-tabs-list hor_1">
				<li>Cash on delivery (COD)</li>
                <li>Pay With Fees</li>
                <li>Ezwich Payment</li>
            </ul>
            <div class="resp-tabs-container hor_1">

				<div>  
					<div id="tab4" class="tab-grid" style="display: block;">
							<div class="row">
                        <div class="col-md-6">
                            <img class="pp-img" src="images/cash.jpg" alt="Image Alternative text" title="Image Title">
                            <p>Delivery To Your Institution</p>	
                        </div>
                        <div class="col-md-6">
                            <form class="cc-form" method="post" >
                            	<div class="clearfix">
                            	  <div class="controls">
									<label class="control-label">Payment Type</label>
									<?php getCOD();  ?>
								  </div>
								 </div>
								 <br>
                                <div class="clearfix">

                                  <div class="controls">
									<label class="control-label">Payment Option</label>
									        <?php getfullPaymentOption();  ?>
										</div>
										<br>
                                   
                                </div>
                                <div class="clearfix">
                                    
                                    <div class="form-group form-group-cc-date">
                                        <label>Full Payment(GH₵)</label>
                                        <?php itemPrice(); 

                                         ?>
                                    </div>
                                </div>
                                <div class="checkbox checkbox-small">
                                    
                                </div>
                                <input class="btn btn-warning submit" name="submitCOD" type="submit" class="submit" value="Proceed Payment">
                                <?php processCOD();   ?>
                            </form>
                        </div>
                    </div>
                        
						</div>
                </div>
                <div>
                   <div id="tab4" class="tab-grid" style="display: block;">
							<div class="row">
                        <div class="col-md-6">
                            <img class="pp-img" src="images/fees.jpg" alt="Image Alternative text" title="Image Title">
                            <p>Pay With Your Academic Fees</p>	
                        </div>
                        <div class="col-md-6">
                            <form class="cc-form" method="post">
                                <div class="clearfix">
                                  <div class="controls">
									<label class="control-label">Payment Type</label>
									<?php getFP() ?>
									</div>
									<br>
                                    <div class="form-group form-group-cc-cvc">
                                        <label >Payment Option</label>
                                       <select id="paymentOption" 
									    class="form-control " name="paymentOption" required onchange='displayPaymentPlan()'>
									 <option value="">Select Payment Option</option>					
									  <?php getPaymentOptions();  ?>
															
							
									 </select>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div  class="form-group form-group-cc-name">
                                        <label id="planLable" style="display: none">Payment Plan(<span style="color: red;font-size: 12px">required*</span>)</label>
                                         <select  id='paymentPlan' style='display:none' 
									     class="form-control "  name="paymentPlan" >
									 <option value="">Select Payment Plan</option>					
									  <?php getPaymentPlan();  ?>
															
							
									 </select>
                                    </div>
                                    <div class="form-group form-group-cc-date">
                                    	<label id="amountLable" style="display: none;">Full Amount(GH₵)</label>
                                    	<?php  itemAmount(); 
                                    	 ?>

                                        <label id="InitialLable">Initial Payment(GH₵)</label>
                                        
                                        <input id="Initial" name="initialamount" class="form-control" placeholder="Initial Payment" type="number">
                                    </div>
                                </div>
                                <div class="checkbox checkbox-small">
                                    
                                </div>
                                <input class="btn btn-warning submit" name="processFees" type="submit" class="submit" value="Proceed Payment">

                                <?php processSchoolFees();  ?>
                            </form>
                        </div>
                    </div>
                        
						</div>

                </div>
           
                <div>
                    <div id="tab4" class="tab-grid" style="display: block;">
							<div class="row">
                        <div class="col-md-6">
                            <img class="pp-img" src="images/ezwich.jpg" alt="Image Alternative text" title="Image Title">
                            <p>Pay With Your Ezwich Account</p>	
                        </div>
                        <div class="col-md-6">
                            <form class="cc-form" method="post">
                                <div class="clearfix">
                                  <div class="controls">
									<label class="control-label">Payment Type</label>
									<?php  getezwich() ?>
								  </div>
										<br>
                                    <div class="form-group form-group-cc-cvc">
                                        <label>Payment Option</label>
                                       <select id="paymentOption1"
									     class="form-control " name="paymentOption" required onchange='displayPaymentPlan1()'  >
									      <option value="">Select Payment Option</option>					
									       <?php getPaymentOptions();  ?>
															
							
									  </select>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="form-group form-group-cc-name">
                                        <label id="planLable1" style='display:none'>Payment Plan</label>
                                         <select id='paymentPlan1'
									        class="form-control " name="paymentPlan"  style='display:none'>
									         <option value="">Select Payment Plan</option>					
									          <?php getPaymentPlan();  ?>
															
							
									     </select>
                                    </div>
                                    <div class="form-group form-group-cc-date">
                                        <label id="amountLable1" style="display: none;">Full Amount(GH₵)</label>
                                    	 <?php itemAmount1()  ?>

                                        <label id="InitialLable1">Initial Payment(GH₵)</label>
                                        
                                        <input id="Initial1" name="initialamount" class="form-control" placeholder="Initial Payment" type="number">
                                    </div>
                                </div>
                                <div class="checkbox checkbox-small">
                                    
                                </div>
                                <input class="btn btn-warning submit" name="processEzwich" type="submit" class="submit" value="Proceed Payment">
                                <?php processEzwich();  ?>
                            </form>
                        </div>
                    </div>
                        
						</div>
                </div>
                
            </div>
        </div>
	
	<!--Plug-in Initialisation-->

	<!-- // Pay -->
	
			 </div>

		</div>
			
		</div>
		<div class="clearfix"></div>
	</div>
	</div>

	<?php include_once("news.php") ?>
<?php  include_once("footer.php") ?>


<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- easy-responsive-tabs -->    
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<!-- //easy-responsive-tabs --> 
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#payment').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
        <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function() {
			  var creditly = Creditly.initialize(
				  '.creditly-wrapper .expiration-month-and-year',
				  '.creditly-wrapper .credit-card-number',
				  '.creditly-wrapper .security-code',
				  '.creditly-wrapper .card-type');

			  $(".creditly-card-form .submit").click(function(e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
				  // Your validated credit card output
				  console.log(output);
				}
			  });
			});
		</script>
	<!-- //credit-card -->

<!-- //js -->
<!-- script-for sticky-nav -->
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
<!-- //script-for sticky-nav -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
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
<script src="js/minicart.js"></script>
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

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>


	<script type="text/javascript">
		
        function displayPaymentPlan(){
        	var paymentOption = document.getElementById("paymentOption");
            var paymentPlan = document.getElementById("paymentPlan");
            var planLable=document.getElementById("planLable");
            var InitialLable=document.getElementById("InitialLable");
            var amount=document.getElementById("amount");
            var Initial=document.getElementById("Initial");
            var amountLable=document.getElementById("amountLable");


         var desired_box = paymentOption.options[paymentOption.selectedIndex].value;
        if(desired_box == 'Installment') {
              planLable.style.display = '';
              paymentPlan.style.display = '';
              Initial.style.display='';
              InitialLable.style.display='';
              amount.style.display='none';
              amountLable.style.display='none';
          } else {
               planLable.style.display = 'none';
              paymentPlan.style.display = 'none';
              Initial.style.display='none';
              InitialLable.style.display='none';
              amount.style.display='';
              amountLable.style.display='';
         }
        }

	</script>


	<script type="text/javascript">
		
        function displayPaymentPlan1(){
        	var paymentOption = document.getElementById("paymentOption1");
            var paymentPlan = document.getElementById("paymentPlan1");
            var planLable=document.getElementById("planLable1");
            var InitialLable=document.getElementById("InitialLable1");
            var amount=document.getElementById("amount1");
            var Initial=document.getElementById("Initial1");
            var amountLable=document.getElementById("amountLable1");


         var desired_box = paymentOption.options[paymentOption.selectedIndex].value;
        if(desired_box == 'Installment') {
              planLable.style.display = '';
              paymentPlan.style.display = '';
              Initial.style.display='';
              InitialLable.style.display='';
              amount.style.display='none';
              amountLable.style.display='none';
          } else {
               planLable.style.display = 'none';
              paymentPlan.style.display = 'none';
              Initial.style.display='none';
              InitialLable.style.display='none';
              amount.style.display='';
              amountLable.style.display='';
         }
        }

	</script>
</body>
</html>