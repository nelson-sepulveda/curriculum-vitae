<?php


  session_start();
  // error_reporting(0);

  $ID = $_SESSION['id'];
  if($ID==null || $ID=''){	
    header('location:../404.php');
    die();
  }

  require_once('../DB/db.php');
  require_once('../fpdf181/fpdf.php');

  $conectar = Conectar::conectarBD();

  class PDF extends FPDF {

    function Header()
    {
      $this->SetFont('Arial','',15);
      $this->Line(10,10,206,10);
      $this->Cell(20,25,'Hoja de Vida',0,0,'L');#,$this->Image('',170,11,19));
      $this->Ln(10);
      $this->SetFont('Arial','',11);
      // $this->Cell(20,25,'A continuacion se dara un avance de todas las ventas realizadas',0,0,'L');#$this->Image('images/logoDerecha.png', 175, 12, 19));
      //Se da un salto de línea de 25
      $this->Ln(25);
    }


    function Footer()
    {
      $this->SetY(-40);
      $this->SetFont('Arial','I',8);
      $this->Cell(0,10,'','T',0,'L');
      $this->ln(4);
      $this->Cell(0,10,'Curriculum Vitae',0,'L');
      $this->ln(3);
      $this->Cell(0,10,'Cucuta',0,'L');
      $this->ln(3);
      $this->Cell(0,10,date('Y'),0,'L');
    }

    public function get_InfoUser($data)
    {
      $this->SetFont('Arial','',15);
      $this->Cell(10,10,'Informacion Basica',10,20,"L");
      $this->ln(3);
      $this->SetFont('Arial','',11);
      while ($row = mysqli_fetch_row($data)){
        $this->Cell(0,3,"Nombre : ".$row[1]. " ".$row[2]." ".$row[3],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Doc : ".$row[5],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Nacionalidad : ".$row[7],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Fecha Nacimiento : ".$row[9],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Pais Nacimiento : ".$row[10],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Departamento Nacimiento : ".$row[11],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Municipio Nacimiento : ".$row[12],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Email : ".$row[15],0,1,"L");
        $this->ln(2);
      }
      $this->ln(7);
      // $this->Cell(40,5,'Los detalles mostrados son tomados de los registros que se encuentran en nuestra base de datos,',0,1,'L'); 
    }


    public function get_EducacionBasica($data)
    {
      $this->SetFont('Arial','',15);
      $this->Cell(10,10,'Educacion Basica',10,20,"L");
      $this->ln(3);
      $this->SetFont('Arial','',11);
      
      while ($row = mysqli_fetch_row($data)){
        $this->Cell(0,3,"Titulo: ".$row[1],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Graduacion: ".$row[2],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Institucion: ".$row[4],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Descripcion: ".$row[5],0,1,"L");
        $this->ln(4);
      }
      
    }


    public function get_EducacionSuperior($data)
    {
      $this->SetFont('Arial','',15);
      $this->Cell(10,10,'Educacion Superior',10,20,"L");
      $this->ln(3);
      $this->SetFont('Arial','',11);
      
      while ($row = mysqli_fetch_row($data)){
        $this->Cell(0,3,"Modalidad: ".$row[1],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Graduacion : ".$row[4],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Titulo: ".$row[6],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Institucion: ".$row[7],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Descripcion: ".$row[8],0,1,"L");
        $this->ln(4);
      }
    }


    public function get_Experiencia($data)
    {
      // echo $data;
      $this->SetFont('Arial','',15);
      $this->Cell(10,10,'Experiencia',10,20,"L");
      $this->ln(3);
      $this->SetFont('Arial','',11);
      
      while ($row = mysqli_fetch_row($data)){
        $this->Cell(0,3,"Cargo: ".$row[1],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Fecha Inicio: ".$row[2],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Fecha Final: ".$row[3],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Empresa: ".$row[4],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Direccion: ".$row[5],0,1,"L");
        $this->ln(2);
        $this->Cell(0,3,"Dependencia: ".$row[6],0,1,"L");
        $this->ln(4);
      }
    }

  }

  $idAux = $_SESSION["id"];

  $sql = "SELECT * FROM user WHERE ID = '$idAux'";

  $sql_basica = "SELECT * FROM basica_secundaria  WHERE ID_USER = '$idAux'";

  $sql_superior = "SELECT * FROM educacion_superior WHERE ID_USER = '$idAux'";

  $sql_exp = "SELECT * FROM experiencia WHERE ID_USER = '$idAux'";

  $query = mysqli_query($conectar,$sql);
  $query2 = mysqli_query($conectar,$sql_basica);
  $query3 = mysqli_query($conectar,$sql_superior);
  $query4 = mysqli_query($conectar,$sql_exp);

  // if($query && $query2 && $query3 && $query4) {
      $PDF = new PDF();
      $PDF->AddPage('P','Letter');
      $PDF->setTitle('Curriculum');
      $PDF->get_InfoUser($query);
      $PDF->get_EducacionBasica($query2);
      $PDF->AddPage('P','Letter');
      $PDF->get_EducacionSuperior($query3);
      $PDF->get_Experiencia($query4);
      // $PDF->getDetalles($query2);
      // $PDF->getFirma();
      $PDF->Output();
  // } 

?>