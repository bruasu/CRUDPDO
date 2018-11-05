<?php include_once '../estructura/header.php';
      include_once '../../app/controller/Controller.php';
      if (isset($_POST['Enviar'])) {
        $conectar=new Controller();
        $resultado=$conectar->editar($_POST['numero'],$_POST['nombre']);
        header('location:index.php');
      }

?>


<form action="" method="post" class="card p-2 mt-2">
 <div class="form-group">
   <label>Numero:</label>
   <input type="namber" class="form-control" name="numero" value="<?php echo $_GET['editar']; ?>" required>
 </div>
 <div class="form-group">
   <label for="pwd">Nombre</label>
   <input type="text" class="form-control" name="nombre" value="<?php echo $_GET['nombre']; ?>" required>
 </div>
 <button type="submit" class="btn btn-primary" name="Enviar">Enviar</button>
</form>


<?php include_once '../estructura/footer.php' ?>
