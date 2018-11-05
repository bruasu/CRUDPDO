<?php include_once '../estructura/header.php';
include_once '../../app/controller/Controller.php';
$conectar= new Controller();
$resultado=$conectar->listar_departamentos();

if (isset($_GET['eliminar'])) {
  $eliminar=$conectar->eliminar($_GET['eliminar']);
  header('location:index.php');
}
?>

<table class="table col-6 mt-2">
  <thead>
    <tr>
      <th>Numero</th>
      <th>Nombre</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <?php echo $resultado; ?>
</table>
<a ></a>

<?php include_once '../estructura/footer.php' ?>
