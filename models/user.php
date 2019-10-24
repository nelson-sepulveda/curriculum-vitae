<?php 


  require('../DB/db.php');

  class User {

    private $email;
    private $pass;
    private $conectar;

    /**
     * @name 
     * 
     */
    public function insertarUser($email, $pass)
    {

      $this->email = $email;
      $this->pass = $pass;

      $this->conectar = Conectar::conectarBD();

      if ($this->validateEmail($this->email)) {
        $sql = " INSERT INTO 
          user 
          (email_user,pass_user) 
          values 
          ('$this->email','$this->pass')";
          
        $query = mysqli_query($this->conectar , $sql);
  
        if($query == true) {
          echo "true";
        } else {
          echo "false";
        }
      } else {
        echo "Ya se encuentra registrado el Email";
      }
    }

    /** 
     * @name
     * 
     */
    private function validateEmail($email)
    {
      $this->conectar = Conectar::conectarBD();
      $sql = "SELECT email_user from user where email_user='$email'";
      
      $query = mysqli_query( $this->conectar,$sql);

      if($query==true){
        if(mysqli_num_rows($query) >= 1){
            return false;
        }
      }
      return true;
    }

    public function updateInformationBasica(
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
      // if ($this->validateEmail($email_user)) {
        session_start();
        $ID = $_SESSION['id'];
        if($ID!=null){
          $this->conectar = Conectar::conectarBD();
          $sql = "UPDATE user
          set email_user='$email_user',nombres='$nombres_user',segundo_apellido='$segundo_apellido',primer_apellido='$primer_apellido',nro_documento='$nro_documento',fecha_nacimiento='$fecha_nacimiento',
          pais_nacimiento='$pais_nacimiento', departamento_nacimiento='$departamento_nacimiento', municipio_nacimiento='$municipio_nacimiento',nacionalidad='nacionalidad'
          where ID='$ID'";
          $query = mysqli_query($this->conectar,$sql);
          if($query==true){
            return true;
          }
          else{
            return mysqli_error($this->conectar);
          }	  
        }
    }

    public function deleteExperienciaUser($ID)
    {
      $this->conectar = Conectar::conectarBD();
      $sql = "DELETE FROM experiencia where ID='$ID'";
      $query = mysqli_query($this->conectar , $sql);
      if($query==true){
        echo "true";
      }
      else{
        echo mysqli_error($this->conectar);
      }
    }

    public function deleteInformacionSuperior($ID)
    {
      $this->conectar = Conectar::conectarBD();
      $sql = "DELETE FROM educacion_superior where ID='$ID'";
      $query = mysqli_query($this->conectar , $sql);
      if($query==true){
        echo "true";
      }
      else{
        echo mysqli_error($this->conexion);
      }
    }

    public function createExperienciaUser(
      $cargo,
      $fecha_inicio,
      $fecha_fin,
      $empresa,
      $direccion,
      $dependencia)
    {
      session_start();

      $ID = $_SESSION['id'];
      $this->conectar = Conectar::conectarBD();
      $sql = "INSERT INTO experiencia (cargo,fecha_inicio,ID_USER,empresa,direccion,dependencia,fecha_fin)
        values ('$cargo','$fecha_inicio','$ID','$empresa','$direccion','$dependencia','$fecha_fin')";
      
      $query = mysqli_query($this->conectar , $sql);
      if($query==true){
        echo "true";
      }
      else{
        echo mysqli_error($this->conectar);
      }
    }

    public function getExperienciasUser()
    {
      session_start();

      $ID = $_SESSION['id'];
      if ($ID!=null){
        try {
          $this->conectar = Conectar::conectarBD();
          $sql = "SELECT * from experiencia where id_user=?";
          $stam = $this->conectar->prepare($sql);
          
          $stam->bind_param('s',$ID);
          $stam->execute();
          $resultado = $stam->get_result();
          
          if($resultado->num_rows===0){
            exit('null');
          }

          $vector = [];
          while($row = $resultado->fetch_array())
          {
            $vector[] = $row;
          }
          $stam->close();
          return $vector;
        }catch(Exception $e){
            return "null";	
        }

      } else {
        return 'index';
      }
    }

    public function getInformacionSuperiorUser()
    {
      session_start();

      $ID = $_SESSION['id'];
      if ($ID!=null){
        try{
          $this->conectar = Conectar::conectarBD();
          $sql = "SELECT * from educacion_superior where id_user=?";
          $stam = $this->conectar->prepare($sql);
          
          $stam->bind_param('s',$ID);
          $stam->execute();
          $resultado = $stam->get_result();
          
          if($resultado->num_rows===0){
            exit('null');
          }

          $vector = [];
          while($row = $resultado->fetch_array())
          {
            $vector[] = $row;
          }
          $stam->close();
          return $vector;
        }catch(Exception $e){
            return "null";	
        }

      } else {
        return 'index';
      }
    }

    public function createEducacionSuperiorUser($institucion, $fecha_grado_sup, $titulo_superior, $modalidad, $descripcion_superior)
    {
      session_start();

      $ID = $_SESSION['id'];
      $this->conectar = Conectar::conectarBD();
      $sql = "INSERT INTO educacion_superior (institucion,fecha_grado_sup,ID_USER,titulo_superior,descripcion_superior,modalidad)
        values ('$institucion','$fecha_grado_sup','$ID','$titulo_superior','$descripcion_superior','$modalidad')";
      
      $query = mysqli_query($this->conectar , $sql);
      if($query==true){
        echo "true";
      }
      else{
        echo mysqli_error($this->conexion);
      }
    }

    /**
     * 
     */
    public function deleteEducacionbasicaUser($ID)
    {
      $this->conectar = Conectar::conectarBD();
      $sql = "DELETE FROM basica_secundaria where ID='$ID'";
      $query = mysqli_query($this->conectar , $sql);
      if($query==true){
        echo "true";
      }
      else{
        echo mysqli_error($this->conexion);
      }
    }

    /**
     * 
     * 
     */
    public function createInformacionBasica($nombre_institucion, $fecha_grado, $titulo, $descripcion)
    {
      session_start();

      $ID = $_SESSION['id'];
      $this->conectar = Conectar::conectarBD();
      $sql = "INSERT INTO basica_secundaria (titulo,fecha_grado,ID_USER,nombre_institucion,descripcion)
        values ('$titulo','$fecha_grado','$ID','$nombre_institucion','$descripcion')";
      
      $query = mysqli_query($this->conectar , $sql);
      if($query==true){
        echo "true";
      }
      else{
        echo mysqli_error($this->conexion);
      }

    }

    public function getInformacionBasicaUser()
    {
      session_start();

      $ID = $_SESSION['id'];
      if ($ID!=null){
        try{
          $this->conectar = Conectar::conectarBD();
          $sql = "SELECT * from basica_secundaria where id_user=?";
          $stam = $this->conectar->prepare($sql);
          
          $stam->bind_param('s',$ID);
          $stam->execute();
          $resultado = $stam->get_result();
          
          if($resultado->num_rows===0){
            exit('null');
          }

          $vector = [];
          while($row = $resultado->fetch_array())
          {
            $vector[] = $row;
          }
          $stam->close();
          return $vector;
        }catch(Exception $e){
            return "null";	
        }

      } else {
        return 'index';
      }
    }

    /**
     * 
     * 
     * 
     */
    public function loaderInformationUser()
    {
      session_start();

      $ID = $_SESSION['id'];
      if ($ID!=null){
        try{
          $this->conectar = Conectar::conectarBD();
          $sql = "SELECT * from user where id=?";
          $ID = $_SESSION['id'];
          $stam = $this->conectar->prepare($sql);
          
          $stam->bind_param('s',$ID);
          $stam->execute();
          $resultado = $stam->get_result();
          
          if($resultado->num_rows===0)
           exit('null');
          
          $vector = $resultado->fetch_assoc();
          // print_r($vector);	
          $stam->close();
          return $vector;
        }catch(Exception $e){
            return "null";	
        }
      } else {
        return 'index';
      }
    }

    public function getLoginUser($email, $pass)
    {
      $this->conectar = Conectar::conectarBD();

      $sql = "SELECT nombres , email_user , ID
      from user where email_user='$email' and pass_user='$pass'";

      $query = mysqli_query($this->conectar,$sql);

      if($query==true){
        if(mysqli_num_rows($query)>=1){
          return $query;
        }
      }
      return 'null';
    }

  }


?>