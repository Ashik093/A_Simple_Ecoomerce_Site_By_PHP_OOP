<?php include('inc/header.php'); ?>
<?php
    if(Session::get("userLogin")==false){
      header("Location:login.php");
    }
 ?>
<style media="screen">
  .notfound{}
  .notfound h2{font-size: 100px:line-height:100px}
  .notfound h2 span{font-size: 170px;display: bolck;color: red;}
</style>
 <div class="main">
    <div class="content">
    	<div class="order">
          This is order Page.
      </div>
    </div>
 </div>
</div>
  <?php include('inc/footer.php'); ?>
