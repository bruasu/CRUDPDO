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


}

?>
