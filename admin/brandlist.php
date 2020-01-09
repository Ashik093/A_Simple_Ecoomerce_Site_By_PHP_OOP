<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Brand.php';
    $brand=new Brand();
    if(isset($_GET['delId'])){
      $delId=$_GET['delId'];
      $delBrand=$brand->deleteBrandById($delId);
    }
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">
                  <?php
                      if(isset($delBrand)){
                        echo $delBrand;;
                      }
                   ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
          <tbody>
                <?php
                    $data=$brand->getAllBrand();
                    if($data){
                      $i=0;
                      while($row=$data->fetch_assoc()){
                        $i++;
                 ?>

      						<tr class="odd gradeX">
      							<td><?php echo $i; ?></td>
      							<td><?php echo $row['brandName']; ?></td>
      							<td><a href="editBrand.php?brandID=<?php echo $row['brandID']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="?delId=<?php echo $row['brandID']; ?>">Delete</a></td>
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
