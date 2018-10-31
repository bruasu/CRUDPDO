<?php
include_once 'Departamento.php';
include_once '../../app/model/Model.php';

class Controller extends Model{

public function incluir_departamento($numero,$nombre){
$obj = new Departamento();
$obj->dept_no=$numero;
$obj->dept_name=$nombre;

$conectar=$this->incluir($obj);
if ($conectar) {
  header('location:../../view/contenido/incluir.php?Exito');
}
}

}

?>
