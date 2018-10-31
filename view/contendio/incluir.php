<?php include_once '../estructura/header.php'
      include_once '../../app/controller/Controller.php';
      if (isset($_POST['Enviar'])) {
        $conectar=new Controller();
      }

?>


<form action="" method="post" class="card p-2">
 <div class="form-group">
   <label>Numero:</label>
   <input type="namber" class="form-control" name="numero" >
 </div>
 <div class="form-group">
   <label for="pwd">Nombre</label>
   <input type="text" class="form-control" name="nombre">
 </div>
 <button type="submit" class="btn btn-primary" name="Enviar">Enviar</button>
</form>


<?php include_once '../estructura/footer.php' ?>
