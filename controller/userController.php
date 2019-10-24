<?php

  require('../models/user.php');

  class userController {
      
    private $email_user;
    private $pass_user;
    private $user;


    public function loaderUser()
    {
      # code...
      $this->user = new User();
      $datos = $this->user->loaderInformationUser();
      // print_r($datos);
      if($datos=='index'){
        echo 'index';
      } else {
        echo json_encode($datos);
      }

    }

    public function updateInfoBasica(
      $email_user,
      $nombres_user,
      $segundo_apellido,
      $primer_apellido,
      $nro_documento,
      $fecha_nacimiento,
      $pais_nacimiento,
      $departamento_nacimiento,
      $municipio_nacimiento
    )
    {
      $this->user = new User();
      $update = $this->user->updateInformationBasica(
        $email_user,
        $nombres_user,
        $segundo_apellido,
        $primer_apellido,
        $nro_documento,
        $fecha_nacimiento,
        $pais_nacimiento,
        $departamento_nacimiento,
        $municipio_nacimiento
      );
      if($update){
        echo 'true';
      } else {
        echo 'Se presento un error en la actualizacion';
      }
    }

    public function deleteEducacionbasica($ID)
    {
      $this->user = new User();
      $this->user->deleteEducacionbasicaUser($ID);
    }

    public function createEducacionSuperior($institucion, $fecha_grado_sup, $titulo_superior, $modalidad, $descripcion_superior)
    {
      $this->user = new User();
      $this->user->createEducacionSuperiorUser($institucion, $fecha_grado_sup, $titulo_superior, $modalidad, $descripcion_superior);
    }

    public function getInformacionSuperior()
    {
      $this->user = new User();
      echo json_encode($this->user->getInformacionSuperiorUser());
    }
    /**
     * 
     */
    public function getInformacionBasica()
    {
      $this->user = new User();
      echo json_encode($this->user->getInformacionBasicaUser());
    }

    public function createExperiencia(
      $cargo,
      $fecha_inicio,
      $fecha_fin,
      $empresa,
      $direccion,
      $dependencia)
    {
      $this->user = new User();
      $this->user->createExperienciaUser(
        $cargo,
        $fecha_inicio,
        $fecha_fin,
        $empresa,
        $direccion,
        $dependencia);
    }

    public function getExperiencias()
    {
      $this->user = new User();
      echo json_encode($this->user->getExperienciasUser());
    }


    public function deleteExperiencia($ID)
    {
      $this->user = new User();
      $this->user->deleteExperienciaUser($ID);
    }

    /**
     * 
     * 
     */
    public function createBasicaPrimaria($nombre_institucion, $fecha_grado, $titulo, $descripcion)
    {
      $this->user = new User();
      $this->user->createInformacionBasica($nombre_institucion, $fecha_grado, $titulo, $descripcion);
    }

    public function deleteInformacionSuperior($ID)
    {
      $this->user = new User();
      $this->user->deleteInformacionSuperior($ID);
    }

    /** 
     * 
     * 
     * 
     */
    public function loginUser($email , $pass)
    {
      $this->email_user = $email;
      $this->pass_user = $pass;

      $this->user = new User();
      $datos = $this->user->getLoginUser($email,$pass);

      if($datos=='null'){
        echo "noregistrado";
      }
      else {
        $usuario = mysqli_fetch_array($datos);
        $nombres = $usuario[0];
        $ID = $usuario[2];
        $email = $usuario[1]; 
        
        $this->loginSession($ID,$nombres,$email);
        echo "true";
      }
      
    }

    /**
     * 
     */
    private function loginSession($ID,$nombres,$email)
    {
      session_start();
      $_SESSION['id'] = $ID;
      $_SESSION['nombres'] = $nombres;
      $_SESSION['email'] = $email;    
    }

    public function insertarUserController()
    {
        $this->email_user = $_POST['correoElectronico_Register'];
        $this->pass_user = $_POST['password_Register'];
        $this->user = new User();

        $this->user->insertarUser($this->email_user , $this->pass_user);
    }
  }

?>