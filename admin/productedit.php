<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
  if(!isset($_GET['productID']) && $_GET['productID']==NULL){
    echo "<script>window.location='productlist.php'</script>";
  }else{
    $productID=$_GET['productID'];
  }

  spl_autoload_register(function ($class_name) {
      include '../classes/'.$class_name . '.php';
  });

  $product=new Product();
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $updateProduct=$product->updateProduct($_POST,$_FILES,$productID);
  }

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <?php
            if (isset($updateProduct)) {
              echo $updateProduct;
            }
         ?>
        <div class="block">
          <?php
              $getProductById=$product->getProductById($productID);
              if(isset($getProductById)){
                while($data=$getProductById->fetch_assoc()){
           ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">

                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $data['productName']; ?>" name="productName" class="medium" />
                    </td>
                </tr>
				        <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catID">
                            <option>Select Category</option>
                            <?php
                                  $cat=new Category();
                                  $getAllCat=$cat->getAllCat();
                                  if($getAllCat){
                                    while($row=$getAllCat->fetch_assoc()){
                             ?>
                            <option
                              <?php if($row['catID']==$data['catID']){
                                ?>
                                selected="selected"
                                <?php
                                    }
                                 ?>
                              value="<?php echo $row['catID']; ?>"
                            >
                                <?php echo $row['catName']; ?>
                            </option>
                            <?php
                                }
                              }
                             ?>
                        </select>
                    </td>
                </tr>
				        <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="BrandID">
                            <option>Select Brand</option>
                            <?php
                                  $brand=new Brand();
                                  $getAllBrand=$brand->getAllBrand();
                                  if($getAllBrand){
                                    while($row=$getAllBrand->fetch_assoc()){
                             ?>
                            <option
                                <?php if($row['brandID']==$data['brandID']){
                                  ?>
                                  selected="selected"
                                <?php } ?>
                                value="<?php echo $row['brandID']; ?>"
                             >
                                <?php echo $row['brandName']; ?>
                            </option>
                            <?php
                                }
                              }
                             ?>
                        </select>
                    </td>
                </tr>

				         <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"><?php echo $data['body']; ?></textarea>
                    </td>
                </tr>
			        	<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $data['price']; ?>" name="price" class="medium" />
                    </td>
                </tr>

                <tr>

                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                      <img height="80px" width="120px" src="<?php echo $data['image']; ?>" alt=""><br>
                        <input type="file" name="image" />
                    </td>
                </tr>

				        <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                                if($data['type']==0){
                            ?>
                            <option selected="selected" value="0">Featured</option>
                            <option value="1">General</option>
                            <?php
                              }else{
                            ?>
                            <option value="0">Featured</option>
                            <option selected="selected" value="1">General</option>
                            <?php
                              }
                             ?>
                        </select>
                    </td>
                </tr>

				         <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
          <?php

                }
              }
           ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
