<?php
namespace Modelo;

class contactoc extends Empresa{


	protected $database;


	public function listado(){
		$data = $this->database->query("SELECT e.codigoEmpresa,c.rutContacto, c.nombreContacto, c.emailContacto, c.telefonoContacto, c.empresa_codigoEmpresa						
									FROM contacto c JOIN 
										 empresa e 
									ON c.empresa_codigoEmpresa = e.codigoEmpresa  
									ORDER BY  c.empresa_codigoEmpresa ASC")->fetchAll();


		return $data;
	}

	public function agregar($codigoEmpresa,$rutContacto,$nombreContacto,$emailContacto,$telefonoContacto){

		parent::agregar($codigoEmpresa);
		$empresa_codigoEmpresa = $this->database->codigoEmpresa();

		$this->database->insert("contacto",["empresa_codigoEmpresa" =>$codigoEmpresa,"rutContacto"=>$rutContacto,"nombreContacto"=>$nombreContacto,"emailContacto"=>$emailContacto,"telefonoContacto"=>$telefonoContacto]);

	}

	public function modificar($codigoEmpresa,$rutContacto,$nombreContacto,$emailContacto,$telefonoContacto){

		parent::modificar($codigoEmpresa);

		$this->database->update("contacto",["rutContacto"=>$rutContacto,"nombreContacto"=>$nombreContacto,"emailContacto"=>$emailContacto,"telefonoContacto"=>$telefonoContacto],["empresa_codigoEmpresa"=>$codigoEmpresa]);


	}


	public function eliminar($codigoEmpresa){

		$this->database->delete("contacto", ["AND" => ["empresa_codigoEmpresa" =>$codigoEmpresa]]);

		parent::eliminar($codigoEmpresa);

	}




}






