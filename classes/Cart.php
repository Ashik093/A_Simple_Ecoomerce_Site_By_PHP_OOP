<?php
  include_once 'lib/Database.php';
  include_once 'helpers/Format.php';

  class Cart{
    private $db;
    private $fm;
    public function __construct(){
      $this->db=new Database();
      $this->fm=new Format();
    }
    public function addToCart($quantity,$id){
      $quantity = $this->fm->validation($quantity);
      $id       = $this->fm->validation($id);
      $quantity = mysqli_real_escape_string($this->db->link,$quantity);
      $id       = mysqli_real_escape_string($this->db->link,$id);
      $sID      = session_id();

      $query       = "SELECT * FROM tbl_product WHERE productID='$id'";
      $result      = $this->db->select($query)->fetch_assoc();

      $productName = $result['productName'];
      $price       = $result['price'];
      $image       = $result['image'];

      $checkQuery  = "SELECT * FROM tbl_cart WHERE productID='$id' AND sID='$sID'";
      $checkResult = $this->db->select($checkQuery);
      if($checkResult){
        $msg = "Product Already Added !";
        return $msg;
      }else{
        $query="INSERT INTO tbl_cart(sID,productID,productName,price,quantity,image) VALUES('$sID','$id','$productName','$price','$quantity','$image')";
        $addCart=$this->db->insert($query);
        if($addCart){
          header('Location:cart.php');
        }else{
          header('Location:404.php');
        }
      }
    }

    public function getCart(){
      $sID    = session_id();
      $query  = "SELECT * FROM tbl_cart WHERE sID='$sID'";
      $result = $this->db->select($query);
      return $result;
    }

    public function updateCartQuantity($cartID,$quantity){
      $quantity = $this->fm->validation($quantity);
      $cartID   = $this->fm->validation($cartID);
      $quantity = mysqli_real_escape_string($this->db->link,$quantity);
      $cartID   = mysqli_real_escape_string($this->db->link,$cartID);

      $query = "UPDATE tbl_cart SET quantity='$quantity' WHERE cartID='$cartID'";
      $result = $this->db->update($query);
      if($result){
        $msg = "<span class='success'>Quantity Updated</span>";
        return $msg;
      }else{
        $msg = "<span class='error'>Quantity Not Updated</span>";
        return $msg;
      }
    }

    public function deleteCartProductById($id){
      $query  = "DELETE FROM tbl_cart WHERE cartID='$id'";
      $result = $this->db->delete($query);
      if($result){
        header("Location:cart.php");
      }else{
        $msg = "<span class='error'>Failed</span>";
        return $msg;
      }
    }

    public function getCartAmount(){
      $sID = session_id();
      $query = "SELECT price,quantity FROM tbl_cart WHERE sID='$sID'";
      $result = $this->db->select($query);
      return $result;
    }

    public function deleteCart(){
      $sID = session_id();
      $query = "DELETE FROM tbl_cart WHERE sID='$sID'";
      $this->db->delete($query);
    }

  }
 ?>
