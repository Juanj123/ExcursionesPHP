<?php include 'headerUser.php'; ?>

<body>
  

  <ul class="galeria">
    <li class="galeria_item"><img src="imgViaje/coco.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/GUADALAJARA.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Guanajuato.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Huandacareo.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Moroleon.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/teotihuacan.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Uriangato.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Yuriria.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/coco.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/GUADALAJARA.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/coco.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/GUADALAJARA.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Guanajuato.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Huandacareo.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Moroleon.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/teotihuacan.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Uriangato.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/Yuriria.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/coco.jpg" class="galeria_img"></li>
    <li class="galeria_item"><img src="imgViaje/GUADALAJARA.jpg" class="galeria_img"></li>
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
