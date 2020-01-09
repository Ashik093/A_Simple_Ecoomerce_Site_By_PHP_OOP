<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

    class Brand{
      private $db;
      private $fm;
      public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
      }
      public function insertBrand($brandName){
          $brandName=$this->fm->validation($brandName);
          $brandName=mysqli_real_escape_string($this->db->link,$brandName);

          if(empty($brandName)){
            $msg="<span class='error'>Brand Name field must not empty</span>";
            return $msg;
          }else{
            $query="INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
            $insertBrand=$this->db->insert($query);
            if($insertBrand){
              $msg="<span class='success'>Brand Name inserted succesfully</span>";
              return $msg;
            }else{
              $msg="<span class='error'>Brand Name not inserted</span>";
              return $msg;
            }
          }
      }

      public function updateBrand($brandName,$id){
        $brandName=$this->fm->validation($brandName);

        $brandName=mysqli_real_escape_string($this->db->link,$brandName);
        if(empty($brandName)){
          $msg="<span class='error'>Brand Name field must not empty</span>";
          return $msg;
        }else{
          $query="UPDATE tbl_brand SET brandName='$brandName' WHERE brandID='$id'";
          $updateBrand=$this->db->update($query);
          if($updateBrand){
            $msg="<span class='success'>Brand Name updated succesfully</span>";
            return $msg;
          }else{
            $msg="<span class='error'>Brand Name not updated</span>";
            return $msg;
          }
        }

      }

      public function getAllBrand(){
        $query="SELECT * FROM tbl_brand ORDER BY brandID DESC";
        $result=$this->db->select($query);
        return $result;
      }

      public function getBrandById($id){
        $query="SELECT * FROM tbl_brand WHERE brandID='$id'";
        $result=$this->db->select($query);
        return $result;
      }

      public function deleteBrandById($id){
        $query="DELETE FROM tbl_brand WHERE brandID='$id'";
        $result=$this->db->delete($query);
        if($result){
          $msg="<span class='success'>Brand deleted succesfully</span>";
          return $msg;
        }else{
          $msg="<span class='error'>Brand not deleted</span>";
          return $msg;
        }
      }


    }

  ?>
