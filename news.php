<?php
   


?>
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input style="background-color: #fff; color: #fff" type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"  required>
					<input style="background-color: black;  color: #fff" type="submit" name='newsubmit' value="subscribe now">


					<?php
                       getNews();
					?>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->