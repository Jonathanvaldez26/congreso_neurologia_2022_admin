<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Cursos implements Crud{

    public static function getAll(){       
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT c.*, m.nombre as nombre_modalidad
      FROM cursos c
      INNER JOIN modalidad m ON (c.id_modalidad = m.id_modalidad)
sql;
      return $mysqli->queryAll($query);
      
    }

    public static function getAllModalidad(){       
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM modalidad      
sql;
      return $mysqli->queryAll($query);
      
    }

    public static function getPais(){       
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM paises
sql;
      return $mysqli->queryAll($query);
    }



    public static function getStateByCountry($id_pais){
      $mysqli = Database::getInstance(true);
      $query =<<<sql
      SELECT * FROM estados where id_pais = '$id_pais'
sql;
    
      return $mysqli->queryAll($query);
    }
    public static function getById($id){
        
    }
    public static function insert($data){
      $mysqli = Database::getInstance(1);
      $query=<<<sql
      INSERT INTO cursos(clave,nombre, fecha_curso,horario_transmision, descripcion, pdf_constancia, id_modalidad, caratula, url, duracion)
      VALUES(:clave,:nombre, :fecha_curso,:horario_transmision, :descripcion, :pdf_constancia, :id_modalidad, :caratula, :url, :duracion);
sql;

          $parametros = array(
          ':clave' => $data->_clave,
          ':nombre'=>$data->_nombre,
          ':fecha_curso'=>$data->_fecha_curso,
          ':horario_transmision'=>$data->_horario_transmision,
          ':descripcion'=>$data->_descripcion,
          ':pdf_constancia'=>$data->_pdf_constancia,
          ':id_modalidad'=>$data->_id_modalidad,
          ':caratula'=>$data->_caratula,
          ':url'=>$data->_url,
          ':duracion'=>$data->_duracion,

          );
          $id = $mysqli->insert($query,$parametros);
          return $id;
        
    }

    public static function getUserRegister($email){
      $mysqli = Database::getInstance(true);
      $query =<<<sql
      SELECT * FROM registrados WHERE email = '$email'
sql;

      return $mysqli->queryAll($query);
  }
    public static function update($data){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE cursos SET nombre = :nombre, fecha_curso = :fecha_curso, horario_transmision = :horario_transmision, id_modalidad = :id_modalidad, url = :url_curso, duracion = :duracion, descripcion= :descripcion WHERE id_curso = :id_curso
sql;

    
      $parametros = array(
        ':nombre'=>$data->_nombre,
        ':fecha_curso'=>$data->_fecha_curso,
        ':horario_transmision'=>$data->_horario_transmision,
        ':id_modalidad'=>$data->_id_modalidad,
        ':url_curso'=>$data->_url_curso,
        ':duracion'=>$data->_duracion,
        ':descripcion' =>$data->_descripcion,
        ':id_curso' => $data->_id_curso
      );

      // var_dump($parametros);
      // var_dump($query);
      // exit;
        // $accion = new \stdClass();
        // $accion->_sql= $query;
        // $accion->_parametros = $parametros;
        // $accion->_id = $hotel->_id_hotel;
        return $mysqli->update($query, $parametros);
        
    }

    public static function updateStatus($data){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE cursos SET status = :status WHERE id_curso = :id_curso
sql;

      $parametros = array(
        ':status'=>$data->_status,
        ':id_curso'=>$data->_id_curso
      );

        // $accion = new \stdClass();
        // $accion->_sql= $query;
        // $accion->_parametros = $parametros;
        // $accion->_id = $hotel->_id_hotel;
        return $mysqli->update($query, $parametros);
        
    }

    public static function getAllCursos(){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM cursos
sql;
      return $mysqli->queryAll($query);
    }
    public static function delete($id){
        
    }
}