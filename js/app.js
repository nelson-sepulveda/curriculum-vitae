
var listCredential = []
var html = ''

// credentials


function deleteExperiencia(id) {
  jQuery(document).ready(function($){
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 11,
        id_exp: id
      },
    success : function(data)
      {
        if(data==='true'){
          successModalUpdateBasic('Eliminacion Correcta de Experiencia');
          loaderExperienciaUser();
        } else {
          successModalErrorBasic('Error en Eliminacion de Educacion');
        }
      }
    });
  })
}


function loaderExperienciaUser(){
  $.ajax({
    url: '../ajaxController/ajaxController.php',
    method:'post',
    data:{
      endpoint: 10
    },
  success : function(data)
    {
      console.log(data);
      if(data!=='null'){
        var json = JSON.parse(data)
        print_Experiencia(json);
      } else {
        // ('Se presento un error en la carga de informacion')
      }
    }
  });
}

function print_Experiencia(json) 
{
  var inner = document.getElementById('experiencia');
  var html = ''
  for (let index = 0; index < json.length; index++) {
  html+= '<br>'+
    '<li class="row">' +
      '<div class="input-group col-md-3">' +
        '<p>' + json[index].empresa +'</p>'+
      '</div>' +
      '<div class="input-group col-md-2">' + 
        '<p>' + json[index].fecha_inicio +'</p>' +
      '</div>' + 
      '<div class="input-group col-md-2">' + 
        '<p>' + json[index].fecha_fin +'</p>' +
      '</div>' +
      '<div class="input-group col-md-2">' + 
        '<p>' + json[index].cargo +'</p>' +
      '</div>' +
      '<div class="input-group col-md-2">' + 
        '<p>' + json[index].direccion +'</p>' +
      '</div>' +
      '<div style="cursor:pointer;" class="input-group col-md-1 clearfix bshadow0 pbs">' + 
        '<span class="icon-delete" onclick="deleteExperiencia('+json[index].ID+')"> ' + 
        '</span>' + 
      '</div>' +
    '</li>' + '<br>'
  }
  inner.innerHTML = html;
}

function deleteCredential(index) {
  console.log(index)
  jQuery(document).ready(function($){
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 5,
        ID: index
      },
    success : function(data)
      {
        if(data==='true'){
          loaderInformacionBasica();
          successModalUpdateBasic('Eliminacion Correcta de Educacion');
        } else {
          successModalErrorBasic('Error en Eliminacion de Educacion');
        }
      }
    });
  })
}

  function successModalUpdateBasic(cuerpo) {
    $('#contentSuccessUpdate').html(cuerpo);
    $('#modalSuccessUpdate').modal('show');
    setTimeout(function() {
    $('#modalSuccessUpdate').modal('hide');
    },3000);
  }

  function successModalErrorBasic(cuerpo) {
    $('#contentErrorUpdate').html(cuerpo);
    $('#modalErrorUpdate').modal('show');
    setTimeout(function() {
    $('#modalErrorUpdate').modal('hide');
    },3000);
  }

  function saveCredential(index) {
    var titleCredential = document.getElementById('title-'+index).value
    var fechainicio = document.getElementById('dateInicio-'+index).value
    var fechafin = document.getElementById('dateFin-'+index).value
    var culmino = document.getElementById('select-'+index).value
    console.log(titleCredential, fechainicio, fechafin, culmino); 
    console.log(listCredential[index]);  
  }


  function loaderUserInfo() {
    jQuery(document).ready(function($){
      $.ajax({
        url: '../ajaxController/ajaxController.php',
        method:'post',
        data:{
          endpoint: -1
        },
      success : function(data)
        {
          if(data==='index'){
            window.location.href='../index.html';
          } else {
            var json = JSON.parse(data);
            // console.log(json);
            
            $('#nombres_user').val(json.nombres)
            $('#email_user').val(json.email_user)
            $('#segundo_apellido').val(json.segundo_apellido)
            $('#primer_apellido').val(json.primer_apellido)
            $('#nro_documento').val(json.nro_documento)
            $('#fecha_nacimiento').val(json.fecha_nacimiento)
            $('#pais_nacimiento').val(json.pais_nacimiento)
            $('#departamento_nacimiento').val(json.departamento_nacimiento)
            $('#municipio_nacimiento').val(json.municipio_nacimiento)
            $('#nacionalidad').val(json.nacionalidad)
            // $('#email_user').val(json.email_user)
            loaderInformacionBasica();
            loaderInformacionSuperiorUser();
            loaderExperienciaUser();
          }
        }
      });
    })
  }

  function loaderInformacionSuperiorUser() {
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 7
      },
      success : function(data)
        {
          // console.log(data);
          if(data!==''){
            var json = JSON.parse(data);
            print_CredencialesSuperior(json);
          } else {
            successModalError('Error en carga de informacion');
          }
        }
    });
  } 

  function print_CredencialesSuperior (json) {
    var inner = document.getElementById('credentialsSuperior');
    var html = ''
    for (let index = 0; index < json.length; index++) {
    html+= '<br>'+
      '<li class="row">' +
        '<div class="input-group col-md-3">' +
          '<p>' + json[index].titulo_superior +'</p>' +
        '</div>' +
        '<div class="input-group col-md-3">' + 
          '<p>' + json[index].fecha_grado_sup +'</p>' +
        '</div>' + 
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].institucion +'</p>' +
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].descripcion_superior +'</p>' +
        '</div>' +
        '<div style="cursor:pointer;" class="input-group col-md-1 clearfix bshadow0 pbs">' + 
          '<span class="icon-delete" onclick="deleteCredentialSuperior('+json[index].ID+')"> ' + 
          '</span>' + 
        '</div>' +
      '</li>' + '<br>'
    }
    inner.innerHTML = html;
  }

  function deleteCredentialSuperior(id) {
    jQuery(document).ready(function($){
      $.ajax({
        url: '../ajaxController/ajaxController.php',
        method:'post',
        data:{
          endpoint: 8,
          ID: id
        },
      success : function(data)
        {
          if(data==='true'){
            loaderInformacionSuperiorUser();
            successModalUpdateBasic('Eliminacion Correcta de Educacion');
          } else {
            successModalErrorBasic('Error en Eliminacion de Educacion');
          }
        }
      });
    })
  }

  function loaderInformacionBasica() {
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 4
      },
      success : function(data)
        {
          // console.log(data);
          if(data!==''){
            var json = JSON.parse(data);
            // console.log(json)
            print_Credenciales(json);
          } else {
            successModalError('Error en carga de informacion');
          }
        }
    });
  }

  function print_Credenciales (json) {
    var inner = document.getElementById('credentials');
    var html = ''
    for (let index = 0; index < json.length; index++) {
    html+= '<br>'+
      '<li class="row">' +
        '<div class="input-group col-md-3">' +
          '<p>' + json[index].titulo +'</p>' +
        '</div>' +
        '<div class="input-group col-md-3">' + 
          '<p>' + json[index].fecha_grado +'</p>' +
        '</div>' + 
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].nombre_institucion +'</p>' +
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].descripcion +'</p>' +
        '</div>' +
        '<div style="cursor:pointer;" class="input-group col-md-1 clearfix bshadow0 pbs">' + 
          '<span class="icon-delete" onclick="deleteCredential('+json[index].ID +')"> ' + 
          '</span>' + 
        '</div>' +
      '</li>' + '<br>'
    }
    inner.innerHTML = html;
  }

// JQUERY

jQuery(document).ready(function($) {

  // INDEX.HTML

  $('#btn_loginUser').on('click',function(event){
    event.preventDefault();

    var email = document.getElementById('emailUserDialogLogin').value;
    var pass = document.getElementById('passUserDialogLogin').value;

    console.log(email, pass)
    if(email!=='' && pass!=='') {
      $.ajax({
        url: 'ajaxController/ajaxController.php',
        method:'post',
        data:{
          email: email,
          pass: pass,
          endpoint: 1
        },
      success : function(data)
        {
          console.log(data);
          if(data==='true'){
              window.location.href="template/normal_user.php";
          } else {
              errorModal('Error','Datos incorrectos')
          }
        }
      });
    } else {
      errorModal('Error','Datos Vacios')
    }
  })


  $('#registerUser').on('click',function(event){
    event.preventDefault();
    var email = document.getElementById('correoElectronico_Register').value;
    var pass = document.getElementById('password_Register').value;
    var confirm = document.getElementById('password_RegisterVeri').value;

    if ( pass===confirm ) {
      $.ajax({
        url: 'controller/userController.php',
        method:'post',
        data:{
          correoElectronico_Register: email,
          password_Register: pass,
          endpoint:0
        },
      success : function(data)
          {
              console.log(data);
              if(data==='true'){
                  successModal('Registro Exitoso','El Usuario se Registro correctamente!');
                  $('#registerModal').modal('hide')
                  clearSignUp();
              } else {
                  errorModal('Error',data)
              }
          }
      });
    } else {
      errorModal('Error','La contraseña es diferente a la confirmacion')
    }
  })

  function errorModal (titulo, cuerpo) {
    $('#modalErrorTitulo').html(titulo);
    $('#modalErrorBody').html(cuerpo);
    $('#modalError').modal('show');
    setTimeout(function() {
    $('#modalError').modal('hide');
    },3900);
  }

  function clearSignUp() {
    $('#correoElectronico_Register').val('');
    $('#password_Register').val('');
    $('#password_RegisterVeri').val('');
  }

  function successModal(titulo,cuerpo) {
    $('#modalSuccessTitulo').html(titulo);
    $('#modalSuccessBody').html(cuerpo);
    $('#modalSuccess').modal('show');
    setTimeout(function() {
    $('#modalSuccess').modal('hide');
    },3900);
  }

  function validateInfoEducacionBasica(nombre_institucion, fecha_grado, titulo, descripcion) {
    return nombre_institucion !== '' &&  fecha_grado !== '' && titulo !== ''  && descripcion !== '';
  }
 
  // NORMAL USER 

  $('#createEducacionBasicaForm').on('click',function(event) {
    event.preventDefault();

    let nombre_institucion = document.getElementById('nombre_institucion').value;
    let fecha_grado = document.getElementById('fecha_grado').value;
    let titulo = document.getElementById('titulo').value;
    let descripcion = document.getElementById('descripcion').value;

    if ( validateInfoEducacionBasica(nombre_institucion, fecha_grado, titulo, descripcion) ) {
      $.ajax({
        url: '../ajaxController/ajaxController.php',
        method:'post',
        data:{
          nombre_institucion:nombre_institucion,
          fecha_grado:fecha_grado,
          titulo: titulo,
          descripcion :descripcion,
          endpoint: 3
        },
        success : function(data)
          {
            console.log(data);
            if(data==='true'){
              successModalUpdate('Creacion Correcta de Informacion');
              clearModalEducacionBasica();
              $('#createEducacionBasica').modal('hide');
              loaderInformacionBasica();
            } else {
              successModalError('Error en Creacion de informacion');
            }
          }
      });
    } else {
      successModalError('Hay campos incompletos!');
    }

  })


  function loaderInformacionBasica() {
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 4
      },
      success : function(data)
        {
          console.log(data);
          if(data!==''){
            var json = JSON.parse(data);
            console.log(json)
            print_Credenciales(json);
          } else {
            successModalError('Error en carga de informacion');
          }
        }
    });
  }

  function print_Credenciales (json) {
    var inner = document.getElementById('credentials');
    var html = ''
    for (let index = 0; index < json.length; index++) {
    html+= '<br>'+
      '<li class="row">' +
        '<div class="input-group col-md-3">' +
          '<p>' + json[index].titulo +'</p>' +
        '</div>' +
        '<div class="input-group col-md-3">' + 
          '<p>' + json[index].fecha_grado +'</p>' +
        '</div>' + 
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].nombre_institucion +'</p>' +
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].descripcion +'</p>' +
        '</div>' +
        '<div style="cursor:pointer;" class="input-group col-md-1 clearfix bshadow0 pbs">' + 
          '<span class="icon-delete" onclick="deleteCredential('+index+')"> ' + 
          '</span>' + 
        '</div>' +        
      '</li>' + '<br>'
    }
    inner.innerHTML = html;
  }

  function clearModalEducacionBasica() {
    $('#nombre_institucion').val('');
    $('#fecha_grado').val('');
    $('#titulo').val('');
    $('#descripcion').val('');
  }
  
  $('#updateInfoBasica').on('click',function(event){
    event.preventDefault();

    var email_user = document.getElementById('email_user').value;
    var nombres_user = document.getElementById('nombres_user').value;
    var segundo_apellido = document.getElementById('segundo_apellido').value;
    var primer_apellido = document.getElementById('primer_apellido').value;
    var nro_documento = document.getElementById('nro_documento').value;
    var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
    var pais_nacimiento = document.getElementById('pais_nacimiento').value;
    var departamento_nacimiento = document.getElementById('departamento_nacimiento').value;
    var municipio_nacimiento = document.getElementById('municipio_nacimiento').value;
    // var nacionalidad = document.getElementById('nacionalidad').value;
    
    
      $.ajax({
        url: '../ajaxController/ajaxController.php',
        method:'post',
        data:{
          email_user:email_user,
          nombres_user:nombres_user,
          segundo_apellido: segundo_apellido,
          primer_apellido :primer_apellido,
          nro_documento: nro_documento,
          fecha_nacimiento: fecha_nacimiento,
          pais_nacimiento: pais_nacimiento,
          departamento_nacimiento: departamento_nacimiento,
          municipio_nacimiento: municipio_nacimiento,
          endpoint: 2
        },
      success : function(data)
        {
          console.log(data);
          if(data==='true'){
            successModalUpdate('Actualizacion Correcta de Informacion');
          } else {
            successModalError('Error en actualizaccion de informacion');
          }
        }
      });
  })

  function successModalError(cuerpo) {
    $('#contentErrorUpdate').html(cuerpo);
    $('#modalErrorUpdate').modal('show');
    setTimeout(function() {
    $('#modalErrorUpdate').modal('hide');
    },3000);
  }

  function successModalUpdate(cuerpo) {
    $('#contentSuccessUpdate').html(cuerpo);
    $('#modalSuccessUpdate').modal('show');
    setTimeout(function() {
    $('#modalSuccessUpdate').modal('hide');
    },3000);
  }


  // EDUCACION SUPERIOR

  $('#createEducacionSuperioForm').on('click',function(event){

    event.preventDefault();
    console.log('here')
    
    var institucion = document.getElementById('institucion').value;
    var fecha_grado_sup = document.getElementById('fecha_grado_sup').value;
    var titulo_superior = document.getElementById('titulo_superior').value;
    var modalidad = document.getElementById('modalidad').value;
    var descripcion_superior = document.getElementById('descripcion_superior').value;
    console.log(institucion, fecha_grado_sup, titulo_superior, modalidad, descripcion_superior);
    
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        institucion:institucion,
        fecha_grado_sup:fecha_grado_sup,
        titulo_superior: titulo_superior,
        modalidad: modalidad,
        descripcion_superior: descripcion_superior,
        endpoint: 6
      },
    success : function(data)
      {
        console.log(data);
        if(data==='true'){
          successModalUpdate('Creacion Correcta de Educacion Superior');
          loaderInformacionSuperior();
          clearModalEducacionSuperior();
        } else {
          successModalError('Se presento un error en la creacion de Educacion Superior');
        }
      }
    });
  });

  function loaderInformacionSuperior() {
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 7
      },
    success : function(data)
      {
        console.log(data);
        if(data!==''){
          var json = JSON.parse(data)
          print_InEducacionSuperior(json);
        } else {
          
        }
      }
    });
  }

  function print_InEducacionSuperior (json) {
    var inner = document.getElementById('credentialsSuperior');
    var html = ''
    for (let index = 0; index < json.length; index++) {
    html+= '<br>'+
      '<li class="row">' +
        '<div class="input-group col-md-3">' +
          '<p>' + json[index].titulo_superior +'</p>' +
        '</div>' +
        '<div class="input-group col-md-3">' + 
          '<p>' + json[index].fecha_grado_sup +'</p>' +
        '</div>' + 
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].institucion +'</p>' +
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].descripcion_superior +'</p>' +
        '</div>' +
        '<div style="cursor:pointer;" class="input-group col-md-1 clearfix bshadow0 pbs">' + 
          '<span class="icon-delete" onclick="deleteCredential('+json[index].ID+')"> ' + 
          '</span>' + 
        '</div>' +
      '</li>' + '<br>'
    }
    inner.innerHTML = html;
  }

  function clearModalEducacionSuperior() {
    $('#institucion').val('')
    $('#fecha_grado_sup').val('')
    $('#titulo_superior').val('')
    $('#primer_apellido').val('')
    $('#modalidad').val('')
    $('#descripcion_superior').val('')
    $('#createEducacionSuperior').modal('hide')
  }


  // EXPERIENCIA

  $('#createExperienciaForm').on('click',function(event){

    event.preventDefault();
    
    var cargo = document.getElementById('cargo').value;
    var fecha_inicio = document.getElementById('fecha_inicio').value;
    var fecha_fin = document.getElementById('fecha_fin').value;
    var empresa = document.getElementById('empresa').value;
    var direccion = document.getElementById('direccion').value;
    var dependencia = document.getElementById('dependencia').value;
    // console.log(institucion, fecha_grado_sup, titulo_superior, modalidad, descripcion_superior);
    
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        cargo:cargo,
        fecha_inicio : fecha_inicio,
        fecha_fin : fecha_fin,
        empresa : empresa,
        direccion : direccion,
        dependencia : dependencia,
        endpoint: 9
      },
      success : function(data)
        {
          console.log(data);
          if(data==='true'){
            clearModalExperiencia();
            successModalUpdate('Experencia Registradas');
            loaderExperiencia();
          } else {
            successModalError('Se presento un error en la creacion de Educacion Superior');
          }
        }
    });
  });

  function clearModalExperiencia() {
    $('#cargo').val('')
    $('#fecha_inicio').val('')
    $('#fecha_fin').val('')
    $('#empresa').val('')
    $('#direccion').val('')
    $('#dependencia').val('')
    $('#createExperiencia').modal('hide')
  }

  function loaderExperiencia(){
    $.ajax({
      url: '../ajaxController/ajaxController.php',
      method:'post',
      data:{
        endpoint: 10
      },
    success : function(data)
      {
        console.log(data);
        if(data!==''){
          var json = JSON.parse(data)
          print_Experiencia(json);
        } else {
          successModalError('Se presento un error en la carga de informacion')
        }
      }
    });
  }

  function print_Experiencia(json) 
  {
    var inner = document.getElementById('experiencia');
    var html = ''
    for (let index = 0; index < json.length; index++) {
    html+= '<br>'+
      '<li class="row">' +
        '<div class="input-group col-md-3">' +
          '<p>' + json[index].empresa +'</p>'+
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].fecha_inicio +'</p>' +
        '</div>' + 
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].fecha_fin +'</p>' +
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].cargo +'</p>' +
        '</div>' +
        '<div class="input-group col-md-2">' + 
          '<p>' + json[index].direccion +'</p>' +
        '</div>' +
        '<div style="cursor:pointer;" class="input-group col-md-1 clearfix bshadow0 pbs">' + 
          '<span class="icon-delete" onclick="deleteExperiencia('+json[index].ID+')"> ' + 
          '</span>' + 
        '</div>' +
      '</li>' + '<br>'
    }
    inner.innerHTML = html;
  }

})
