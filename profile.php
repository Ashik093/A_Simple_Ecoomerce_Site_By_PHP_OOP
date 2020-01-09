<?php include('inc/header.php'); ?>
<?php
    if(Session::get("userLogin")==false){
      header("Location:login.php");
    }
 ?>
<style media="screen">
  .tblone{width: 550px;margin:0 auto;border: 1px solid;}
  .tblone tr td{text-align: justify;}
</style>
 <div class="main">
    <div class="content">
      <?php
          $id = Session::get("userID");
          $getUserData = $user->getUserData($id);
          if($getUserData){
            while($data=$getUserData->fetch_assoc()){
       ?>
    	<table class="tblone">
        <tr>
          <td width="20%">Name</td>
          <td width="5%">:</td>
          <td><?php echo $data['name']; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td>:</td>
          <td><?php echo $data['phone']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td>:</td>
          <td><?php echo $data['address']; ?></td>
        </tr>
        <tr>
          <td>City</td>
          <td>:</td>
          <td><?php echo $data['city']; ?></td>
        </tr>
        <tr>
          <td>Zip Code</td>
          <td>:</td>
          <td><?php echo $data['zip']; ?></td>
        </tr>
        <tr>
          <td>Country</td>
          <td>:</td>
          <td><?php echo $data['country']; ?></td>
        </tr>
      </table>
    <?php } } ?>
    </div>
 </div>
</div>
  <?php include('inc/footer.php'); ?>
