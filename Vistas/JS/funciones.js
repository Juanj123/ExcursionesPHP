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

   	var obj = JSON.stringify({ nombre: $("#txtnombre").val(), url: $("#txtLink").val(), estado: $("#cbEstado").val() });

   	console.log(obj);
    $.ajax({
        type:"POST",
        url:"ModificarVideo.php",
	    data: obj,
        error: function (xhr, ajaxOptions, thrownError) {
		    console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
		success: function(r){
			if (r) {
				alert("Actualizado con exito");
            window.location = "Videos.php";
        }else{
        	alert("Fallo el servidor :(");
            
		}
        }
    });
                       
                    }