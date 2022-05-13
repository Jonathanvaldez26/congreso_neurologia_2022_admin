<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class OrdenPago implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT e.catalogo_orden_pago_id, e.clave_evento, e.nombre_ejecutivo, e.fecha FROM catalogo_orden_pago e ORDER BY e.catalogo_orden_pago_id ASC;
      sql;
      return $mysqli->queryAll($query);
    }

    public static function insert($orden_pago){
	    $mysqli = Database::getInstance(1);
      $query=<<<sql
        INSERT INTO catalogo_orden_pago VALUES(:catalogo_orden_pago_id, :clave, :nombre, :apellido_paterno, :apellido_materno, :email, :telefono, 1)
sql;
        $parametros = array(
          ':catalogo_orden_pago_id'=>$orden_pago->_catalogo_orden_pago_id+1,
          ':clave'=>$orden_pago->_clave,
          'nombre'=>$orden_pago->_nombre,
          ':apellido_paterno'=>$orden_pago->_apellido_paterno,
          ':apellido_materno'=>$orden_pago->_apellido_materno,
          ':email'=>$orden_pago->_email,
          'telefono'=>$orden_pago->_telefono,
        );

        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($orden_pago){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE catalogo_orden_pago SET nombre = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, telefono = :telefono WHERE catalogo_orden_pago_id = :id
sql;
      $parametros = array(
        ':id'=>$orden_pago->_catalogo_orden_pago_id,
        ':nombre'=>$orden_pago->_nombre,
        ':apellido_paterno'=>$orden_pago->_apellido_paterno,
        ':apellido_materno'=>$orden_pago->_apellido_materno,
        ':telefono'=>$orden_pago->_telefono
      );
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $orden_pago->_catalogo_orden_pago_id;
      UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);
    }

    public static function delete($id){
      $mysqli = Database::getInstance();
      $select = <<<sql
      SELECT e.catalogo_orden_pago_id FROM catalogo_orden_pago e JOIN catalogo_colaboradores c
      ON e.catalogo_orden_pago_id = c.catalogo_orden_pago_id WHERE e.catalogo_orden_pago_id = $id
sql;

      $sqlSelect = $mysqli->queryAll($select);
      if(count($sqlSelect) >= 1){
        return array('seccion'=>2, 'id'=>$id); // NO elimina
      }else{
        $query = <<<sql
        UPDATE catalogo_orden_pago SET status = 2 WHERE catalogo_orden_pago.catalogo_orden_pago_id = $id;
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
      SELECT e.catalogo_orden_pago_id FROM catalogo_orden_pago e JOIN catalogo_colaboradores c
      ON e.catalogo_orden_pago_id = c.catalogo_orden_pago_id WHERE e.catalogo_orden_pago_id = $id
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
      SELECT ce.catalogo_orden_pago_id, ce.nombre, ce.apellido_paterno FROM catalogo_orden_pago AS ce WHERE catalogo_orden_pago_id = $id 
sql;
      return $mysqli->queryOne($query);
    }

    public static function getByIdReporte($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT e.catalogo_orden_pago_id, e.nombre, e.descripcion, e.status, s.nombre as status FROM catalogo_orden_pago e JOIN catalogo_status s ON s.catalogo_status_id = e.status WHERE e.status!=2 AND e.catalogo_orden_pago_id = $id
sql;

      return $mysqli->queryOne($query);
    }


    public static function getStatus(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_orden_pago
sql;
      return $mysqli->queryAll($query);
    }

    public static function getNombre($nombre_orden_pago){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM `catalogo_orden_pago` WHERE `nombre` LIKE '$nombre_orden_pago' 
sql;
      $dato = $mysqli->queryOne($query);
      return ($dato>=1) ? 1 : 2 ;
    }

    public static function getIdComparacion($id, $nombre){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM catalogo_orden_pago WHERE catalogo_orden_pago_id = '$id' AND nombre Like '$nombre' 
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
