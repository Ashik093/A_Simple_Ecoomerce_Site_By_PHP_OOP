<?php include('inc/header.php'); ?>
<?php
    if(!isset($_GET['catID']) || $_GET['catID']==NULL){
      echo "<script>window.loaction='404.php'</script>";
    }else{
      $id = $_GET['catID'];
    }
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
          <?php
            $getCatById = $category->getCategoryById($id);
            if($getCatById){
              while($result=$getCatById->fetch_assoc()){
           ?>
    		<h3>Latest from <?php echo $result['catName']; ?></h3>
      <?php } } ?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
          <?php
              $getProductByCatId = $product->getProductByCatId($id);
              if($getProductByCatId){
                while($data=$getProductByCatId->fetch_assoc()){
           ?>
           <div class="grid_1_of_4 images_1_of_4">
              <a href="details.php?productID=<?php echo $data['productID']; ?>"><img height="200px" src="admin/<?php echo $data['image']; ?>" alt="" /></a>
              <h2><?php echo $data['productName']; ?></h2>
              <p><?php echo $fm->textShorten($data['body'],60); ?></p>
              <p><span class="price">$<?php echo $data['price']; ?></span></p>
                <div class="button"><span><a href="details.php?productID=<?php echo $data['productID']; ?>" class="details">Details</a></span></div>
           </div>
      <?php } } ?>
			</div>



    </div>
 </div>
</div>
   <?php include('inc/footer.php'); ?>
