<?php

include_once('database.php');


// get models

function getTypes(){
	global $conn;
	$getTypes="SELECT * FROM ekengtypes";
    $runGetgetTypes=mysqli_query($conn,$getTypes);

  while ( $row=mysqli_fetch_array($runGetgetTypes)) {
    	  $id=$row['id'];
    	  $name=$row['name'];
    	  


    	  echo "<li style='font-family: fantasy; padding:1px;''><a href='models.php?modelid=$id'><i class='fas fa-laptop-code' style='font-size:20px;color:#DAA520'></i>$name</a></li>
										<hr>";

    }  
}

// get products details


function getekengtypes(){
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
	global $conn;
	$getekengtypes="SELECT * FROM ekengtypes";
    $rungetekengtypes=mysqli_query($conn,$getekengtypes);

  while ( $row=mysqli_fetch_array($rungetekengtypes)) {
    	  $id=$row['id'];
    	  $name=$row['name'];
    	  $pic=$row['pic'];
        $pic1=$row['pic1'];
        $price_Range=$row['price_Range'];


    	  echo "<div class='col-md-3 col-sm-6'>
            <div class='product-grid4'>
                <div class='product-image4'>
                    <a href='#''>
                        <img style='width:200px;height:200px;' class='pic-1' src='$pic'>
                        <img style='width:350px;height:200px;' class='pic-2' src='$pic1'>
                    </a>
                    <ul class='social'>
                        <li><a href='models.php?modelid=$id' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                        
                    </ul>
                    <span class='product-new-label'>New</span>
                  
                </div>
                <div class='product-content'>
                    <h3 style='font-weight: bolder;'' class='title'><a href='#''>$name</a></h3>
                    <div class='price'>
                        
                       <p style='font-size:14px;'>$price_Range</p>
                    </div>
                    <div class='snipcart-details agileinfo_single_right_details'>
						       <a href='models.php?modelid=$id'><input  style='display: flex;
  align-items: center;
  justify-content: center;' type='submit'  value='shop now' class='add-to-cart modelstypes' /></a>
						</div>
                </div>
            </div>
        </div>";

    }  
}


// getting Ekeng models




function getProducts(){
  

if(isset($_GET['modelid'])) {
      $id =$_GET['modelid'];

  global $conn;
  $getModel="SELECT * FROM models WHERE TypeId='$id'";
    $runGetModels=mysqli_query($conn,$getModel);

  while ( $row=mysqli_fetch_array($runGetModels)) {
        $id=$row['id'];
        $brandId=$row['brand_id'];
        $model_name=$row['product_name'];
        $price=$row['price'];
        $previous_price=$row['previous_price'];
        $pic=$row['product_pic'];
        $pic1=$row['pic1'];
        $CPU=$row['CPU'];
        $Rom=$row['Rom'];
        $modelStatusId=$row['modelStatus'];



        $modelStatus="SELECT * FROM modelstatus WHERE id='$modelStatusId'";
        $run_modelSatus=mysqli_query($conn,$modelStatus);

        while ($row=mysqli_fetch_array($run_modelSatus)) {
          $status=$row['name'];
          $color=$row['color'];
        }


        echo "<div class='col-md-3 col-sm-6'>
                  <div class='product-grid4'>
                  <div class='product-image4'>
                    <a href='#'>
                        <img style='width:200px;height:150px;' class='pic-1' src='$pic'>
                        <img style='width:240px;height:160px;' class='pic-2' src='$pic1'>
                    </a>
                    <ul class='social'>
                        <li><a href='itemView.php?id=$id' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                        
                    </ul>
                    <span class='product-new-label' style='font-size:8px;background-color:$color'>$status</span>
                  
                </div>
                <div class='product-content'>
                    <h3 style='font-weight: bolder;' class='title'><a href='#'>$model_name</a></h3>
                    <h5 style='font-family:Times New Roman, Times, serif;font-size:12px;'>$CPU-$Rom SSD ...</h5>
                    <div class='price'>
                        GH¢ $price
                        <span>GH¢ $previous_price</span>
                    </div>
                    <div class='snipcart-details agileinfo_single_right_details'>
              <form action='#' method='post'>
                <fieldset>
                  <input type='hidden' name='cmd' value='_cart' />
                  <input type='hidden' name='add' value='1' />
                  <input type='hidden' name='business' value=''  />
                  <input type='hidden' name='item_name' value='$model_name' />
                  <input type='hidden' name='amount' value='$price' />
                  <input type='hidden' name='discount_amount' value='0.00' />
                  <input type='hidden' name='currency_code' value='GH' />
                  <input type='hidden' name='return' value=''  />
                  <input type='hidden' name='cancel_return' value=''  />
                  <input  style='display: flex;
  align-items: center;
  justify-content: center;' type='submit' name='Cartsubmit' value='Add to cart' class='add-to-cart cartSubmit' />
                </fieldset>
              </form>
            </div>
                </div>
            </div>


        </div>

        ";




    } 
    } 
}



// get all products

function getallProducts(){
   



  global $conn;
  $getModel="SELECT * FROM models ";
    $runGetModels=mysqli_query($conn,$getModel);

  while ( $row=mysqli_fetch_array($runGetModels)) {
        $id=$row['id'];
        $brandId=$row['brand_id'];
        $model_name=$row['product_name'];
        $price=$row['price'];
        $previous_price=$row['previous_price'];
        $pic=$row['product_pic'];
        $pic1=$row['pic1'];
        $CPU=$row['CPU'];
        $Rom=$row['Rom'];
        $modelStatusId=$row['modelStatus'];



        $modelStatus="SELECT * FROM modelstatus WHERE id='$modelStatusId'";
        $run_modelSatus=mysqli_query($conn,$modelStatus);

        while ($row=mysqli_fetch_array($run_modelSatus)) {
          $status=$row['name'];
          $color=$row['color'];
        }


        echo "<div class='col-md-3 col-sm-6'>
                  <div class='product-grid4'>
                  <div class='product-image4'>
                    <a href='#'>
                        <img style='width:200px;height:150px;' class='pic-1' src='$pic'>
                        <img style='width:240px;height:160px;' class='pic-2' src='$pic1'>
                    </a>
                    <ul class='social'>
                        <li><a href='itemView.php?id=$id' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                        
                    </ul>
                    <span class='product-new-label' style='font-size:8px;background-color:$color'>$status</span>
                  
                </div>
                <div class='product-content'>
                    <h3 style='font-weight: bolder;' class='title'><a href='#'>$model_name</a></h3>
                    <h5 style='font-family:Times New Roman, Times, serif;font-size:12px;'>$CPU-$Rom SSD ...</h5>
                    <div class='price'>
                        GH¢ $price
                        <span>GH¢ $previous_price</span>
                    </div>
                    <div class='snipcart-details agileinfo_single_right_details'>
              <form action='#' method='post'>
                <fieldset>
                  <input type='hidden' name='cmd' value='_cart' />
                  <input type='hidden' name='add' value='1' />
                  <input type='hidden' name='business' value=''  />
                  <input type='hidden' name='item_name' value='$model_name' />
                  <input type='hidden' name='amount' value='$price' />
                  <input type='hidden' name='discount_amount' value='0.00' />
                  <input type='hidden' name='currency_code' value='GH' />
                  <input type='hidden' name='return' value=''  />
                  <input type='hidden' name='cancel_return' value=''  />
                             <input  style='display: flex;
  align-items: center;
  justify-content: center;' type='submit' name='Cartsubmit' value='Add to cart' class='add-to-cart cartSubmit' />
                </fieldset>
              </form>
            </div>
                </div>
            </div>


        </div>

        ";




    } 
    
}


// get specs 

function getSpec(){
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

if(isset($_GET['id'])) {
      $id =$_GET['id'];
  global $conn;
  $getModel="SELECT * FROM models WHERE id='$id'";
    $runGetModels=mysqli_query($conn,$getModel);

  while ( $row=mysqli_fetch_array($runGetModels)) {
        $id=$row['id'];
        $brandId=$row['brand_id'];
        $model_name=$row['product_name'];
        $price=$row['price'];
        $pic_name=$row['product_pic'];
        $specification=$row['specification'];


        echo "<p>Screen Size</p>
              <p>Material</p>
              <p>CPU </p>
              <p>OS </p>
              <p>GPU </p>
              <p>RAM  </p>
              <p>ROM </p>
              <p>External Memory  </p>
              <p>Screen Types  </p>
              <p>Display Resolution  </p>
              <p>Interfaces </p>
              <br>
               <p>WiFi Support</p>
               <p>Bluetooth</p>
               <p>Camera Types </p>
              <p>Battery Electrical Energy </p>
              <p>Media Formats </p>
               <p>Weight</p>
              <p>Dimensions Size</p>
              <p>Supporting Languages</p>
          ";

    }  
}
}

// specs details
function getSpecDetails(){
 

if(isset($_GET['id'])) {
      $id =$_GET['id'];
  global $conn;
  $getModel="SELECT * FROM models WHERE id='$id'";
    $runGetModels=mysqli_query($conn,$getModel);

  while ( $row=mysqli_fetch_array($runGetModels)) {
        $Screen_Size=$row['Screen_Size'];
        $Material=$row['Material'];
        $OS=$row['OS'];
        $CPU=$row['CPU'];
        $GPU=$row['GPU'];
        $Ram=$row['Ram'];
        $Rom=$row['Rom'];
        $External_Memory=$row['External_Memory'];
        $Screen_Types=$row['Screen_Types'];
        $Display_Resolution=$row['Display_Resolution'];
        $Interfaces=$row['Interfaces'];
        $WiFi_Support=$row['WiFi_Support'];
        $Bluetooth=$row['Bluetooth'];
        $Camera_Types=$row['Camera_Types'];
        $Battery=$row['Battery'];
        $Media_Formats=$row['Media_Formats'];
        $Dimensions=$row['Dimensions'];
        $Weight=$row['Weight'];
        $Supporting_Languages=$row['Supporting_Languages'];


        echo "<li>Screen Size: $Screen_Size</li>
                  
              <li>Material: $Material</li>
                 
              <li>CPU: $CPU</li>

              <li>OS:$OS </li>
              <li>GPU: $GPU </li>
              <li>RAM: $Ram  </li>
              <li>ROM: $Rom </li>
              <li>External Memory: $External_Memory  </li>
              <li>Screen Types : $Screen_Types  </li>
              <li>Display Resolution: Display Resolution$Display_Resolution  </li>
              <li>Interfaces: $Interfaces </li>

               <li>WiFi Support: $WiFi_Support</li>
               <li>Bluetooth: $Bluetooth</li>
               <li>Camera Types: $Camera_Types </li>
              <li>Battery Electrical Energy: $Battery </li>
              <li>Media Formats :$Media_Formats</li>
              <li>Weight: $Weight</li>
              <li>Dimensions Size: $Dimensions</li>
              <li>Supporting Languages: $Supporting_Languages</li>
              
          ";

    }  
}
}

// get singleItem

  function getSingle(){
  	global $conn;
    
  	if(isset($_GET['id'])) {
  		$id =$_GET['id'];
      $ip=get_ip();

  		$getSingle="SELECT * FROM models WHERE id='$id'";
  		$run_getSingle=mysqli_query($conn,$getSingle);

  		while ($row=mysqli_fetch_array($run_getSingle)) {
  		  $id=$row['id'];
    	  $brandId=$row['brand_id'];
    	  $model_name=$row['product_name'];
        $price=$row['price'];
        $previous_price=$row['previous_price'];
        $pic=$row['product_pic'];
        $product_color=$row['product_color'];
        $Ram=$row['Ram'];
        $Rom=$row['Rom'];








    	  echo "	<div class='col-md-4 agileinfo_single_left'>
					<img id='example' style='width:250px;height:187px;' src='$pic' alt=''  class='img-responsive' />
				</div>
				<div class='col-md-8 agileinfo_single_right'>
					   
                    
                    <h3 style='font-family: Times New Roman, Times, serif;'>EKeng Laptop $model_name</h3>   
                    <br> 
                    
          
					<div class='rating1'>
						<span class='starRating'>
							<input id='rating5' type='radio' name='rating' value='5'>
							<label for='rating5'>5</label>
							<input id='rating4' type='radio' name='rating' value='4'>
							<label for='rating4'>4</label>
							<input id='rating3' type='radio' name='rating' value='3' checked>
							<label for='rating3'>3</label>
							<input id='rating2' type='radio' name='rating' value='2'>
							<label for='rating2'>2</label>
							<input id='rating1' type='radio' name='rating' value='1'>
							<label for='rating1'>1</label>
						</span>
					</div>
                   
        
                
                    <div class='section'>
                        <h6 class='title-attr' style='margin-top:15px;'' ><small>COLOR</small></h6>                    
                        <div>
                            <div class='attr' style='width:25px;background:$product_color;'></div>
                            
                        </div>
                    </div>
                    <div class='section' style='padding-bottom:5px;'>
                        <h6 class='title-attr'><small>CAPACITY</small></h6>                    
                        <div>
                            <div class='attr2'>$Ram</div>
                            <div class='attr2'>$Rom</div>
                        </div>
                    </div>   
                    <div class='section' style='padding-bottom:20px;''>
                        <h6 class='title-attr'><small>QUANTITY</small></h6>                    
                        <div>
                            <div class='btn-minus' style='cursor: not-allowed'><span class='glyphicon glyphicon-minus'></span></div>
                            <input value='1' readonly />
                            <div class='btn-plus' style='cursor: not-allowed'><span class='glyphicon glyphicon-plus'></span></div>
                        </div>
                    </div>                
        
                                                         
               
					
					<div class='snipcart-item block'>
						<div class='snipcart-thumb agileinfo_single_right_snipcart'>
							<h4>GH₵$price <span>GH₵ $previous_price</span></h4>
						</div>
						<div class='snipcart-details agileinfo_single_right_details'>
							<form  method='post'>
								<fieldset>
									<input type='hidden' name='cmd' value='_cart' />
									<input type='hidden' name='add' value='1' />
									<input type='hidden' name='business' value='' />
									<input type='hidden' name='item_name' value='$model_name' />
									<input type='hidden' name='amount' value='$price' />
									<input type='hidden' name='discount_amount' value='0.00' />
									<input type='hidden' name='currency_code' value='GH' />
									<input type='hidden' name='return' value=''  />
									<input type='hidden' name='cancel_return' value=''  />
									<input type='submit' name='Cartsubmit' value='Add to cart' class='button' />
								</fieldset>
							</form>
						</div>
					</div>
				
				<div class='clearfix'> </div>
			</div>";

  		}

      
  	}
  }

//get idTypes

  
  function getcardType(){
     
     global $conn;
  	$cardID="SELECT name FROM id_type  ";
    $run_cardID=mysqli_query($conn,$cardID);
    while ($row=mysqli_fetch_array($run_cardID)) {
    $CardType=$row["name"];

    echo "<option>$CardType</option>";


    }
  }



//get institution

  function getInstitution(){
     
     global $conn;
  	$Institution="SELECT name FROM institution  ";
    $run_Institution=mysqli_query($conn,$Institution);
    while ($row=mysqli_fetch_array($run_Institution)) {
    $Institution=$row["name"];

    echo "<option>$Institution</option>";


    }
  }
  

  // customers registration forms

 

  // get autho id


  function generateKey(){
  	$keyLength=4;
  	$str="1234567890";
  	$randstr=substr(str_shuffle($str),0,$keyLength);
  	return $randstr;

  }




  function loginCustomers(){
  	
  	    echo "<script> let timerInterval
Swal.fire({
  title: 'Ekeng Electronics!',
  html: 'Loading Page. <b></b>',
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
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: checkout.php");
//     exit;
// }
 
// Include config file
  global $conn;
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['loginSubmit'])){
 
   $username = trim($_POST["username"]);
   $password = trim($_POST["password"]);
   
   
        // Prepare a select statement
        $sql = "SELECT * FROM customer WHERE email='$username' and password='$password'";
       if ($stmt=mysqli_query($conn, $sql)){
            $rowCount=mysqli_num_rows($stmt);
            
            while ($row=mysqli_fetch_array($stmt)) {
            	$customerId=$row["customerId"];
            	$fname=$row['fname'];
            	
            }

        if ($rowCount==1) {
        	
        	 
            // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION['cusid']=$customerId;
              $_SESSION["fname"]=$fname;
              $_SESSION["username"] = $username; 


           $getCart="SELECT * FROM cart";
           $run_cart=mysqli_query($conn,$getCart);
           $countCart=mysqli_num_rows($run_cart);

           echo "<script>
                 const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signed in successfully'
})


               </script>";

           if($countCart>0) {
           	echo "<script>window.open('payment.php','_self')</script>";
           }else{
           	echo "<script>window.open('customerProfile.php','_self')</script>";
           }  




        }else{
        	echo "<div class='alert alert-danger' role='alert'>
                        Username or password does not exist 
                   </div>";
        }

    }else{
    	echo "<div class='alert alert-danger' role='alert'>
                        Oops! Something went wrong. Please try again later. 
                   </div>";
    }
          
          
  }
}

function get_ip(){

    $ip =$_SERVER['REMOTE_ADDR'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
     $ip =$_SERVER['HTTP_CLIENT_IP'];

    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ip =$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    
     return $ip; 

   }

function  insertCart(){

	global $conn;
	$ip=get_ip();

if(isset($_POST["submit"])){
	


	$productName=trim($_POST["item_name"]);
	$price=trim($_POST["amount"]);
	$quantity=trim($_POST["quantity"]);
    
  $findmodel="SELECT * FROM models WHERE price='$price'";
  $run_findmodel=mysqli_query($conn,$findmodel);

  while ($row=mysqli_fetch_array($run_findmodel)) {
    $modelStatus=$row['modelStatus'];
    
  }

  if($modelStatus==2){

       echo " 
            <script> Swal.fire({
               position: 'center',
              icon: 'error',
              title: 'Sold Out!',
              text: 'Laptop Out of Stock.',
              showConfirmButton: false,
              timer: 2500
             })</script>";      
               
  }elseif ($modelStatus==3) {
       echo " 
            <script> Swal.fire({
               position: 'center',
              icon: 'error',
              title: 'coming soon!',
              text: 'Laptop Not Yet in Stock.',
              showConfirmButton: false,
              timer: 2500
             })</script>"; 
    
  }




  else{


    
	$findProductId="SELECT * FROM models WHERE product_name='$productName'";
	$run_findProductId=mysqli_query($conn,$findProductId);

	if($row=mysqli_fetch_array($run_findProductId)){
		$productId =$row["id"];
	}

   $checkCart="SELECT * FROM cart where productId='$productId' and ip_address='$ip'";
   $run_checkCart=mysqli_query($conn,$checkCart);
   $countCart=mysqli_num_rows($run_checkCart);

   if($countCart>0){
        echo "<script>window.open('payment.php','_self')</script>";
   }else{
   	  $Cart="SELECT * FROM cart where productId!='$productId' and   ip_address='$ip'";
   	   $run_Cart=mysqli_query($conn,$Cart);
       $countCart1=mysqli_num_rows($run_Cart);


       if($countCart1>0){
       	   $updateCart="UPDATE cart set productId='$productId', price='$price', quantity='$quantity'";
       	   $run_updateCart=mysqli_query($conn,$updateCart);

       	   if($run_updateCart){
       	   	   echo "<script>window.open('payment.php','_self')</script>";
       	   }else{
       	   	 echo "<script>window.alert('checkout error. contact Ekeng Electronics')</script>";
       	   }
       }else{
              $insertCart="INSERT INTO cart(productId,price,quantity,ip_address) VALUES('$productId','$price','$quantity','$ip')";
       	     $run_insertCart=mysqli_query($conn,$insertCart);

       	     if($run_insertCart){
       	     	echo "<script>window.open('payment.php','_self')</script>";
       	     }else{
       	     	 echo "<script>window.alert('checkout error. contact Ekeng Electronics')</script>";
       	     }
       }
   }
}

}
}




function getCartItems(){

	
	global $conn;
   $ip=get_ip();
   $Cart="SELECT c.id,c.quantity,c.price,c.productId FROM cart c where ip_address='$ip'

   ";
   $run_Cart=mysqli_query($conn,$Cart);
   $countCart=mysqli_num_rows($run_Cart);


  if($countCart>0){



  	while ($row=mysqli_fetch_array($run_Cart)) {
  		$ip=$row["id"];
  		$productId=$row["productId"];
  		$quantity=$row["quantity"];
  		$price=$row["price"];
  		$id=$row["id"];

       $getmodelName="SELECT product_name from models where id='$productId'";
       $run_getmodelName=mysqli_query($conn,$getmodelName);
        while ($row=mysqli_fetch_array($run_getmodelName)) {
        	$product_name=$row["product_name"];
        }

      echo "<tr class='rem3'>
						<td class='invert'>$id</td>
						<td class='invert'>
							 <div class='quantity'> 
								<div class='quantity-select'>                           
									
									<div class='entry value'><span>$quantity</span></div>
									
								</div>
							</div>
						</td>
						<td class='invert'>$product_name</td>
						
						<td class='invert'>$price</td>
						<td class='invert'>
							<div class='rem'>
								<a href='checkout.php?remove=$id' class='close1'> </a>
							</div>
	
						</td>
					</tr>";


  	}
        
  }else{
    echo "<div class='alert alert-danger' role='alert'>
                       Your Cart Is Empty 
          </div>";
  }

}


// remove cart

function removeCart(){

	global $conn;

	if(isset($_GET["remove"])){
		$id=$_GET["remove"];
		$removeCart="DELETE FROM cart where id='$id' ";
    $run_removeCart=mysqli_query($conn,$removeCart);

    if($run_removeCart){
    	echo " 
            <script> Swal.fire({
               position: 'top-end',
              icon: 'success',
              title: 'Delete success!',
              showConfirmButton: false,
              timer: 2000
             })</script>";
    }else{
    	echo "<div class='alert alert-danger' role='alert'>
                       delete Failled!
          </div>";
    }

	}

	

}


//get total items in cart
function  getCartNum(){

	global $conn;
      $ip=get_ip();
	 $Cart="SELECT * FROM cart c where ip_address='$ip'

   ";
   $run_Cart=mysqli_query($conn,$Cart);
   $countCart=mysqli_num_rows($run_Cart);

   return $countCart;
}


//get order details

function getOderdetails(){
	global  $conn;
     $ip=get_ip();
	 $getOder="SELECT * FROM cart c where ip_address='$ip'

   ";
   $run_getOder=mysqli_query($conn,$getOder);
   $countOrder=mysqli_num_rows($run_getOder);

   if($countOrder>0){
   	    while($row=mysqli_fetch_array($run_getOder)){
   	    $ip=$row["id"];
  		$productId=$row["productId"];
  		$quantity=$row["quantity"];
  		$price=$row["price"];
  		$id=$row["id"];
   	    

   	    echo "<li>Oder <i>-</i> <span>GH₵ $price </span></li>
						<li>Delivery <i>-</i> <span>GH₵ 0.00 </span></li>
						<li>Service <i>-</i> <span>GH₵ 0.00 </span></li>
						
						<li style='font-weight:bolder'>Total <i>-</i><span>GH₵ $price</span></li>";
   	}


   }else{
   		echo "<div class='alert alert-danger' role='alert'>
                       Order empty
          </div>";
   }

   }	


  function getcardType1(){
     
     global $conn;
  	$cardID="SELECT name FROM id_type  ";
    $run_cardID=mysqli_query($conn,$cardID);
    while ($row=mysqli_fetch_array($run_cardID)) {
    $CardType=$row["name"];

    echo "<option>$CardType</option>";


    }
  }



//get institution

  function getInstitution1(){
     
     global $conn;
  	$Institution="SELECT name FROM institution  ";
    $run_Institution=mysqli_query($conn,$Institution);
    while ($row=mysqli_fetch_array($run_Institution)) {
    $Institution=$row["name"];

    echo "<option >$Institution</option>";


    }
  }
//get customers details

function getCustomerDetails(){

	global  $conn;
  $cusid=$_SESSION["cusid"];
	$getDetails="SELECT * FROM customer WHERE customerId='$cusid'";
	$run_getDetails=mysqli_query($conn,$getDetails);
    $rowCount=mysqli_num_rows($run_getDetails);

    if($rowCount>0){
    	while ($row=mysqli_fetch_array($run_getDetails)) {
    		$id =$row["id"];
    		$sname =$row["sname"];
    		$fname =$row["fname"];
    		$contact =$row["contact"];
    		$email =$row["email"];
    		$cardTypeId =$row["cardTypeId"];
    		$id_number =$row["id_number"];
    		$institutionId =$row["institutionId"];
    		$institutionName =$row["institutionName"];
    		$studentId =$row["studentId"];
    		$ezwich_num =$row["ezwich_num"];
    		$lastUpdated =$row["lastUpdated"];


    		    $cardname="SELECT name FROM id_type WHERE id='$cardTypeId' ";
                        $run_cardname=mysqli_query($conn,$cardname);
                        while ($row=mysqli_fetch_array($run_cardname)) {
                        	$CardTypename=$row["name"];

                        }
                     
                     $institution="SELECT name FROM institution WHERE id='$institutionId'";
                        $run_institution=mysqli_query($conn,$institution);
                        while ($row=mysqli_fetch_array($run_institution)) {
                        	$institutionname=$row["name"];
                        }

               

    		echo "  <div class='row' >
    	                              <div class='col-md-1'></div>
    	                                   <div class='col-md-4'>   
                     
												<div class='controls'>
													<label class='control-label'>Full name:<span style='color: red'>*</span> </label>
													<input style='border-radius: 5px' class='billing-address-name form-control' type='text' name='fullname' placeholder='full name' required autocomplete='off' id='fname' value='$sname $fname'>
												</div>
												<div class='w3_agileits_card_number_grids'>
												
													<div class='clear'> </div>

												</div>
												<div class='controls'>
													<label class='control-label'>Tel No: <span style='color: red'>*</span></label>
													<input style='border-radius: 5px' class='billing-address-name form-control' type='number' name='contact' placeholder='Telephone Number' required autocomplete='off' value='$contact'>
												</div>
												<div class='controls'>
													<label class='control-label'>Email:<span style='color: red'>*</span> </label>
													<input style='border-radius: 5px' class='billing-address-name form-control' type='email' name='email' placeholder='Email Address' required autocomplete='off' value='$email'> 
												</div>
												    <div class='controls'>
															<label class='control-label'>ID type:<span style='color: red'>*</span> </label>
												       <select style='border-radius: 5px' class='form-control option-w3ls' name='cardID' id='card' required>

												       	    ";
															
														  	$cardID="SELECT name FROM id_type  ";
                                                            $run_cardID=mysqli_query($conn,$cardID);
                                                          while ($row=mysqli_fetch_array($run_cardID)) {
                                                          $CardType=$row["name"];

                                                            echo "<option >$CardType</option>";


                                                             }
															
							
													echo  " </select>
													</div>
													<br>
													 <div class='controls'>
															<label class='control-label'>ID NO:<span style='color: red'>*</span></label>
														    <input style='border-radius: 5px' style='border-radius: 5px' class='form-control' type='text' placeholder='ID number' name='idnum' required autocomplete='off' value='$id_number'>
												</div>
													
										   </div>
										    <div class='col-md-2'></div>
										     <div class='col-md-4'>   
                                               
												
												<div class='controls'>
															<label class='control-label'>Institution:<span style='color: red'>*</span> </label>
												       <select style='border-radius: 5px' class='form-control option-w3ls'  name='institution' id='institution' required >
												       
												       	    ";

													  $Institution="SELECT name FROM institution  ";
                                                      $run_Institution=mysqli_query($conn,$Institution);
                                                      while ($row=mysqli_fetch_array($run_Institution)) {
                                                       $Institution=$row["name"];

                                                      echo "<option   > 
                                                            $Institution
                                                            </option>";  
														}
							
													  echo "  </select>
													</div>
													<br>
												<div class='w3_agileits_card_number_grids'>
													<div class='w3_agileits_card_number_grid_left'>
														<div class='controls'>
															<label class='control-label'>Institution Name:<span style='color: red'>*</span></label>
														    <input style='border-radius: 5px' class='form-control' type='text' placeholder='Institution Name' name='institutionName' required autocomplete='off' value='$institutionName'>
														</div>
													</div>
													<div class='w3_agileits_card_number_grid_right'>
														<div class='controls'>
															<label class='control-label'>Student ID: </label>
														 <input style='border-radius: 5px' class='form-control' type='number'placeholder='Student ID Number' name='studentNo'  autocomplete='off' value='$studentId'>
														</div>
													</div>
													<div class='clear'> </div>
												</div>
												<div class='controls'>
													<label class='control-label'>Ezwich: </label>
												 <input style='border-radius: 5px' class='form-control' type='number' placeholder='Ezwich Number' name='ezwich'  autocomplete='off' value='$ezwich_num'>
												</div>
													
										   </div>
										   <div class='col-md-1'></div>
									</div>

                                     	<button class='submit check_out' style='background-color: #D4AF37;font-family: Times New Roman, Times, serif;' type='submit' name='comDetails'>Comfirm Your Details</button>
						              </section>
					     
					     

						
						
						
						
					    <div class='checkout-right-basket' >
				        	<a href='payment.php?uid=$cusid' style='font-family: Times New Roman, Times, serif;'>Proceed to Payment <span class='glyphicon glyphicon-chevron-right' aria-hidden='true' name='processpayment'></span></a>
			      	        </div>



			      	            <script type='text/javascript'>
                                   
                                     
                                     document.getElementById('institution').value = '$institutionname';
			      	            </script>

			      	            <script type='text/javascript'>
                                   
                                     
                                     document.getElementById('card').value = '$CardTypename';
			      	            </script>


									";


    	}
    }else{
    	echo "<div class='alert alert-danger' role='alert'>
                     Customer is empty!
          </div>";
    }
   
}


function comfirmDetails(){
	$id=$_SESSION["cusid"];
	global $conn;
	if(isset($_POST['comDetails'])){
		// echo "<div class='alert alert-success' role='alert'>
  //        Details Comfirmed. You Can Proceed To Payment!
  //       </div>";
        $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
         $contact=mysqli_real_escape_string($conn,$_POST['contact']);
          $email=mysqli_real_escape_string($conn,$_POST['email']);
           $cardID=mysqli_real_escape_string($conn,$_POST['cardID']);
            $idnum=mysqli_real_escape_string($conn,$_POST['idnum']);
             $institution=mysqli_real_escape_string($conn,$_POST['institution']);
              $institutionName=mysqli_real_escape_string($conn,$_POST['institutionName']);
               $studentNo=mysqli_real_escape_string($conn,$_POST['studentNo']);
                $ezwich=mysqli_real_escape_string($conn,$_POST['ezwich']);


                $checkCustomer="SELECT * FROM customer WHERE email='$email' || id_number='$idnum' || studentId='$studentNo'";
                $run_checkCustomer=mysqli_query($conn,$checkCustomer);
                $countCus=mysqli_num_rows($run_checkCustomer);


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

                   $updateCus="UPDATE customer SET fullName='$fullname',contact='$contact',email='$email',cardTypeId='$CardId',	id_number='$idnum',institutionId='$institutionId',institutionName='$institutionName',studentId='$studentNo',ezwich_num='$ezwich' WHERE customerId ='$id'";

                   $run_updateCus=mysqli_query($conn,$updateCus);
                   if($run_updateCus){
                   	   echo "<script>swal.fire({
                      title: 'Details Comfirmed!',
                       text: 'You Can Proceed To Payment.',
                        icon: 'success',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
                   }else{
                   	echo "<div class='alert alert-danger' role='alert'>
                     Error Occurs!
                    </div>";
                   }
                

	}
}


function getPaymentOptions(){
	global $conn;

	$paymentOptions="SELECT * FROM paymentoption";
	$run_paymentOption=mysqli_query($conn,$paymentOptions);
	if($run_paymentOption){
		while ($row=mysqli_fetch_array($run_paymentOption)) {

			$paymentOptions=$row["optionName"];

			echo "<option style='font-size:15px;'>$paymentOptions</option>";
		}
	}
}

function getPaymentPlan(){
	global $conn;

	$paymentPlan="SELECT * FROM paymentplan WHERE paymentYear !=4";
	$run_paymentPlan=mysqli_query($conn,$paymentPlan);
	if($run_paymentPlan){
		while ($row=mysqli_fetch_array($run_paymentPlan)) {

			$paymentPlan=$row["paymentYear"];

			echo "<option  style='font-size:15px;'>$paymentPlan</option>";
		}
	}
}


function getacademicyear(){
	global $conn;

	$academicyear="SELECT * FROM academicyear WHERE academicYear!=7";
	$run_academicyear=mysqli_query($conn,$academicyear);
	if($run_academicyear){
		while ($row=mysqli_fetch_array($run_academicyear)) {

			$academicyear=$row["academicYear"];

			echo "<option style='font-size:15px;'>$academicyear</option>";
		}
	}
}




function getfullPaymentOption(){
	global $conn;

	$fullPayment="SELECT * FROM paymentoption WHERE id='1'";
	$run_fullPayment=mysqli_query($conn,$fullPayment);

	if($run_fullPayment){
		while ($row=mysqli_fetch_array($run_fullPayment)) {
			$fullPayment=$row["optionName"];

			echo "<input style='border-radius:5px;' class='billing-address-name form-control' type='text' name='pname' value='$fullPayment' readonly>";
		}
	}
}


// getting Cash on delivery payment Type

function getCOD(){
	global $conn;

	$getCOD="SELECT * FROM paymenttype WHERE id='1'";
	$run_getCOD=mysqli_query($conn,$getCOD);

	if($run_getCOD){
		while ($row=mysqli_fetch_array($run_getCOD)) {
			$COD=$row["name"];

			echo "<input style='border-radius:5px;' class='billing-address-name form-control' type='text' name='paymentType' value='$COD' readonly>";
		}
	}
}

// getting full payment payment type

function getFP(){
	global $conn;

	$getFP="SELECT * FROM paymenttype WHERE id='2'";
	$run_getFP=mysqli_query($conn,$getFP);

	if($run_getFP){
		while ($row=mysqli_fetch_array($run_getFP)) {
			$FP=$row["name"];

			echo "<input style='border-radius:5px;' class='billing-address-name form-control' type='text' name='paymentType' value='$FP' readonly>";
		}
	}
}

// getting E-zwich payment
function getezwich(){
	global $conn;

	$getezwich="SELECT * FROM paymenttype WHERE id='3'";
	$run_getezwich=mysqli_query($conn,$getezwich);

	if($run_getezwich){
		while ($row=mysqli_fetch_array($run_getezwich)) {
			$ezwich=$row["name"];

			echo "<input style='border-radius:5px;' class='billing-address-name form-control' type='text' name='paymentType' value='$ezwich' readonly>";
		}
	}
}
//proceed to payment


function proceedPayment(){
	global $conn;
	$ip=get_ip();
	if(isset($_GET["uid"])){
		$cusid=$_GET["uid"];

       
		$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		if($run_checkCart){
			$rowCount=mysqli_num_rows($run_checkCart);

			if($rowCount>0){
				
              echo "<script>window.open('paymentprocess.php?uid=$cusid','_self')</script>";

                     
			}else{
               echo "<script>swal.fire({
                      title: 'Cart Empty!',
                       text: 'There is no Item in Cart.',
                        icon: 'info',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
			}
		}
	}
}

// get item price
function itemPrice(){
	global $conn;
    $ip=get_ip();
	$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		while ($row=mysqli_fetch_array($run_checkCart)) {
		    $itemPrice=$row["price"];
		    $productId=$row["productId"];



		}

		echo "<input name='fullAmount' class='form-control' placeholder='Full Payment' type='number' value='$itemPrice' readonly>";
}



function itemAmount(){
	global $conn;
    $ip=get_ip();
	$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		while ($row=mysqli_fetch_array($run_checkCart)) {
		    $itemPrice=$row["price"];
		    $productId=$row["productId"];



		}

		echo "<input id='amount' class='form-control' placeholder='Full Payment' type='number' name='fullamount' style='display: none;' value='$itemPrice' readonly>";
}

function itemAmount1(){
	global $conn;
    $ip=get_ip();
	$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		while ($row=mysqli_fetch_array($run_checkCart)) {
		    $itemPrice=$row["price"];
		    $productId=$row["productId"];



		}

		echo "<input id='amount1' class='form-control' placeholder='Full Payment' type='number' name='fullamount' style='display: none;' value='$itemPrice' readonly>";
}
//process cash on delivey



function processCOD(){
	global $conn;
	$ip=get_ip();
	if(isset($_GET["uid"])){
		$cusid=$_GET["uid"];

       
		$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		while ($row=mysqli_fetch_array($run_checkCart)) {
		    $itemPrice=$row["price"];
		    $productId=$row["productId"];
		}

		$getcusid="SELECT id,institutionId,institutionName FROM customer WHERE customerId='$cusid'";
		$run_getcusid=mysqli_query($conn,$getcusid);
		while ($row=mysqli_fetch_array($run_getcusid)) {
		    $uid=$row["id"];
		    $institutionId=$row["institutionId"];
		    $institutionName=$row["institutionName"];
		    
		}

		if (isset($_POST["submitCOD"])) {
			
			$paymentplan=4;
      $orderStatus=1;
      $initialamount=0;
			$paymentOption=mysqli_escape_string($conn,$_POST["pname"]);
			$totalAmount=mysqli_escape_string($conn,$_POST["fullAmount"]);
			$paymentType=mysqli_escape_string($conn,$_POST["paymentType"]);
      $AmountLeft=$totalAmount;
			$getPaymentOptionId="SELECT * FROM paymentoption WHERE optionName='$paymentOption'";
		   $run_getPaymentOptionId=mysqli_query($conn,$getPaymentOptionId);
		    while ($row=mysqli_fetch_array($run_getPaymentOptionId)) {
		    $PaymentOptionId=$row["id"];
		    
		    
		   }
          // get payment type
            $getpaymentTypeId="SELECT id FROM paymenttype WHERE name='$paymentType'";
		   $run_getpaymentTypeId=mysqli_query($conn,$getpaymentTypeId);
		    while ($row=mysqli_fetch_array($run_getpaymentTypeId)) {
		    $paymentTypeId=$row["id"];
		    
		    
		   }



		     $findUser="SELECT * FROM checkout WHERE customerId='$uid'";
		     $run_findUser=mysqli_query($conn,$findUser);
		     $usercount=mysqli_num_rows($run_findUser);

		     if($usercount>0){
                    echo "<script>swal.fire({
                      title: 'Order already Made!',
                       text: 'Contact us if you want to alter your Order.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>"; 
		     }else{
		     	$insertPayment="INSERT INTO checkout(customerId,paymentOptionId,paymentPlan,InstitutionId ,modelId,totalPrice,orderdate,institutionName,paymentTypeId,orderStatus,AmountLeft,initialAmount ) VALUES('$uid','$PaymentOptionId','$paymentplan','$institutionId','$productId','$totalAmount',now(),'$institutionName','$paymentTypeId','$orderStatus','$AmountLeft','$initialamount')";

			      $run_insertPayment=mysqli_query($conn,$insertPayment);

			if($run_insertPayment){
           $insert_user_payment="INSERT INTO userpayments(paymentAmount,customerId,statusid,paymentDate ) 
           VALUES('$initialamount','$uid','2',now())";

            mysqli_query($conn,$insert_user_payment);

				echo "<script>swal.fire({
                      title: 'Order Made successfully!',
                       text: 'You will be Contact by one of our Officials very soon.',
                        icon: 'success',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
			}else{
				echo "<script>swal.fire({
                      title: 'Order Failled!',
                       text: 'There is problem with your Order.\r\nPlease Try again Later',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
                
			}

		     }

			
		}
	}
}



// university students fees

function processSchoolFees(){
	global $conn;
	$ip=get_ip();
	if(isset($_GET["uid"])){
		$cusid=$_GET["uid"];

       
		$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		while ($row=mysqli_fetch_array($run_checkCart)) {
		    $itemPrice=$row["price"];
		    $productId=$row["productId"];
		}

		$getcusid="SELECT id,institutionId,institutionName,yearId FROM customer WHERE customerId='$cusid'";
		$run_getcusid=mysqli_query($conn,$getcusid);
		while ($row=mysqli_fetch_array($run_getcusid)) {
		    $uid=$row["id"];
		    $institutionId=$row["institutionId"];
		    $institutionName=$row["institutionName"];
        $yearId=$row["yearId"];
		    
		}

		if (isset($_POST["processFees"])) {

			if ($institutionId==3) {
        $orderStatus=1;
				$paymentplan=mysqli_escape_string($conn,$_POST["paymentPlan"]);;
			  $paymentOption=mysqli_escape_string($conn,$_POST["paymentOption"]);
			  $totalAmount=mysqli_escape_string($conn,$_POST["fullamount"]);
			  $initialAmount=mysqli_escape_string($conn,$_POST["initialamount"]);
			  $paymentType=mysqli_escape_string($conn,$_POST["paymentType"]);
        $AmountLeft=$totalAmount;



			$getPaymentOptionId="SELECT * FROM paymentoption WHERE optionName='$paymentOption'";
		   $run_getPaymentOptionId=mysqli_query($conn,$getPaymentOptionId);
		    while ($row=mysqli_fetch_array($run_getPaymentOptionId)) {
		    $PaymentOptionId=$row["id"];
		    
		    
		}


		  // get payment type
            $getpaymentTypeId="SELECT id FROM paymenttype WHERE name='$paymentType'";
		   $run_getpaymentTypeId=mysqli_query($conn,$getpaymentTypeId);
		    while ($row=mysqli_fetch_array($run_getpaymentTypeId)) {
		    $paymentTypeId=$row["id"];
		    
		    
		   }



		     $findUser="SELECT * FROM checkout WHERE customerId='$uid'";
		     $run_findUser=mysqli_query($conn,$findUser);
		     $usercount=mysqli_num_rows($run_findUser);

		     if($usercount>0){
                    echo "<script>swal.fire({
                      title: 'Order already Made!',
                       text: 'Contact us if you want to alter your Order.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
		     }else{
                     
              if($paymentOption=="full Payment"){
                   $initialAmount=0;
                 	$paymentplan1='4';
                 		$insertPayment="INSERT INTO checkout(customerId,paymentOptionId,paymentPlan,InstitutionId ,modelId,totalPrice,orderdate,institutionName,paymentTypeId,orderStatus,AmountLeft,initialAmount) VALUES('$uid','$PaymentOptionId','$paymentplan1','$institutionId','$productId','$totalAmount',now(),'$institutionName','$paymentTypeId','$orderStatus','$AmountLeft','$initialAmount')";

		               	$run_insertPayment=mysqli_query($conn,$insertPayment);

			if($run_insertPayment){
        $insert_user_payment="INSERT INTO userpayments(paymentAmount,customerId,statusid,paymentDate ) 
           VALUES('$initialAmount','$uid','2',now())";

            mysqli_query($conn,$insert_user_payment);
				echo "<script>swal.fire({
                      title: 'Order Made successfully!',
                       text: 'One of our Officials will Contact you very soon.',
                        icon: 'success',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
			}else{
				echo "<script>swal.fire({
                      title: 'Order Failled!',
                       text: 'There is a problem with your Order.\r\n Please Try again Later',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
                
			}

			

            }else{ 

                 	if($paymentplan==''){
                 		echo "<script>swal.fire({
                      title: 'Payment Plan Empty!',
                       text: 'Please Select a Payment Plan to Continue.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";

                  

                 	}else{
                    if($paymentplan==2 and $yearId==3){

                       echo "<script>swal.fire({
                      title: 'Payment Plan Unacceptable!',
                       text: 'Year 3 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";

                    }else{
                      if($paymentplan==2 && $yearId==4){
                         echo "<script>swal.fire({
                      title: 'Payment Plan Unacceptable!',
                       text: 'Year 4 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                        if($paymentplan==2 && $yearId==5){
                         echo "<script>swal.fire({
                      title: 'Payment Plan Unacceptable!',
                       text: 'Year 5 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                            if($paymentplan==2 && $yearId==6){
                         echo "<script>swal.fire({
                      title: 'payment Plan Unacceptable!',
                       text: 'Year 6 Students have only 1 year/2semesters to finish payment',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                         if($paymentplan==3 && $yearId==2){
                         echo "<script>swal.fire({
                      title: 'payment Plan Unacceptable!',
                       text: 'Year 2 Students have only 2years/4semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                          if($paymentplan==3 && $yearId==3){
                         echo "<script>swal.fire({
                      title: 'payment Plan Unacceptable!',
                       text: 'Year 3 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                          if($paymentplan==3 && $yearId==4){
                         echo "<script>swal.fire({
                      title: 'payment Plan Unacceptable!',
                       text: 'Year 4 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                          if($paymentplan==3 && $yearId==5){
                         echo "<script>swal.fire({
                      title: 'payment Plan Unacceptable!',
                       text: 'Year 5 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                          if($paymentplan==3 && $yearId==6){
                         echo "<script>swal.fire({
                      title: 'payment Plan Unacceptable!',
                       text: 'Year 6 Students have only 1year/2semesters to finish payment.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";  
                      }else{
                        if($initialAmount==''){
                          echo "<script>swal.fire({
                              title: 'initial Amount Empty!',
                             text: 'Please Add an Initial Amount.',
                             icon: 'error',
                             imageUrl: 'thumbs-up.jpg'
                           });
                       </script>"; 
                        }else{
                           if($initialAmount<200){
                          echo "<script>swal.fire({
                              title: 'Initial Amount Insufficient!',
                             text: 'Please Pay Initial Amount Not Less than 200 Cedis.',
                             icon: 'error',
                             imageUrl: 'thumbs-up.jpg'
                           });
                       </script>"; 
                        }else{
                          $AmountLeft=$totalAmount-$initialAmount;
                            $insertPayment="INSERT INTO checkout(customerId,paymentOptionId,paymentPlan,InstitutionId ,modelId,totalPrice,orderdate,institutionName,paymentTypeId,orderStatus,AmountLeft,initialAmount) VALUES('$uid','$PaymentOptionId','$paymentplan','$institutionId','$productId','$totalAmount',now(),'$institutionName','$paymentTypeId','$orderStatus','$AmountLeft','$initialAmount')";

                             $run_insertPayment=mysqli_query($conn,$insertPayment);

                             if($run_insertPayment){
                              $insert_user_payment="INSERT INTO userpayments(paymentAmount,customerId,statusid,paymentDate ) 
                                VALUES('$initialAmount','$uid','2',now())";

                                mysqli_query($conn,$insert_user_payment);
                               echo "<script>swal.fire({
                                 title: 'Order Made successfully!',
                                 text: 'thanks for your order.',
                                 icon: 'success',
                                 imageUrl: 'thumbs-up.jpg'
                                 });
                               </script>";
                             }
                        }
                        }
                      }
                      }



                      }
                      }
                      }
                      }
                      }
                      }
                    }
                 		

                 	

                 }
                  }
		     

		     }
			}else{
					echo "<script>swal.fire({
                        title: 'Oops',
                        text: 'This Payment Type is for University Students Only .',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                          });
                        </script>";
			}
			
			

			
		}
	}
}

// Ezwich Payment

function processEzwich(){
	global $conn;
	$ip=get_ip();
	if(isset($_GET["uid"])){
		$cusid=$_GET["uid"];

       
		$checkCart="SELECT * FROM cart WHERE ip_address='$ip'";
		$run_checkCart=mysqli_query($conn,$checkCart);
		while ($row=mysqli_fetch_array($run_checkCart)) {
		    $itemPrice=$row["price"];
		    $productId=$row["productId"];
		}

		$getcusid="SELECT id,institutionId,institutionName,yearId  FROM customer WHERE customerId='$cusid'";
		$run_getcusid=mysqli_query($conn,$getcusid);
		while ($row=mysqli_fetch_array($run_getcusid)) {
		    $uid=$row["id"];
		    $institutionId=$row["institutionId"];
		    $institutionName=$row["institutionName"];
        $yearId=$row["yearId"];
		    
		}

		if (isset($_POST["processEzwich"])) {
			
             if($institutionId==3){

             	echo "<script>swal.fire({
                        title: 'Oops',
                        text: 'This Payment Type is not Accepted By University Students.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                          });
                        </script>";

             }else{
              $orderStatus=1;
             	$paymentplan=mysqli_escape_string($conn,$_POST["paymentPlan"]);;
			    $paymentOption=mysqli_escape_string($conn,$_POST["paymentOption"]);
			    $totalAmount=mysqli_escape_string($conn,$_POST["fullamount"]);
			    $initialAmount=mysqli_escape_string($conn,$_POST["initialamount"]);
			    $paymentType=mysqli_escape_string($conn,$_POST["paymentType"]);
          $AmountLeft=$totalAmount;


			$getPaymentOptionId="SELECT * FROM paymentoption WHERE optionName='$paymentOption'";
		   $run_getPaymentOptionId=mysqli_query($conn,$getPaymentOptionId);
		    while ($row=mysqli_fetch_array($run_getPaymentOptionId)) {
		    $PaymentOptionId=$row["id"];
		    
		    
		}
        // get payment type
            $getpaymentTypeId="SELECT id FROM paymenttype WHERE name='$paymentType'";
		   $run_getpaymentTypeId=mysqli_query($conn,$getpaymentTypeId);
		    while ($row=mysqli_fetch_array($run_getpaymentTypeId)) {
		    $paymentTypeId=$row["id"];
		    
		    
		   }


		     $findUser="SELECT * FROM checkout WHERE customerId='$uid'";
		     $run_findUser=mysqli_query($conn,$findUser);
		     $usercount=mysqli_num_rows($run_findUser);

		     if($usercount>0){
                    echo "<script>swal.fire({
                      title: 'Order already Made!',
                       text: 'Contact us if you want to alter your Order.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
		     }else{
                     
              if($paymentOption=="full Payment"){
                   $initialAmount=0;
                 	$paymentplan='4';
                 		$insertPayment="INSERT INTO checkout(customerId,paymentOptionId,paymentPlan,InstitutionId ,modelId,totalPrice,orderdate,institutionName,paymentTypeId,orderStatus,AmountLeft) VALUES('$uid','$PaymentOptionId','$paymentplan','$institutionId','$productId','$totalAmount',now(),'$institutionName','$paymentTypeId','$orderStatus','$AmountLeft')";

			$run_insertPayment=mysqli_query($conn,$insertPayment);

			if($run_insertPayment){
        $insert_user_payment="INSERT INTO userpayments(paymentAmount,customerId,statusid,paymentDate ) 
           VALUES('$initialAmount','$uid','2',now())";

            mysqli_query($conn,$insert_user_payment);
				echo "<script>swal.fire({
                      title: 'Order Made successfully!',
                       text: 'One of our Officials will Contact you very soon.',
                        icon: 'success',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
			}else{
				echo "<script>swal.fire({
                      title: 'Order Failled!',
                       text: 'There is a problem with your Order.\r\n Please Try again Later',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                     });
                </script>";
                
			}

			

            }else{

                 	if($paymentplan==''){
                 		echo "<script>swal.fire({
                      title: 'Payment Plan Empty!',
                       text: 'Please Select a Payment Plan to Continue.',
                        icon: 'error',
                        imageUrl: 'thumbs-up.jpg'
                       });
                    </script>";



                 	}else{
                       if($paymentplan==2 && $yearId==3){
                            echo "<script>swal.fire({
                              title: 'Payment Plan Unacceptable!',
                              text: 'Year 3 Students have only 1year/2semesters to finish payment.',
                               icon: 'error',
                              imageUrl: 'thumbs-up.jpg'
                             });
                           </script>"; 
                       }else{
                        if($paymentplan==2 && $yearId==7){
                             echo "<script>swal.fire({
                              title: 'Payment Plan Unacceptable!',
                              text: 'Nss Personels can only choose 1year payment plan.',
                               icon: 'error',
                              imageUrl: 'thumbs-up.jpg'
                             });
                           </script>";
                        }else{
                          if($paymentplan==3 && $yearId==2){
                                  echo "<script>swal.fire({
                              title: 'Payment Plan Unacceptable!',
                              text: 'Year 2 students can only choose 1/2years payment plan.',
                               icon: 'error',
                              imageUrl: 'thumbs-up.jpg'
                             });
                           </script>";
                          }else{
                            if ($paymentplan==3 && $yearId==3) {
                              echo "<script>swal.fire({
                              title: 'Payment Plan Unacceptable!',
                              text: 'Year 3 students can only choose 1year payment plan.',
                               icon: 'error',
                              imageUrl: 'thumbs-up.jpg'
                             });
                           </script>";
                            }else{
                              if ($paymentplan==3 && $yearId==7) {
                                 echo "<script>swal.fire({
                              title: 'Payment Plan Unacceptable!',
                              text: 'Nss Personels can only choose 1year payment plan.',
                               icon: 'error',
                              imageUrl: 'thumbs-up.jpg'
                             });
                           </script>";
                              }else{
                                 if($initialAmount==''){
                               echo "<script>swal.fire({
                                 title: 'initial Amount Empty!',
                                 text: 'Please Add an Initial Amount.',
                                 icon: 'error',
                                 imageUrl: 'thumbs-up.jpg'
                                });
                              </script>"; 
                              }else{
                                 if($initialAmount<200){
                                  echo "<script>swal.fire({
                                     title: 'Initial Amount Insufficient!',
                                     text: 'Please Pay Initial Amount Not Less than 200 Cedis.',
                                     icon: 'error',
                                    imageUrl: 'thumbs-up.jpg'
                                   });
                                   </script>"; 
                             }else{
                                $AmountLeft=$totalAmount-$initialAmount;
                                 $insertPayment="INSERT INTO checkout(customerId,paymentOptionId,paymentPlan,InstitutionId ,modelId,totalPrice,orderdate,institutionName,paymentTypeId,orderStatus,AmountLeft,initialAmount) VALUES('$uid','$PaymentOptionId','$paymentplan','$institutionId','$productId','$totalAmount',now(),'$institutionName','$paymentTypeId','$orderStatus','$AmountLeft','$initialAmount')";

                                $run_insertPayment=mysqli_query($conn,$insertPayment);

                             if($run_insertPayment){
                               $insert_user_payment="INSERT INTO userpayments(paymentAmount,customerId,statusid,paymentDate ) 
                                     VALUES('$initialAmount','$uid','2',now())";

                                    mysqli_query($conn,$insert_user_payment);
                               echo "<script>swal.fire({
                                  title: 'Order Made successfully!',
                                 text: 'thanks for your order.',
                                 icon: 'success',
                                 imageUrl: 'thumbs-up.jpg'
                                 });
                               </script>";
                             }
                             }
                              }
                              }
                            }
                          }
                        }
                       }
                     }

                 		

                 	

                 }
		     

		     }

             }

			

			
		}
	}
}

//adding recent view
function addRecentView(){
  global $conn;
      if(isset($_GET['id'])) {
      $id =$_GET['id'];
      $ip=get_ip();

      $checkexist="SELECT * FROM recent_view WHERE ip_address='$ip' AND modelid='$id'";
      $runcheck=mysqli_query($conn,$checkexist);
      $count=mysqli_num_rows($runcheck);

      if($count>0){

      }else{
     
       $getRecent="INSERT INTO recent_view(ip_address,modelid) VALUES('$ip','$id')";
      $rungetRecent=mysqli_query($conn,$getRecent);
    }

      
      
    }
  }



  function getRecentView(){
    global   $conn;
   $ip=get_ip();
    $getrecent="SELECT * FROM recent_view WHERE ip_address='$ip' ORDER BY id DESC limit 4";
    $run_recent=mysqli_query($conn,$getrecent);

    while ($row=mysqli_fetch_array($run_recent)) {
        $modelid=$row["modelid"];


        $getRecentModels="SELECT * FROM models WHERE id='$modelid' ";
        $run_getRecentModels=mysqli_query($conn,$getRecentModels);

        while ($row1=mysqli_fetch_array($run_getRecentModels)) {
        $id=$row1['id'];
        $brandId=$row1['brand_id'];
        $model_name=$row1['product_name'];
        $price=$row1['price'];
        $previous_price=$row1['previous_price'];
        $pic=$row1['product_pic'];
        $pic1=$row1['pic1'];
        $CPU=$row1['CPU'];
        $Rom=$row1['Rom'];
        $modelStatusId=$row1['modelStatus'];

        $modelStatus="SELECT * FROM modelstatus WHERE id='$modelStatusId'";
        $run_modelSatus=mysqli_query($conn,$modelStatus);

        while ($row=mysqli_fetch_array($run_modelSatus)) {
          $status=$row['name'];
          $color=$row['color'];
        }
        echo "<div class='col-md-3 col-sm-6'>
                  <div class='product-grid4'>
                  <div class='product-image4'>
                    <a href='#'>
                        <img style='width:200px;height:150px;' class='pic-1' src='$pic'>
                        <img style='width:240px;height:150px;' class='pic-2' src='$pic1'>
                    </a>
                    <ul class='social'>
                        <li><a href='itemView.php?id=$id' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                        
                    </ul>
                     <span class='product-new-label' style='font-size:8px;background-color:$color'>$status</span>
                  
                </div>
                <div class='product-content'>
                    <h3 style='font-weight: bolder;' class='title'><a href='#'>$model_name</a></h3>
                    <h5>$CPU-$Rom SSD</h5>
                    <div class='price'>
                        GH¢ $price
                        <span>GH¢ $previous_price</span>
                    </div>
                    <div class='snipcart-details agileinfo_single_right_details'>
              <form action='#' method='post'>
                <fieldset>
                  <input type='hidden' name='cmd' value='_cart' />
                  <input type='hidden' name='add' value='1' />
                  <input type='hidden' name='business' value=''  />
                  <input type='hidden' name='item_name' value='$model_name' />
                  <input type='hidden' name='amount' value='$price' />
                  <input type='hidden' name='discount_amount' value='0.00' />
                  <input type='hidden' name='currency_code' value='GH' />
                  <input type='hidden' name='return' value=''  />
                  <input type='hidden' name='cancel_return' value=''  />
                 
                </fieldset>
              </form>
            </div>
                </div>
            </div>


        </div>";




    
        }
    }
  }

// New Letters subscribtion
function getNews(){
  global  $conn;
  if(isset($_POST['newsubmit'])){

  $email=mysqli_escape_string($conn,$_POST['Email']);


  $findemail="SELECT * FROM newsletters WHERE email='$email' ";
   $run_findEmail=mysqli_query($conn,$findemail);
   $count=mysqli_num_rows($run_findEmail);

   if($count>0){
         echo "
     <script>swal.fire({
      title: ' Already Subcribed!',
      text: 'You have already subcribe to our newsletters. ',
      icon: 'info',
     imageUrl: 'thumbs-up.jpg'
      });
      </script>";
   }else{

  $insertEmail="INSERT INTO newsletters(email) VALUES('$email')";
  $run_insertEmail=mysqli_query($conn,$insertEmail);

  if($run_insertEmail){
     echo "
     <script>swal.fire({
      title: 'subscribtion Success!',
      text: 'You have subcribe to our newsletters. You will be receiving newsletters from us.',
      icon: 'success',
     imageUrl: 'thumbs-up.jpg'
      });
      </script>";
  }else{
     echo "
     <script>swal.fire({
      title: 'subscribtion Failled!',
      text: try again later.',
      icon: 'success',
     imageUrl: 'thumbs-up.jpg'
      });
      </script>";
  }

}

}
}