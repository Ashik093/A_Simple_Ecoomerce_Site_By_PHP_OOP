<?php include('inc/header.php'); ?>
<?php
    if(Session::get("userLogin")==true){
      header("Location:order.php");
    }
 ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
      $userRegistration = $user->userRegistration($_POST);
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
      $userLogin = $user->userLogin($_POST);
    }
 ?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
          <?php
              if(isset($userLogin)){
                echo $userLogin;
              }
           ?>
        	<form action="" method="post">
                	<input name="userEmail" placeholder="Enter Your Email" type="text">
                    <input name="userPassword" placeholder="Enter Your Password" type="password">
                    <div class="buttons"><div><button name="login" type="submit" class="grey">Sign In</button></div></div>
                 </form>
        </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
        <?php
            if(isset($userRegistration)){
              echo $userRegistration;
            }
         ?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter your name">
							</div>

							<div>
							   <input type="text" name="city" placeholder="Enter your city">
							</div>

							<div>
								<input type="text" name="zip" placeholder="Zip-Code">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter your email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter your address">
						</div>
		    		<div>
              <input type="text" name="country" placeholder="Enter your country">
				    </div>

		           <div>
		               <input type="text" name="phone" placeholder="Enter your phone">
		          </div>

				  <div>
					<input type="text" name="password" placeholder="Enter your password">
				</div>
		    	</td>
		    </tr>
		    </tbody></table>
		   <div class="search"><div><button type="submit" name="register" class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include('inc/footer.php'); ?>
