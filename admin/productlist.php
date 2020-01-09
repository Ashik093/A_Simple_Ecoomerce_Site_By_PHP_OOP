<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include_once('../helpers/Format.php');
    include_once('../classes/Product.php');

    $product = new Product();
    $format  = new Format();

    if(isset($_GET['delID'])){
      $delId=$_GET['delID'];
      $deleteProduct=$product->deleteProductById($delId);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <?php
            if(isset($deleteProduct)){
              echo $deleteProduct;
            }
         ?>
        <div class="block">
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
        <?php
            $getAllProduct=$product->getAllProduct();
            if($getAllProduct){
              $i=0;
              while($row=$getAllProduct->fetch_assoc()){
                $i++;
         ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $row['productName']; ?></td>
					<td><?php echo $row['catName']; ?></td>
					<td><?php echo $row['brandName']; ?></td>
					<td><?php echo $format->textShorten($row['body'],50); ?></td>
					<td>$<?php echo $row['price']; ?></td>
					<td><img height="30px" width="40px" src="<?php echo $row['image']; ?>" alt=""></td>
					<td>
            <?php
                if($row['type']==0){
                  echo "Featured";
                }else{
                  echo "General";
                }
            ?>
        </td>
					<td><a href="productedit.php?productID=<?php echo $row['productID']; ?>">Edit</a> || <a onclick="return confirm('Are sure to delete ?')" href="?delID=<?php echo $row['productID']; ?>">Delete</a></td>
				</tr>
        <?php
              }
            }
         ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
