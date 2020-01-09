<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/Category.php';
    $cat=new Category();
    if(isset($_GET['delId'])){
      $delId=$_GET['delId'];
      $delCat=$cat->deleteCatById($delId);
    }
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                  <?php
                      if(isset($delCat)){
                        echo $delCat;;
                      }
                   ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
          <tbody>
                <?php
                    $data=$cat->getAllCat();
                    if($data){
                      $i=0;
                      while($row=$data->fetch_assoc()){
                        $i++;
                 ?>

      						<tr class="odd gradeX">
      							<td><?php echo $i; ?></td>
      							<td><?php echo $row['catName']; ?></td>
      							<td><a href="editCat.php?catID=<?php echo $row['catID']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="?delId=<?php echo $row['catID']; ?>">Delete</a></td>
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
