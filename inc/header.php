
<?php
    include 'lib/Session.php';
    Session::init();
    include('lib/Database.php');
    include('helpers/Format.php');

 ?>
 <?php
    spl_autoload_register(function($class){
      include_once('classes/'.$class.'.php');
    });

    $category = new Category();
    $product  = new Product();
    $cart     = new Cart();
    $user     = new User();
    $db       = new Database();
    $fm       = new Format();
  ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<style media="screen">
    .success{font-size: 18px;color: green;}
    .error{font-size: 18px;color: red;}
</style>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
              <span class="cart_title">Cart</span>
              <?php
                  $getCartAmount = $cart->getCartAmount();
                  if($getCartAmount){
                    $cartAmount = 0;
                    while($cartData = $getCartAmount->fetch_assoc()){
                      $cartAmount = $cartAmount + ($cartData['price']*$cartData['quantity']);
                    }
                ?>
                <span class="success"> $ <?php echo number_format((float)($cartAmount+($cartAmount*0.10)), 2, '.', ''); ?></span>
              <?php }else{
                ?>
                <span>(empty)</span>
              <?php } ?>
							</a>
						</div>
			      </div>
            <?php
                if(isset($_GET['userID'])){
                  $deleteCart = $cart->deleteCart();
                  Session::destroy();
                }
             ?>
		   <div class="login">
         <?php
              if(Session::get("userLogin")==true){
          ?>
          <a href="?userID=<?php echo Session::get("userID"); ?>">LogOut</a>
        <?php }else{
           ?>
           <a href="login.php">Login</a>
         <?php } ?>
       </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <li><a href="cart.php">Cart</a></li>
	  <?php
        $login = Session::get("userLogin");

        if ($login) {
     ?>
     <li><a href="profile.php">Profile</a></li>
   <?php } ?>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
