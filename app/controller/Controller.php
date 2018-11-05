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
public function listar_departamentos(){
  $resultado=$this->listar();
  $lista='<tbody>';
  foreach ($resultado as $key => $value) {
    $lista.="
    <tr>
      <td>$value->dept_no</td>
      <td>$value->dept_name</td>
      <td><a href='editar.php?editar=$value->dept_no&nombre=$value->dept_name'>Editar</a></td>
      <td><a href='index.php?eliminar=$value->dept_no'>Eliminar</a></td>
    </tr>
    ";
  }
  $lista.='</tbody>';
  return $lista;
}

}

?>
