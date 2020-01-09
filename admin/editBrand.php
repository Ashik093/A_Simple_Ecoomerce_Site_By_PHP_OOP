<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    include '../classes/Brand.php';

    if (!isset($_GET['brandID']) || $_GET['brandID']==NULL) {
      echo "<script>window.location='brandlist.php'</script>";
    }else{
        $id=$_GET['brandID'];
    }

    $brand=new Brand();

    if($_SERVER['REQUEST_METHOD']=='POST'){
      $brandName=$_POST['brandName'];
      $updateBrand=$brand->updateBrand($brandName,$id);
    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock">
                 <?php
                    if(isset($updateBrand)){
                      echo $updateBrand;
                    }
                  ?>
                 <?php
                      $getBrandById=$brand->getBrandById($id);
                      if($getBrandById){
                        while($row=$getBrandById->fetch_assoc()){
                  ?>
                            <form action="" method="POST">
                               <table class="form">
                                   <tr>
                                       <td>
                                           <input type="text" value="<?php echo $row['brandName']; ?>" name="brandName" class="medium" />
                                       </td>
                                   </tr>
           						            <tr>
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
<?php include 'inc/footer.php';?>
