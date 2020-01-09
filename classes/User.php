<?php
  include_once 'lib/Database.php';
  include_once 'helpers/Format.php';

  class User{
    private $db;
    private $fm;
    public function __construct(){
      $this->db=new Database();
      $this->fm=new Format();
    }
    public function userRegistration($data){
      $name        = $this->fm->validation($data['name']);
      $city        = $this->fm->validation($data['city']);
      $zip         = $this->fm->validation($data['zip']);
      $email       = $this->fm->validation($data['email']);
      $address     = $this->fm->validation($data['address']);
      $country     = $this->fm->validation($data['country']);
      $phone       = $this->fm->validation($data['phone']);
      $password    = $this->fm->validation($data['password']);

      $name        = mysqli_real_escape_string($this->db->link,$name);
      $city        = mysqli_real_escape_string($this->db->link,$city);
      $zip         = mysqli_real_escape_string($this->db->link,$zip);
      $email       = mysqli_real_escape_string($this->db->link,$email);
      $address     = mysqli_real_escape_string($this->db->link,$address);
      $country     = mysqli_real_escape_string($this->db->link,$country);
      $phone       = mysqli_real_escape_string($this->db->link,$phone);
      $password    = mysqli_real_escape_string($this->db->link,$password);
      $password    = md5($password);

      if($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == ""){
        $msg = "<span class='error'>Field Must Not Be Empty !</span>";
        return $msg;
      }
      $checkDuplicateEmail = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
      $output = $this->db->select($checkDuplicateEmail);
      if($output){
        $msg="<span class='error'>Email Already Exist</span>";
        return $msg;
      }else{
        $query = "INSERT INTO tbl_user(name,city,zip,email,address,country,phone,password) VALUES('$name','$city','$zip','$email','$address','$country','$phone','$password')";
        $result = $this->db->insert($query);
        if($query){
          $msg = "<span class='success'>Registration Successfully Done !</span>";
          return $msg;
        }else{
          $msg = "<span class='error'>Registration Failed</span>";
          return $msg;
        }
      }
    }

    public function userLogin($data){
      $userEmail    = $this->fm->validation($data['userEmail']);
      $userPassword = $this->fm->validation($data['userPassword']);

      $userEmail    = mysqli_real_escape_string($this->db->link,$userEmail);
      $userPassword = mysqli_real_escape_string($this->db->link,$userPassword);

      if(empty($userEmail) || empty($userPassword)){
        $msg = "<span class='error'>Field Must Not Be Empty !</span>";
        return $msg;
      }
      $userPassword = md5($userPassword);
      $query        = "SELECT * FROM tbl_user WHERE email='$userEmail' AND password='$userPassword'";
      $result       = $this->db->select($query);
      if($result){
        $data = $result->fetch_assoc();
        Session::set("userLogin",true);
        Session::set("userEmail",$data['email']);
        Session::set("userID",$data['userID']);
        Session::set("userName",$data['name']);
        header("Location:order.php");
      }else{
        $msg = "<span class='error'>Email or Password Does not Match!!!</span>";
        return $msg;
      }
    }
    public function getUserData($id){
      $query = "SELECT * FROM tbl_user WHERE userID='$id'";
      $result = $this->db->select($query);
      return $result;
    }
  }
 ?>
