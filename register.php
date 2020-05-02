<?php  include_once("settings.php");

  session_start(); 




  


 ?>


<!DOCTYPE html>
<html>
<head>

	<title></title>
	<?php include_once("link.php")  ?>


		
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	
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
	<br>
	<br>
	<br>
    <div class="container" >
        <div class="card" >
            <div class="card-body cardItem">
                      <div style="display: flex;align-items: center;justify-content: center;">
                      <h6 style="text-transform: uppercase;padding: 20px;color: #4D88FF;font-size: 21px; font-family:Times New Roman,Times, serif"> Create Account  </h6>

                      </div>
                      <div style="display: flex;align-items: center;justify-content: center;">
   <?php 



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'frimprincy@gmail.com';                     // SMTP username
    $mail->Password   = 'pope@0504';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('frimprincy@gmail.com', 'Mailer');
    $mail->addAddress('frimprince44@yahoo.com', 'Joe User');     // Add a recipient
     



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   if($mail->send()) {
   	echo 'Message has been sent';
   }else{
   	echo 'Message has not been sent';
   }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



   	global $conn;
       echo "<script> let timerInterval
Swal.fire({
  title: 'Ekeng Electronics!',
  html: 'Loading Page.<b></b>',
  timer: 400,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})</script>";
      
  	if(isset($_POST['createAccount'])){
      $fname=mysqli_real_escape_string($conn,$_POST['fname']);
       $surname=mysqli_real_escape_string($conn,$_POST['surname']);
        $DOB=mysqli_real_escape_string($conn,$_POST['DOB']);
         $contact=mysqli_real_escape_string($conn,$_POST['contact']);
          $email=mysqli_real_escape_string($conn,$_POST['email']);
           $cardID=mysqli_real_escape_string($conn,$_POST['cardID']);
            $idnum=mysqli_real_escape_string($conn,$_POST['idnum']);
             $institution=mysqli_real_escape_string($conn,$_POST['institution']);
              $institutionName=mysqli_real_escape_string($conn,$_POST['institutionName']);
               $studentNo=mysqli_real_escape_string($conn,$_POST['studentNo']);
                $ezwich=mysqli_real_escape_string($conn,$_POST['ezwich']);
                $academicyear=mysqli_real_escape_string($conn,$_POST['year']);
                $fullName=$fname. ' ' .$surname;
                 $keyLength=8;
  	             $str="1234567890abcdefghijklmnopqrstuvwsyz!$@";
  	             $randstrPass=substr(str_shuffle($str),0,$keyLength);
                 $CardId=10;
                 $academicyearId=7;
                   

                 $findExistUser="SELECT * FROM customer WHERE  email='$email'  || id_number='$idnum' ";
                 $run_findExistUser=mysqli_query($conn,$findExistUser);
                 $countUser=mysqli_num_rows($run_findExistUser);

                 if(isset($_POST['checkbox'])){

                 if ($countUser>0) {
                 	  	echo "<div class='alert alert-danger' role='alert'>
                           USER ALREADY EXIST!
                            </div>";
                 }else{
                         $randId= generateKey();
                         $repeat="cs10";
                         $repeatId=$repeat.$randId;

                        $cardID="SELECT id FROM id_type WHERE name='$cardID' ";
                        $run_cardID=mysqli_query($conn,$cardID);
                        while ($row=mysqli_fetch_array($run_cardID)) {
                        	$CardId=$row["id"];

                        }
                     
                     $institution="SELECT id FROM institution WHERE name='$institution'";
                        $run_institution=mysqli_query($conn,$institution);
                        while ($row=mysqli_fetch_array($run_institution)) {
                        	$institutionId=$row["id"];
                        }

                      $academicyear="SELECT id FROM academicyear WHERE academicYear='$academicyear'";
                        $run_academicyear=mysqli_query($conn,$academicyear);
                        while ($row=mysqli_fetch_array($run_academicyear)) {
                        	$academicyearId=$row["id"];
                        }


                 	$insertCustomer="INSERT INTO 
                 	customer(fname,sname,DOB,contact,email,cardTypeId,id_number,institutionId,	institutionName,studentId,ezwich_num,startDate,lastUpdated,customerId,password,fullName,yearId) 
                 	VALUES
                 	('$fname','$surname','$DOB','$contact','$email','$CardId','$idnum',
                 	'$institutionId','$institutionName','$studentNo','$ezwich',now(),now(),'$repeatId','$randstrPass','$fullName','$academicyearId')";


                 	$run_insertCustomer=mysqli_query($conn,$insertCustomer);


                 	if($run_insertCustomer){
                              
                            
                 	}else{
                 		
             	echo  "<script>swal.fire({
                                 title: 'Oops',
                                 text: 'Registration Failled.Contact Us ',
                                 icon: 'error',
                       
                                   });</script>";
                 	}
                 }
             }

  	}
  
 ?></div>
                      <br>
                    <form id="myForm"  method="post" class="creditly-card-form agileinfo_form">
			            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
				            <div class="information-wrapper">
					           <div class="first-row form-group">

                                   <div class="row" ><!-- row  -->
    	                              <div class="col-md-1"></div>
    	                                   <div class="col-md-4">   <!-- column  -->
                     
												<div class="controls">
													<p class="control-label">First name:<span style="color: red">*</span> </p>
													<input style="border-radius: 5px" class="billing-address-name form-control" type="text" name="fname" placeholder="First name" required autocomplete="off" id="fname" value="">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<p class="control-label">Surname:<span style="color: red">*</span></p>
														    <input style="border-radius: 5px" class="form-control" type="text" placeholder="surname"
														    name="surname" required autocomplete="off" value="">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<p class="control-label">Date of Birth:<span style="color: red">*</span> </p>
														 <input style="border-radius: 5px" class="form-control" type="text" placeholder="date of birth" id="datepicker" name="DOB" required autocomplete="off" value="">
														</div>
													</div>
													<div class="clear"> </div>

												</div>
												<div class="controls">
													<p class="control-label">Tel No: <span style="color: red">*</span></p>
													<input style="border-radius: 5px" class="billing-address-name form-control" type="number" name="contact" placeholder="Telephone Number" required autocomplete="off" value="">
												</div>
												<div class="controls">
													<p class="control-label">Email:<span style="color: red">*</span> </p>
													<input style="border-radius: 5px" class="billing-address-name form-control" type="email" name="email" placeholder="Email Address" required autocomplete="off" value=""> 
												</div>
												    <div class="controls">
															<p class="control-label">ID type:<span style="color: red">*</span> </p>
												       <select style="border-radius: 5px" class="form-control option-w3ls" name="cardID" required>
												       	    <option value="">Select ID Type</option>
															
															<?php getcardType();  ?>
															>
							
													    </select>
													</div>
													<br>
													
													
										   </div><!-- column end  -->
										    <div class="col-md-2"></div>
										     <div class="col-md-4">   <!-- column start  -->
                                                <div class="controls">
															<p class="control-label">ID NO:<span style="color: red">*</span></p>
														    <input style="border-radius: 5px" style="border-radius: 5px" class="form-control" type="text" placeholder="ID number" name="idnum" required autocomplete="off" value="">
														</div>
												
												<div class="controls">
															<p class="control-label">Institution:<span style="color: red">*</span> </p>
												       <select style="border-radius: 5px" class="form-control option-w3ls"  name="institution" required >
												       	    <option value="">Select your Institution</option>
															<?php  getInstitution();   ?>
														
							
													    </select>
													</div>
													<br>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<p class="control-label">Institution Name:<span style="color: red">*</span></p>
														    <input style="border-radius: 5px" class="form-control" type="text" placeholder="Institution Name" name="institutionName" required autocomplete="off" value="">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<p class="control-label">Student ID:<span style="font-size: 13px;color:red">(required for all Students</span>) </p>
														 <input style="border-radius: 5px" class="form-control" type="number" placeholder="Student ID Number" name="studentNo" autocomplete="off" value="">
														</div>
													</div>
													<div class="clear"> </div>

												<div class="controls">
															<p class="control-label">Academic Year:(<span style="font-size: 13px;color:red">required for all Students</span>) </p>
												       <select style="border-radius: 5px" class="form-control option-w3ls" name="year">
												       	    <option value="">Select your Academic Year </option>
															  <?php getacademicyear();   ?>
														
							
													    </select>
													</div>
													<br>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<p class="control-label">Ezwich:(
														<span style="font-size: 13px;color: red">Option for University Students</span>)  </p>
												 <input style="border-radius: 5px" class="form-control" type="number" placeholder="Ezwich Number" name="ezwich" autocomplete="off" value="">
												</div>
													
										   </div><!-- column end  -->
										   <div class="col-md-1"></div>
									</div><!-- row end  -->


											
								</div>
							</div>
						</section>
					     
					     

                        <div class="row" style="margin-top: -12px">
                            <div class="col-md-1"></div>
                           <div class="col-md-10">
						       <input  required type="checkbox" name="checkbox" value="check" id="agree" /><span style="font-weight: bolder;">I have read and agree to the Terms and Conditions and Privacy Policy</span>
						       
                                
						    </div>
						    
						    <div class="col-md-1"></div>
						</div>
						<br>
						<br>
						<div class="row">
                            <div class="col-md-1"></div>
                           <div class="col-md-10">
						       <button type="submit" class="btn btn-primary lg " 
						       name="createAccount" >create account</button>
						       </div>
						    <div class="col-md-1"></div>
						</div>
						
						
						<br>
					</form>
							   
				</div>
		    </div>
	    </div>

	    <br>
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
                       text: 'Please, You Can Not Checkout More Than One Laptop',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
               
				evt.preventDefault();
			}
		});

	</script>
</body>

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
            
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            
        });

    </script>

<script type="text/javascript"></script>
    


</body>
</html>