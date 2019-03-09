    $(document).ready(function(){
     $('#btnActualizar').click(function(){
      actualizaDatos();
    });
   });


    function agregarForm(datos)
    {
      d=datos.split('||');
      $("#txtnombre").val(d[0]);
      $("#cbEstado").val(d[1]);
      $("#txtLink").val(d[2]);
      
    }

    function actualizaDatos()
    {
	/*
    nombrev=$("#txtnombre").val();
    estadov=$("#cbEstado").val();
    urlv = $("#txtLink").val();
    cadena = "nombre="+nombrev+
			 "estado="+estadov+
   			 "url="+urlv;
   			 */

         var obj = JSON.stringify({nombre: $("#txtnombre").val(), url: $("#txtLink").val(), estado: $("#cbEstado").val() });
         
         $.ajax({
          type:"POST",
          url:"Vistas/ModificarVideo.php",
          data: obj,
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
          },
          success: function(response){
            console.log(response);
            if (response.d==true) {
              console.log(r.d);
              alertify.success('Actualizado con exito :)');
              /* window.location = "Videos.php";*/
            }else{
             console.log(response.d);
             alertify.error('Fallo el servidor :(');
             
           }
         }
       });
         
       }

       function preguntarSiNo(id)
       {
        alertify.confirm('Eliminar datos','¿Esta seguro de eliminar este registro?',
          function(){
            eleminarDatos(id);
          },
          function(){
            alertify.error('Se cancelo');
          });
      }

      function eleminarDatos(id)
      {
        cadena = "id" + id;

        $.ajax({
         type:"POST",
         url:"../eliminarDatos.php",
         data: cadena,
         success: function(r){
          console.log(r.d);
          if(r)
          {
           alertify.success('Eliminado con exito');
           /* window.location = "Videos.php";*/
         }else{
           alertify.error('Fallo el servidor');
         }
       }
     });
      }