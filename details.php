<?php include('inc/header.php'); ?>
<?php
    if (!isset($_GET['productID']) || $_GET['productID'] == NULL) {
        echo "<script>window.location='404.php'</script>";
    }else{
      $id=$_GET['productID'];
    }
 ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $quantity = $_POST['quantity'];
      $addCart  = $cart->addToCart($quantity,$id);
    }
 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
          <?php
              $getSingleProduct=$product->getSingleProduct($id);
              if($getSingleProduct){
                while($data=$getSingleProduct->fetch_assoc()){
           ?>
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $data['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $data['productName']; ?></h2>
					<div class="price">
						<p>Price: <span>$<?php echo $data['price']; ?></span></p>
						<p>Category: <span><?php echo $data['catName']; ?></span></p>
						<p>Brand:<span><?php echo $data['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>
				</div><br>
        <span style="color:red;margin-top:2px;">
          <?php
            if(isset($addCart)){
              echo $addCart;
            }
         ?>
       </span>
			</div>
			<div class="product-desc">
			     <h2>Product Details</h2>
			      <?php echo $data['body']; ?>
	    </div>
    <?php } } ?>

	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
            <?php
                $getAllCategory = $category->getAllCat();
                if($getAllCategory){
                  while($result = $getAllCategory->fetch_assoc()){
             ?>
				      <li><a href="productbycat.php?catID=<?php echo $result['catID']; ?>"><?php echo $result['catName']; ?></a></li>
            <?php } } ?>
    				</ul>

 				</div>
 		</div>
 	</div>
	</div>
   <?php include('inc/footer.php'); ?>
