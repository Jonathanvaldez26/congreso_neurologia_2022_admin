<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Encargado implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT e.catalogo_encargado_id, e.clave, e.nombre, e.apellido_paterno, apellido_materno, e.email, e.telefono, e.catalogo_empresa_id as status FROM catalogo_encargado e ORDER BY e.catalogo_encargado_id ASC;
      sql;
      return $mysqli->queryAll($query);
    }

    public static function insert($encargado){
	    $mysqli = Database::getInstance(1);
      $query=<<<sql
        INSERT INTO catalogo_encargado VALUES(:catalogo_encargado_id, :clave, :nombre, :apellido_paterno, :apellido_materno, :email, :telefono, 1)
sql;
        $parametros = array(
          ':catalogo_encargado_id'=>$encargado->_catalogo_encargado_id+1,
          ':clave'=>$encargado->_clave,
          'nombre'=>$encargado->_nombre,
          ':apellido_paterno'=>$encargado->_apellido_paterno,
          ':apellido_materno'=>$encargado->_apellido_materno,
          ':email'=>$encargado->_email,
          'telefono'=>$encargado->_telefono,
        );

        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($encargado){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE catalogo_encargado SET nombre = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, telefono = :telefono WHERE catalogo_encargado_id = :id
sql;
      $parametros = array(
        ':id'=>$encargado->_catalogo_encargado_id,
        ':nombre'=>$encargado->_nombre,
        ':apellido_paterno'=>$encargado->_apellido_paterno,
        ':apellido_materno'=>$encargado->_apellido_materno,
        ':telefono'=>$encargado->_telefono
      );
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $encargado->_catalogo_encargado_id;
      UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);
    }

    public static function delete($id){
      $mysqli = Database::getInstance();
      $select = <<<sql
      SELECT e.catalogo_encargado_id FROM catalogo_encargado e JOIN catalogo_colaboradores c
      ON e.catalogo_encargado_id = c.catalogo_encargado_id WHERE e.catalogo_encargado_id = $id
sql;

      $sqlSelect = $mysqli->queryAll($select);
      if(count($sqlSelect) >= 1){
        return array('seccion'=>2, 'id'=>$id); // NO elimina
      }else{
        $query = <<<sql
        UPDATE catalogo_encargado SET status = 2 WHERE catalogo_encargado.catalogo_encargado_id = $id;
sql;
        $mysqli->update($query);

        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;
        UtileriasLog::addAccion($accion);
        return array('seccion'=>1, 'id'=>$id); // Cambia el status a eliminado
      }
    }

    public static function verificarRelacion($id){
      $mysqli = Database::getInstance();
      $select = <<<sql
      SELECT e.catalogo_encargado_id FROM catalogo_encargado e JOIN catalogo_colaboradores c
      ON e.catalogo_encargado_id = c.catalogo_encargado_id WHERE e.catalogo_encargado_id = $id
sql;
      $sqlSelect = $mysqli->queryAll($select);
      if(count($sqlSelect) >= 1)
        return array('seccion'=>2, 'id'=>$id); // NO elimina
      else
        return array('seccion'=>1, 'id'=>$id); // Cambia el status a eliminado
      
    }

    public static function getById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ce.catalogo_encargado_id, ce.nombre, ce.apellido_paterno FROM catalogo_encargado AS ce WHERE catalogo_encargado_id = $id 
sql;
      return $mysqli->queryOne($query);
    }

    public static function getByIdReporte($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT e.catalogo_encargado_id, e.nombre, e.descripcion, e.status, s.nombre as status FROM catalogo_encargado e JOIN catalogo_status s ON s.catalogo_status_id = e.status WHERE e.status!=2 AND e.catalogo_encargado_id = $id
sql;

      return $mysqli->queryOne($query);
    }


    public static function getStatus(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_encargado
sql;
      return $mysqli->queryAll($query);
    }

    public static function getNombre($nombre_encargado){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM `catalogo_encargado` WHERE `nombre` LIKE '$nombre_encargado' 
sql;
      $dato = $mysqli->queryOne($query);
      return ($dato>=1) ? 1 : 2 ;
    }

    public static function getIdComparacion($id, $nombre){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM catalogo_encargado WHERE catalogo_encargado_id = '$id' AND nombre Like '$nombre' 
sql;
      $dato = $mysqli->queryOne($query);
      // 0

      if($dato>=1){
        return 1;
      }else{
        return 2;
      }
    }
}
