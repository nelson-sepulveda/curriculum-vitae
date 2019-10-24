<?php 


require('../controller/userController.php');

  if ($_POST['endpoint'] == -1) {
    $controllerUser = new userController();
    $controllerUser->loaderUser();
  }
  if ($_POST['endpoint'] == 1) {
    $controllerUser = new userController();
    $controllerUser->loginUser($_POST['email'],$_POST['pass']);
  }
  if($_POST['endpoint'] == 0){
    $controllerUser = new userController();
    $controllerUser->insertarUserController();
  }
  if($_POST['endpoint'] == 2){
    $controllerUser = new userController();
    $controllerUser->updateInfoBasica(
      $_POST['email_user'],
      $_POST['nombres_user'],
      $_POST['segundo_apellido'],
      $_POST['primer_apellido'],
      $_POST['nro_documento'],
      $_POST['fecha_nacimiento'],
      $_POST['pais_nacimiento'],
      $_POST['departamento_nacimiento'],
      $_POST['municipio_nacimiento']
    );
  }
  if($_POST['endpoint'] == 3){
    $controllerUser = new userController();
    $controllerUser->createBasicaPrimaria(
      $_POST['nombre_institucion'],
      $_POST['fecha_grado'],
      $_POST['titulo'],
      $_POST['descripcion']
    );
  }
  if ($_POST['endpoint'] == 4) {
    $controllerUser = new userController();
    $controllerUser->getInformacionBasica();
  }
  if ($_POST['endpoint'] == 5) {
    $controllerUser = new userController();
    $controllerUser->deleteEducacionbasica($_POST['ID']);
  }
  if ($_POST['endpoint'] == 6) {
    $controllerUser = new userController();
    $controllerUser->createEducacionSuperior(
      $_POST['institucion'],
      $_POST['fecha_grado_sup'],
      $_POST['titulo_superior'],
      $_POST['modalidad'],
      $_POST['descripcion_superior']
    );
  }
  if($_POST['endpoint']==7){
    $controllerUser = new userController();
    $controllerUser->getInformacionSuperior();
  }
  if($_POST['endpoint']==8){
    $controllerUser = new userController();
    $controllerUser->deleteInformacionSuperior($_POST['ID']);
  }
  if($_POST['endpoint']==9){
    $controllerUser = new userController();
    $controllerUser->createExperiencia(
      $_POST['cargo'],
      $_POST['fecha_inicio'],
      $_POST['fecha_fin'],
      $_POST['empresa'],
      $_POST['direccion'],
      $_POST['dependencia']
    );
  }
  if($_POST['endpoint']==10){
    $controllerUser = new userController();
    $controllerUser->getExperiencias();
  }
  if($_POST['endpoint']==11){
    $controllerUser = new userController();
    $controllerUser->deleteExperiencia($_POST['id_exp']);
  }
  
  
?>