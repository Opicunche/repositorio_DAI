<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Medoo\Medoo;

return function (App $app) {

	$app->get('/', function ($request, $response) {
		
		return $this->view->render($response, 'inicio.html'); 
			
	});



		$app->post('/actempresa', function ($request, $response) {
		$op=$_POST["operacion"];
		$dbp = new \Modelo\contactoc($this);

		if ($op=="grabar") {
			$dbp->agregar($_POST["codigoEmpresa"] ,$_POST["rutContacto"],$_POST["nombreContacto"], $_POST["emailContacto"],$_POST["telefonoContacto"]);
		}
		if ($op=="modificar") {
			$dbp->modificar($_POST["codigoEmpresa"] ,$_POST["rutContacto"],$_POST["nombreContacto"], $_POST["emailContacto"],$_POST["telefonoContacto"]);
		}
		if ($op=="eliminar") {
			$dbp->eliminar($_POST["codigoEmpresa"]);

		}
		return $this->view->render($response, 'empresa_detalle.html',['contactos'=>$dbp->listado()]);


	});

    $app->get('/detalleContactos', function ($request, $response) {
		$dbp = new \Modelo\contactoc($this);
		return $this->view->render($response, 'empresa_detalle.html' , ['contactos' =>$dbp->listado()]);
	});


    $app->get('/contacto', function ($request, $response) {
		$dbp = new \Modelo\contactoc($this);
		return $this->view->render($response, 'registroContacto.html' , ['contactos' =>$dbp->listado()]);
	});



};

