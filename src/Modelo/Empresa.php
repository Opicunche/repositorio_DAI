<?php
namespace Modelo;

class Empresa
{
   protected $database;

   public function __construct($container)
   {
   	 $this->database = $container->database;
   }


   public function datos(){
   	 $arr = $this->database->select('empresa', ['codigoEmpresa','rutEmpresa','nombreEmpresa,
   	 	passwordEmpresa','direccionEmpresa']);

   	 return $arr;
   }

   public function unempresa($codigoEmpresa){
   	$data = $this->database->select("empresa",["rutEmpresa","nombreEmpresa","passwordEmpresa",
   		"direccionEmpresa"],["codigoEmpresa"=>$codigoEmpresa]);
   	return $data;
   }

   public function agregar($codigoEmpresa,$rutEmpresa,$nombreEmpresa,$passwordEmpresa,$direccionEmpresa){


   	$this->database->insert("empresa", ["codigoEmpresa"=>$codigoEmpresa,"rutEmpresa"=>$rutEmpresa,
   		"nombreEmpresa"=>$nombreEmpresa,"passwordEmpresa"=>$passwordEmpresa,"direccionEmpresa"=>$direccionEmpresa]);

   }


   public function modificar($codigoEmpresa,$rutEmpresa,$nombreEmpresa,$passwordEmpresa,$direccionEmpresa){


   	$data = $this->database->update("empresa" ,["rutEmpresa"=>$rutEmpresa,"nombreEmpresa"=>$nombreEmpresa,"passwordEmpresa"=>$passwordEmpresa,"direccionEmpresa"=>$direccionEmpresa],["codigoEmpresa"=>$codigoEmpresa]);

   	return $data;
   }



   public function eliminar($codigoEmpresa){
   	 $this->database->delete("empresa",["AND" => ["codigoEmpresa"=>$codigoEmpresa]]);
   }


}
