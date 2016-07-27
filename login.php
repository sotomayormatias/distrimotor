<?php 
  include "includes/header.php";
?>
<h1>Ingresar</h1>
<div class="col-xs-4 center">

  <?php  
    if (isset($_GET['error'])){
      $error = $_GET['error'];
      switch ($error) {
        case 1:
      ?>  
        <div class="alert alert-danger" role="alert">Usuario y/o Clave Incorrectos</div>
      <?php   
        break;
        case 2:
      ?>
        <div class="alert alert-danger" role="alert">Debe loguearse</div>
      <?php
        break;
      }
    }
  ?>

  <form action="procesaLogin.php" method="POST">
      <div class="form-group">
          <label for="exampleInputEmail1">Nick</label>
          <input type="text" class="form-control" name="usu_nick" placeholder="Nick">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="usu_clave" placeholder="Password">
      </div>  
      <button type="submit" class="btn btn-primary">Ingresar</button>
  </form>
</div>

<?php 
  include "includes/footer.php";
?>