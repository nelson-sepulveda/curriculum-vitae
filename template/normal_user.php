<!doctype html>
<html lang="en">
  <head>
    <title>Vitae &mdash; Sitio web para ti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row">

            <div class="col-lg">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li class="active"><a href="../index.html" class="nav-link">Inicio</a></li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-4">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li style="cursor: pointer;" class="active"><a class="nav-link">Mi Perfil</a></li>
                  <li style="cursor: pointer;" class="active">
                    <a href="../PDF/download.php" target="_blank" class="nav-link"> Descargar </a>
                  </li>
                  <li style="cursor: pointer;" class="active"><a class="nav-link"> Salir </a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

    <div class="container site-section">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-6">
          <h2 class="mb-4">Informacion Basica </h2>
          <p></p>
        </div>
      </div>
      <form>
          <div class="form-group row">
            <div class="input-group col-md-6">
                <!-- <label for="">Nombre</label> -->
                <input type="text" class="form-control" id="nombres_user" name="nombres_user"  placeholder="Nombres" aria-label="nombres_user" aria-describedby="basic-addon1">
            </div>
            <div class="input-group col-md-3">
                <!-- <label for="">Apellidos</label> -->
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" placeholder="Primer Apellido" aria-label="apellidos_user" aria-describedby="basic-addon1">
            </div>
            <div class="input-group col-md-3">
                <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo Apellido" aria-label="apellidos_user" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="form-group row">
              <div class="input-group col-md-3">
                <select class="form-control">
                    <option value="0">Ninguna</option>
                    <option value="1">C.C.</option>
                    <option value="2">NIT</option>
                    <option value="3">PSP</option>
                </select>
              </div>
              <div class="input-group col-md-3">
                <input type="text" class="form-control" id="nro_documento" name="nro_documento" placeholder="Nro. Identificacion" aria-describedby="basic-addon1">
              </div>
              <div class="input-group col-md-3">
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento">
              </div>
              <div class="input-group col-md-3">
                <select class="form-control">
                    <option value="0">Femenino</option>
                    <option value="1">Masculino</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
            <div class="input-group col-md-3">
              <select id="" class="form-control" placeholder="Nacionalidad">
                <option value="0">Colombiano</option>
                <option value="1">Otro.</option>
              </select>
            </div>
            <div class="input-group col-md-3">
              <input 
                type="text"
                placeholder="País"
                class="form-control"
                id="pais_nacimiento">
            </div>
            <div class="input-group col-md-3">
              <input 
                type="text"
                placeholder="Departamento"
                class="form-control"
                id="departamento_nacimiento">
            </div>  
            <div class="input-group col-md-3">
              <input 
                type="text"
                placeholder="Municipio"
                class="form-control"
                id="municipio_nacimiento">
            </div>
          </div>
          <div class="form-group row">
            <div class="input-group col-md-6">
              <input type="text" class="form-control" id="email_user" name="email_user"  placeholder="Email" aria-label="email_user" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="modal-footer text-right">
            <button type="submit" id="updateInfoBasica" class="btn btn-primary"> Guardar </button>
          </div>
      </form>


      <div class="modal fade bd-example-modal-sm" id="modalErrorUpdate" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="alert alert-success" id="contentErrorUpdate" role="alert">
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade bd-example-modal-sm" id="modalSuccessUpdate" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content alert alert-success">
            <div id="contentSuccessUpdate" role="alert">
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-6">
          <h2 class="mb-4">Informacion Academica</h2>
          <p>Informacion Basica y Media</p>
        </div>
      </div>
      <form>
        <!-- item -->
        <div class="form-group row">
          <div class="input-group col-md-6">
            <input
              type="text"
              placeholder="Educacion Basica Primaria"
              id="educationPrimary_normalUser"
              class="form-control">
          </div>
          <div class="input-group col-md-6">
            <input
              type="text"
              placeholder="Educacion Basica Secundaria"
              id="educationSecondary_normalUser"
              class="form-control">
          </div>
        </div>
        <div class="text-right">
          <button type="button" data-toggle="modal" data-target="#createEducacionBasica" class="btn btn-primary"> Agregar </button>
        </div>
        <!-- item -->
        <ul class="list-group">
          <li class="row"> 
            <div class="input-group col-md-3">
              <p> Titulo </p>
            </div>
            <div class="input-group col-md-3"> 
              <p> Fecha Grado </p>
            </div>
            <div class="input-group col-md-2"> 
              <p> Institucion </p>
            </div>
            <div class="input-group col-md-2">
              <p> Descripcion </p>
            </div>
          </li>
        </ul>
        <div class="modal-footer"></div>
        <ul id="credentials" class="list-group">
        </ul>
        <div class="col">
          <div class="form-group row">
          </div>
        </div>
      </form>

      <!-- Modal educacion basica secundaria-->
      <div class="modal fade" id="createEducacionBasica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Registro de Educacion Basica</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group row">
                  <div class="input-group col-md-12">
                    <input
                      required
                      type="text"
                      placeholder="Nombre Institucion"
                      id="nombre_institucion"
                      class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="input-group col-md-6">
                    <input
                      required
                      type="date"
                      placeholder="Fecha Graduado"
                      id="fecha_grado"
                      class="form-control">
                  </div>
                  <div class="input-group col-md-6">
                    <input
                      required
                      type="text"
                      placeholder="Titulo Obtenido"
                      id="titulo"
                      class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="input-group col-md-12">
                    <textarea
                      name="descripcion"
                      id="descripcion"
                      cols="10"
                      rows="5"
                      class="form-control"
                      placeholder="Descripcion"></textarea>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" id="createEducacionBasicaForm" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="createEducacionSuperior" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Registro de Educacion Superior</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group row">
                  <div class="input-group col-md-12">
                    <input
                      required
                      type="text"
                      placeholder="Nombre Institucion"
                      id="institucion"
                      class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="input-group col-md-6">
                    <input
                      required
                      type="date"
                      placeholder="Fecha Graduado"
                      id="fecha_grado_sup"
                      class="form-control">
                  </div>
                  <div class="input-group col-md-6">
                    <input
                      required
                      type="text"
                      placeholder="Titulo Obtenido"
                      id="titulo_superior"
                      class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="input-group col-md-12">
                    <input
                      required
                      type="text"
                      id="modalidad"
                      class="form-control"
                      placeholder="Modalidad">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="input-group col-md-12">
                    <textarea
                      id="descripcion_superior"
                      cols="10"
                      rows="5"
                      class="form-control"
                      placeholder="Descripcion"></textarea>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" id="createEducacionSuperioForm" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-6">
          <!-- <h2 class="mb-4">Informacion Academica</h2> -->
          <p>Educacion Superior</p>
        </div>
      </div>

      <div class="text-right">
        <button type="button" data-toggle="modal" data-target="#createEducacionSuperior" class="btn btn-primary"> Agregar E.S. </button>
      </div>

      <ul class="list-group">
        <li class="row"> 
          <div class="input-group col-md-3">
            <p> Titulo </p>
          </div>
          <div class="input-group col-md-3"> 
            <p> Fecha Grado </p>
          </div>
          <div class="input-group col-md-2"> 
            <p> Institucion </p>
          </div>
          <div class="input-group col-md-2">
            <p> Descripcion </p>
          </div>
        </li>
      </ul>
      <div class="modal-footer"></div>
      <ul id="credentialsSuperior" class="list-group">
      </ul>


      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-6">
          <h2 class="mb-4">Experiencia</h2>
          <!-- <p></p> -->
        </div>
      </div>

      <div class="text-right">
        <button type="button" data-toggle="modal" data-target="#createExperiencia" class="btn btn-primary"> Agregar Experiencia </button>
      </div><br><br>
        <!-- item -->
        <ul class="list-group">
          <li class="row"> 
            <div class="input-group col-md-3">
              <p> Empresa </p>
            </div>
            <div class="input-group col-md-2"> 
              <p> Fecha Inicio </p>
            </div>
            <div class="input-group col-md-2"> 
              <p> Fecha Fin </p>
            </div>
            <div class="input-group col-md-2">
              <p> Cargo </p>
            </div>
            <div class="input-group col-md-2">
              <p> Direccion </p>
            </div>
          </li>
        </ul>
        <div class="modal-footer"></div>
        <ul id="experiencia" class="list-group">
        </ul>


        <div class="modal fade" id="createExperiencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registro Experiencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group row">
                    <div class="input-group col-md-12">
                      <input
                        required
                        type="text"
                        placeholder="Cargo"
                        id="cargo"
                        class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="input-group col-md-6">
                      <input
                        required
                        type="date"
                        placeholder="Fecha Inicio"
                        id="fecha_inicio"
                        class="form-control">
                    </div>
                    <div class="input-group col-md-6">
                      <input
                        required
                        type="date"
                        placeholder="Fecha Fin"
                        id="fecha_fin"
                        class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="input-group col-md-6">
                      <input
                        required
                        type="text"
                        placeholder="Empresa"
                        id="empresa"
                        class="form-control">
                    </div>
                    <div class="input-group col-md-6">
                      <input
                        required
                        type="text"
                        placeholder="Direccion"
                        id="direccion"
                        class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="input-group col-md-12">
                      <textarea
                        id="dependencia"
                        cols="10"
                        rows="3"
                        class="form-control"
                        placeholder="Dependencia"></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="createExperienciaForm" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div>



      <!-- <div class="container site-section">
        <div class="row align-items-stretch feature-2">
          <div class="col-lg-9 feature-2-img order-lg-2">
            <img src="images/hero_2.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-3 feature-2-contents pr-lg-5">
            <div class="fixed-content">
              <span class="caption">02.</span>
              <h3 class="mb-5">Featured title name here</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus eaque laborum animi fugiat, suscipit in.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est vitae magni impedit cum laudantium, voluptas.</p>
            </div>
          </div>
        </div>
      </div> -->

    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">Acerca de</h2>
                <p>Manejamos tus datos de manera segura dentro de nuestros servicios. </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <div class="mb-5">
              <h2 class="footer-heading mb-4">Suscribete</h2>
              <form action="#" method="post" class="footer-suscribe-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Suscribete</button>
                  </div>
                </div>
            </div>


            <h2 class="footer-heading mb-4">Siguenos</h2>
            <a href="https://www.facebook.com" target="_blank" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="https://www.twitter.com" target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="https://www.instagram.com" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="https://www.google.com" class="pl-3 pr-3" target="_blank" ><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/aos.js"></script>

    <script src="../js/main.js"></script>
    <script src="../js/app.js"></script>
    <script> loaderUserInfo(); </script>

  </body>

</html>
