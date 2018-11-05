<?php

class Model{

  protected function incluir($obj) {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=psdb', 'root', '');
        $connection->beginTransaction();
        $sql = "INSERT INTO departments (dept_no,dept_name) VALUES (:dept_no,:dept_name)";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->bindParam(":dept_no", $obj->dept_no);
        $preparedStatment->bindParam(":dept_name", $obj->dept_name);
        $executionResult = $preparedStatment->execute();
        $connection->commit();
        if ($executionResult == TRUE) {
            return TRUE;
        }
        throw new PDOException();
    } catch (PDOException $exc) {
        if ((isset($connection)) && ($connection->inTransaction())) {
            $connection->rollBack();
        }
        PRINT($exc->getMessage());
        return FALSE;
    } finally {
        if (isset($connection)) {
            unset($connection);
        }
    }
  }
  protected function listar() {
    $connection;
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=psdb', 'root', '');
        $connection->beginTransaction();
        $sql = "SELECT * FROM departments";
        $preparedStatment = $connection->prepare($sql);
        $preparedStatment->execute();
        $executionResult = $preparedStatment->fetchAll(PDO::FETCH_OBJ);
        $connection->commit();
        if ($executionResult == TRUE) {
            return $executionResult;
        }
        throw new PDOException();
    } catch (PDOException $exc) {
        if ((isset($connection)) && ($connection->inTransaction())) {
            $connection->rollBack();
        }
        PRINT($exc->getMessage());
        return FALSE;
    } finally {
        if (isset($connection)) {
            unset($connection);
        }
    }
  }
public function eliminar($no){
    $connection;
  try {
      $connection = new PDO('mysql:host=127.0.0.1;dbname=psdb', 'root', '');
      $connection->beginTransaction();

      $sql = "DELETE FROM departments WHERE dept_no = :dept_no";

      $preparedStatment = $connection->prepare($sql);
      $preparedStatment->bindParam(":dept_no", $no);

      $executionResult = $preparedStatment->execute();
      $connection->commit();

  } catch (PDOException $exc) {
      if ((isset($connection)) && ($connection->inTransaction())) {
          $connection->rollBack();
      }
      print $exc->getMessage();
  } finally {
       if (isset($connection)) {
          unset($connection);
      }
    }
}
public function editar($no,$name){
    $connection;
  try {
      $connection = new PDO('mysql:host=127.0.0.1;dbname=psdb', 'root', '');
      $connection->beginTransaction();

      $sql = "UPDATE departments SET dept_name = :dept_name WHERE dept_no = :dept_no";

      $preparedStatment = $connection->prepare($sql);
      $preparedStatment->bindParam(":dept_no", $no);
      $preparedStatment->bindParam(":dept_name",$name );

      $executionResult = $preparedStatment->execute();
      $connection->commit();

  } catch (PDOException $exc) {
      if ((isset($connection)) && ($connection->inTransaction())) {
          $connection->rollBack();
      }
      print $exc->getMessage();
  } finally {
       if (isset($connection)) {
          unset($connection);
      }
  }
}


}

?>
