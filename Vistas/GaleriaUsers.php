<?php include 'headerUser.php'; ?>

<body>
  

  <ul class="galeria">
    <?php 
      require_once '../Datos/DatosGaleriaUsers.php';
      require_once '../Pojos/PojoGaleria.php';
      $mostrar= new DatosGaleriaUsers();

      $resultado=$mostrar->obtenerimgGaleria();

      foreach ($resultado as $clave) {

        echo "<li class='galeria_item'><img src='".$clave->{'img_galeria'}."' class='galeria_img'></li>";
    }
    ?>

  </ul>
  
</body>

<?php include 'footerUser.html' ?>

<script >
    $('.galeria_img').click(function(e){
      var img = e.target.src;

      $('body').append('<div class="modal" id="modal"><img src="'+img+'" class="modal_img"><div class="modal_boton" id="modal_boton">X</div></div>');

      $('#modal_boton').click(function(){
        $('#modal').remove();
      })
    });

    $(document).keyup(function(e){
      if(e.which==27){
        $('#modal').remove();
      }
    })
  </script>
