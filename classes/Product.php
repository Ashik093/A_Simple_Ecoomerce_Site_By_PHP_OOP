<?php
    $filePath=realpath(dirname(__FILE__));
    include_once($filePath.'/../lib/Database.php');
    include_once($filePath.'/../helpers/Format.php');

    class Product{
      private $db;
      private $fm;

      public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
      }

      public function insertProduct($data,$file){
        $productName = $this->fm->validation($data['productName']);
        $catID       = $this->fm->validation($data['catID']);
        $BrandID     = $this->fm->validation($data['BrandID']);
        $price       = $this->fm->validation($data['price']);
        $type        = $this->fm->validation($data['type']);

        $productName = mysqli_real_escape_string($this->db->link,$productName);
        $catID       = mysqli_real_escape_string($this->db->link,$catID);
        $BrandID     = mysqli_real_escape_string($this->db->link,$BrandID);
        $body        = mysqli_real_escape_string($this->db->link,$data['body']);
        $price       = mysqli_real_escape_string($this->db->link,$price);
        $type        = mysqli_real_escape_string($this->db->link,$type);

        $permited    = array('jpg','jpeg','png','gif');
        $file_name   = $file['image']['name'];
        $file_size   = $file['image']['size'];
        $file_temp   = $file['image']['tmp_name'];

        $div         = explode('.',$file_name);
        $file_ext    = strtolower(end($div));
        $unique_file = substr(md5(time()),0,10).'.'.$file_ext;
        $uploads     = "uploads/".$unique_file;

        if($productName =='' || $catID =='' || $BrandID=='' || $body=='' || $price=='' || $file_name=='' || $type==''){
          $msg = "<span class='error'>Filed Must not be empty !</span>";
          return $msg;
        }elseif($file_size > 1048567){
          $msg = "<span class='error'>Your file size is greater than 1MB!</span>";
          return $msg;
        }elseif(in_array($file_ext,$permited)===false){
          $msg = "<span class='error'>You can only upload:-".imploid(',',$permited)."</span>";
          return $msg;
        }else{
          move_uploaded_file($file_temp,$uploads);
          $query="INSERT INTO tbl_product(productName,catID,brandID,body,price,image,type) VALUES('$productName','$catID','$BrandID','$body','$price','$uploads','$type')";
          $insertProduct=$this->db->insert($query);
          if($insertProduct){
            $msg = "<span class='success'>Product Inserted Successfully</span>";
            return $msg;
          }else{
            $msg = "<span class='error'>Product not inserted</span>";
            return $msg;
          }
        }
      }


      public function updateProduct($data,$file,$id){
        $productName = $this->fm->validation($data['productName']);
        $catID       = $this->fm->validation($data['catID']);
        $BrandID     = $this->fm->validation($data['BrandID']);
        $price       = $this->fm->validation($data['price']);
        $type        = $this->fm->validation($data['type']);

        $productName = mysqli_real_escape_string($this->db->link,$productName);
        $catID       = mysqli_real_escape_string($this->db->link,$catID);
        $BrandID     = mysqli_real_escape_string($this->db->link,$BrandID);
        $body        = mysqli_real_escape_string($this->db->link,$data['body']);
        $price       = mysqli_real_escape_string($this->db->link,$price);
        $type        = mysqli_real_escape_string($this->db->link,$type);

        $permited    = array('jpg','jpeg','png','gif');
        $file_name   = $file['image']['name'];
        $file_size   = $file['image']['size'];
        $file_temp   = $file['image']['tmp_name'];

        $div         = explode('.',$file_name);
        $file_ext    = strtolower(end($div));
        $unique_file = substr(md5(time()),0,10).'.'.$file_ext;
        $uploads     = "uploads/".$unique_file;

        if($productName =='' || $catID =='' || $BrandID=='' || $body=='' || $price=='' || $type==''){
          $msg = "<span class='error'>Filed Must not be empty !</span>";
          return $msg;
        }else{
          if(!empty($file_name)){
            if($file_size > 1048567){
              $msg = "<span class='error'>Your file size is greater than 1MB!</span>";
              return $msg;
            }elseif(in_array($file_ext,$permited)===false){
              $msg = "<span class='error'>You can only upload:-".imploid(',',$permited)."</span>";
              return $msg;
            }else{

              $getLink=$this->getProductById($id);
              if($getLink){
                while($img=$getLink->fetch_assoc()){
                  $imglink=$img['image'];
                }
              }

              move_uploaded_file($file_temp,$uploads);
              $query="UPDATE tbl_product
                      SET
                      productName = '$productName',
                      catID       = '$catID',
                      brandID     = '$BrandID',
                      body        = '$body',
                      price       = '$price',
                      image       = '$uploads',
                      type        = '$type'
                      WHERE productID = '$id'";
              $updateProduct=$this->db->update($query);
              if($updateProduct){
                unlink($imglink);
                $msg = "<span class='success'>Product Updated Successfully</span>";
                return $msg;
              }else{
                $msg = "<span class='error'>Product not Updated</span>";
                return $msg;
              }
          }
        }else{
          $query="UPDATE tbl_product
                  SET
                  productName = '$productName',
                  catID       = '$catID',
                  brandID     = '$BrandID',
                  body        = '$body',
                  price       = '$price',
                  type        = '$type'
                  WHERE productID = '$id'";
          $updateProduct=$this->db->update($query);
          if($updateProduct){
            $msg = "<span class='success'>Product Updated Successfully</span>";
            return $msg;
          }else{
            $msg = "<span class='error'>Product not Updated</span>";
            return $msg;
          }
        }
      }
    }

      public function getAllProduct(){
        /*$query  = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
                   FROM tbl_product
                   INNER JOIN tbl_category ON tbl_product.catID=tbl_category.catID
                   INNER JOIN tbl_brand ON tbl_product.brandID=tbl_brand.brandID
                   ORDER BY productID DESC";*/
        $query  = "SELECT p.*,c.catName,b.brandName
                   FROM tbl_product as p,tbl_category as c,tbl_brand as b
                   WHERE p.catID=c.catID AND p.brandID=b.brandID
                   ORDER BY productID DESC";
        $result = $this->db->select($query);
        return $result;
      }

      public function getProductById($id){
        $query = "SELECT * FROM tbl_product WHERE productID='$id'";
        $result=$this->db->select($query);
        return $result;
      }

      public function deleteProductById($id){
          $getLink=$this->getProductById($id);
          if($getLink){
            while($data=$getLink->fetch_assoc()){
              $imglink = $data['image'];
            }
          }

          $query="DELETE FROM tbl_product WHERE productID='$id'";
          $result=$this->db->delete($query);
          if($result){
            unlink($imglink);
            $msg="<span class='success'>Product deleted succesfully</span>";
            return $msg;
          }else{
            $msg="<span class='error'>Product not deleted</span>";
            return $msg;
          }

      }

      public function getFeaturedProduct(){
        $query  = "SELECT * FROM tbl_product WHERE type = '0' ORDER BY productID DESC";
        $result = $this->db->select($query);
        return $result;
      }
      public function getNewProduct(){
        $query  = "SELECT * FROM tbl_product ORDER BY productID DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
      }

      public function getSingleProduct($id){
        $query  = "SELECT p.*,c.catName,b.brandName
                   FROM tbl_product as p,tbl_category as c,tbl_brand as b
                   WHERE p.catID=c.catID AND p.brandID=b.brandID AND p.productID='$id'";
        $result = $this->db->select($query);
        return $result;
      }

      public function getProductByCatId($id){
        $query = "SELECT * FROM tbl_product WHERE catID='$id'";
        $result=$this->db->select($query);
        return $result;
      }

    }
?>
