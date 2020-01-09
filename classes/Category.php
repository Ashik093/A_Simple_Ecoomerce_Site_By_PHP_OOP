<?php
    $filePath=realpath(dirname(__FILE__));
    include_once($filePath.'/../lib/Database.php');
    include_once($filePath.'/../helpers/Format.php');

    class Category{
      private $db;
      private $fm;
      public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
      }
      public function insertCat($catName){
          $catName=$this->fm->validation($catName);
          $catName=mysqli_real_escape_string($this->db->link,$catName);

          if(empty($catName)){
            $msg="<span class='error'>Category field must not empty</span>";
            return $msg;
          }else{
            $query="INSERT INTO tbl_category(catName) VALUES('$catName')";
            $insertCat=$this->db->insert($query);
            if($insertCat){
              $msg="<span class='success'>Category inserted succesfully</span>";
              return $msg;
            }else{
              $msg="<span class='error'>Category not inserted</span>";
              return $msg;
            }
          }
      }

      public function updateCat($catName,$id){
        $catName=$this->fm->validation($catName);

        $catName=mysqli_real_escape_string($this->db->link,$catName);
        if(empty($catName)){
          $msg="<span class='error'>Category field must not empty</span>";
          return $msg;
        }else{
          $query="UPDATE tbl_category SET catName='$catName' WHERE catID='$id'";
          $updateCat=$this->db->update($query);
          if($updateCat){
            $msg="<span class='success'>Category updated succesfully</span>";
            return $msg;
          }else{
            $msg="<span class='error'>Category not updated</span>";
            return $msg;
          }
        }

      }

      public function getAllCat(){
        $query="SELECT * FROM tbl_category ORDER BY catID DESC";
        $result=$this->db->select($query);
        return $result;
      }

      public function getCategoryById($id){
        $query="SELECT * FROM tbl_category WHERE catID='$id'";
        $result=$this->db->select($query);
        return $result;
      }

      public function deleteCatById($id){
        $query="DELETE FROM tbl_category WHERE catID='$id'";
        $result=$this->db->delete($query);
        if($result){
          $msg="<span class='success'>Category deleted succesfully</span>";
          return $msg;
        }else{
          $msg="<span class='error'>Category not deleted</span>";
          return $msg;
        }
      }


    }

  ?>
