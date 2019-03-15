
  <?php  include 'headerUser.php';?> 
    
<?php 
    
    

    $varse=$_SESSION['login'];
    echo "<script>alert('$varse');</script>";
    require_once '../Datos/DatosLogin.php';
    $datos=new DatosLogin();

    $contenido= $datos->obtenerUsuariobyid($varse);

 ?>
<body>

<form action="../funciones/modificarUsuario.php" method="post" name="form" class="needs-validation" novalidate>
<div class="col-7 offset-2" style="border-color:black; border:thin;">
  <br>
                  <h4 class="col-12">Datos Usuario</h4><hr/>
                    <p><Label ID="LblGuardar"></Label></p>

  <div class="form-row">
    <div class="col-md-12 mb-12">
      <label for="validation01">Nombre(s):</label>
      <input type="text" name="nombre" class="form-control" value= "<?php echo $contenido['0']->nombres ?>" id="validation01" placeholder="Nombre(s):" required>
      <div class="invalid-feedback">
          Algo anda mal!
        </div>
      <div class="valid-feedback">
        Listo!
      </div>
    </div>
    <div class="col-md-12 mb-12">
      <label for="validation02">Apellido(s):</label>
      <input type="text" name="apellido" value= "<?php echo $contenido['0']->apellidos ?>" class="form-control" id="validation02" placeholder="Apellido(s)" required>
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
        <input type="email" name="correo" class="form-control" value= "<?php echo $contenido['0']->correo ?>" id="validationCustomUsername" placeholder="Correo" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback"> 
          Algo anda mal!
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-12">
      <label for="validationCustom03">Dirección</label>
      <input type="text" name="direccion" value= "<?php echo $contenido['0']->direccion ?>" class="form-control" id="validationCustom03" placeholder="Dirección" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div>

    <div class="col-md-12 mb-12">
      <label for="validationCustom04">Teléfono</label>
      <input type="number" name="telefono" class="form-control" id="validationCustom04" value= "<?php echo $contenido['0']->telefono ?>" placeholder="Teléfono" required>
      <div class="invalid-feedback">
        Algo anda mal!
      </div>
    </div>
    <div class="col-md-12 mb-12">
      <label for="validationCustom05">Edad</label>
      <input type="number" name="edad" class="form-control" value= "<?php echo $contenido['0']->edad ?>" id="validationCustom05" placeholder="number" required>
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
  <input class="btn btn-primary" type="submit" value='<?php  $_SESSION['login'] ?>' name="btn">
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
</body>
<?php 
  include 'footerUser.html';
?>