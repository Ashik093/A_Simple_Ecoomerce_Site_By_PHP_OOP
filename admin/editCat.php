<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    include '../classes/Category.php';

    if (!isset($_GET['catID']) || $_GET['catID']==NULL) {
      echo "<script>window.location='catlist.php'</script>";
    }else{
        $id=$_GET['catID'];
    }

    $cat=new Category();

    if($_SERVER['REQUEST_METHOD']=='POST'){
      $catName=$_POST['catName'];
      $updateCat=$cat->updateCat($catName,$id);
    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">
                 <?php
                    if(isset($updateCat)){
                      echo $updateCat;
                    }
                  ?>
                 <?php
                      $getCatById=$cat->getCategoryById($id);
                      if($getCatById){
                        while($row=$getCatById->fetch_assoc()){
                  ?>
                            <form action="" method="POST">
                               <table class="form">
                                   <tr>
                                       <td>
                                           <input type="text" value="<?php echo $row['catName']; ?>" name="catName" class="medium" />
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
