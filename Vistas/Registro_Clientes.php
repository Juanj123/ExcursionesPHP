<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/animate.min.css">
    <link rel="stylesheet" href="CSS/apartaTuLugar.css" />
        <link href="../Vistas/JS/bootstrap.min.js" rel="stylesheet" type="text/css" />
    <title></title>
</head>
<body>

<form action="../Datos/DatosRegistroClientes.php" method="post" name="form" class="needs-validation" novalidate>
<div class="col-7 offset-2" style="border-color:black; border:thin;">
                  <h4 class="col-12">Registro</h4><hr/>
                    <p><Label ID="LblGuardar"></Label></p>

  <div class="form-row">
    <div class="col-md-12 mb-12">
      <label for="validation01">Nombre(s):</label>
      <input type="text" name="nombre" class="form-control" id="validation01" placeholder="Nombre(s):" required>
      <div class="invalid-feedback">
          Algo anda mal!
        </div>
      <div class="valid-feedback">
        Listo!
      </div>
    </div>
    <div class="col-md-12 mb-12">
      <label for="validation02">Apellido(s):</label>
      <input type="text" name="apellido" class="form-control" id="validation02" placeholder="Apellido(s)" required>
      <div class="invalid-feedback">
          Algo anda mal!
        </div>
      <div class="valid-feedback">
        Listo!
      </div>
    </div>
    <div class="col-md-12 mb-12">
      <label for="validationCustomUsername">Correo</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="email" name="correo" class="form-control" id="validationCustomUsername" placeholder="Correo" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback"> 
          Algo anda mal!
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-12">
      <label for="validationCustom03">Dirección</label>
      <input type="text" name="direccion" class="form-control" id="validationCustom03" placeholder="Dirección" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div>

    <div class="col-md-12 mb-12">
      <label for="validationCustom04">Teléfono</label>
      <input type="number" name="telefono" class="form-control" id="validationCustom04" placeholder="Teléfono" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div>
    <div class="col-md-12 mb-12">
      <label for="validationCustom05">Edad</label>
      <input type="number" name="edad" class="form-control" id="validationCustom05" placeholder="number" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div>
     <div class="col-md-12 mb-12">
      <label for="validationCustom05">Usuario</label>
      <input type="text" name=usuarios class="form-control" id="validationCustom05" placeholder="Usuario" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div> 
     <div class="col-md-12 mb-12">
      <label for="validationCustom05">Contraseña</label>
      <input type="password" name="pw" class="form-control" id="validationCustom05" placeholder="Contraseña" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Acceptar terminos y condiciones
      </label>
      <div class="invalid-feedback">
        Falta acceptar algo!
      </div>
    </div>
  </div>


  <input class="btn btn-primary" type="submit" value="Guardar registro">
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<!-- 
<div class="container-fluid">
        <div class="row">
            <div class="col-7 offset-2" style="border-color:black; border:thin;">
                  <h4 class="col-12">Registro</h4><hr/>
                    <p><Label ID="LblGuardar"></Label></p>
                    <p><i class="glyphicon glyphicon-user " for="TxtNombre"></i> Nombre(s):</p>
                    <p><input type="text"  ID="TxtNombre"   class="form-control" placeholder="First name" required ></p>
                    <p><i class="glyphicon glyphicon-user"></i> Apellido(s):</p>
                    <p><input type="Text" ID="Textapellidos"   class="form-control" ></p>
                    <p><i class="glyphicon glyphicon-phone"></i> Telefono:</p>
                    <p><input type="Text" ID="TxtTelefono"  style="margin:0 auto" class="form-control"></p>
                    <p><i class="glyphicon glyphicon-home"></i> Edad:</p>
                    <p><input type="Text" ID="Txtedad"  style="margin:0 auto" class="form-control"></p>
                    <p><i class="glyphicon glyphicon-home"></i> Correo:</p>
                    <p><input type="Text" ID="Textcorreo"  style="margin:0 auto" class="form-control"></p>
                    <p><i class="glyphicon glyphicon-home"></i> Direccion:</p>
                    <p><input type="Text" ID="Txtdireccion"  style="margin:0 auto" class="form-control"></p>
                    <p><i class="glyphicon glyphicon-home"></i> Usuario:</p>
                    <p><input type="Text" ID="Txtusuario"  style="margin:0 auto" class="form-control"></p>
                    <p><i class="glyphicon glyphicon-home"></i> Contraseña:</p>
                    <p><input type="text" ID="Txtcontrasena" style="margin:0 auto" class="form-control"></p>
                    <p><button type="button" ID="BtnGuardar"  class="btn btn-primary">Guardar Registro</button></p>
            </div>
        </div>
    </div> -->
</body>
</html>