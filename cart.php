<?php include('inc/header.php'); ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $cartID    = $_POST['cartID'];
      $quantity  = $_POST['quantity'];
      if ($quantity <= 0) {
        $deleteCartProduct = $cart->deleteCartProductById($cartID);
      }else{
        $updateQuantity = $cart->updateCartQuantity($cartID,$quantity);
      }
    }
    if(isset($_GET['delID'])){
      $id = $_GET['delID'];
      $deleteCartProduct = $cart->deleteCartProductById($id);
    }
 ?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    	<h2>Your Cart</h2>
            <?php
                if(isset($updateQuantity)){
                  echo $updateQuantity;;
                }
                if (isset($deleteCartProduct)) {
                  echo $deleteCartProduct;
                }
             ?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
                <th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="5%">Action</th>
							</tr>
              <?php
                  $getCart = $cart->getCart();
                  if($getCart){
                    $i=0;
                    $sum=0;
                    while($data= $getCart->fetch_assoc()){
                      $i++;
               ?>
							<tr>
								<td><?php echo $i; ?></td>
                <td><?php echo $data['productName']; ?></td>
								<td><img src="admin/<?php echo $data['image']; ?>" alt=""/></td>
								<td>$ <?php echo $data['price']; ?></td>
								<td>
									<form action="" method="post">
                    <input type="hidden" name="cartID" value="<?php echo $data['cartID']; ?>"/>
										<input type="number" name="quantity" value="<?php echo $data['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$ <?php echo $data['quantity']*$data['price']; ?></td>
								<td><a onclick="return confirm('Are sure to delete?');" href="?delID=<?php echo $data['cartID']; ?>">X</a></td>
							</tr>
            <?php $sum = $sum + ($data['quantity']*$data['price']); } ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT(10%) : </th>
								<td>$ <?php echo $sum*0.1; ?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>$ <?php echo $sum+($sum*0.1); ?></td>
							</tr>
					   </table>
             <?php } ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include('inc/footer.php'); ?>
