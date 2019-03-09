<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href=" css/bootstrap.min.css" rel="stylesheet" />
    <link href=" css/estilosMaster.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="JS/datatables/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="CSS/alertify.css">
    <link rel="stylesheet" type="text/css" href="CSS/default.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>

    <div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">

                <nav class="navbar navbar-expand-lg navbar-dark">

                    <a class="navbar-brand" href="PrincipalUsers.aspx" style="font-size:25px">
                        <img src="img/Niña.png" style="bottom: 20px; right: 20px; width: 60px; height: 60px; background-size: cover;" />
                    Excursiones"LORE PANTOJA</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-suitcase"></i> Viajes</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                  <a class="dropdown-item" href="Autobus.aspx">Autobus</a>
                                  <a class="dropdown-item" href="ViajesAdmin.aspx">Viajes</a>
                                  

                              </div>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="GaleriaAdministrator.aspx"><i class="fas fa-camera-retro"></i>Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="far fa-money-bill-alt"></i>Promociones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Clientes.aspx"><i class="fas fa-users"></i>Clientes</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-home"></i> Principal</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="PrincipalVideo.aspx">Video</a>
                                <a class="dropdown-item" href="PrincipalGaleria.aspx">Carrousel</a>
                                <a class="dropdown-item" href="Imagen.aspx">Imagen</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="PerfilUsuario.aspx">Perfil</a>
                                <a class="dropdown-item" href="#">Configuración</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
</div> 
</head>
<body>
    <div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
    	<div class="row">
    		<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                <br>
                <button class="btn btn-primary" id="btnAgregar" onClick="abrir()">Agregar Video</button>
                <script type="text/javascript">
                	function abrir(){
                		window.location ="agregarVideo.php";
                	}
                </script>

                <br>
                <br>
                <?php 
                require_once "../Datos/DaoVideo.php";
                require_once "../Pojos/PojoVideo.php";
                $obj = new PojoVideo();
                $dao = new DaoVideo();
                $lista = $dao->obtenerTodos();
                ?>
                <table id="tableVideos" class="display nowrap table table-bordered table-hover table-responsive-sm table-responsive-md text-center">
                    <thead class="thead-inverse text-white" style="background-color: #c3497f;">

                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ruta</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        foreach ($lista as $clave) {
                            $datos = $clave->{"nombre"}."||".
                            $clave->{"estado"}."||".
                            $clave->{"url"};
                            ?>
                            <tr>
                                <td> <?php echo ($clave->{"nombre"}); ?></td>
                                <td><?php echo ($clave->{"estado"}); ?></td>
                                <td><?php echo ($clave->{"url"}); ?></td>
                                <td>
                                    <button class="btn btn-success" data-target="#exampleModalCenter" data-toggle="modal" onclick="agregarForm(' <?php echo $datos ?>')">Editar</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger" onclick="preguntarSiNo('<?php echo ($clave->{"url"}); ?>')">Eliminar</button>
                                </td>
                            </tr>
                            <?php 
                        }
                        ?>
                    </tbody>
                </table>


                

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Video</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../../../lore nuevo/ExcursionesPHP/Vistas/ModificarVideo.php" method="post"><div class="form-group">
                                    <Label  Text="Nombre"></Label>
                                    <input class="form-control" type="text" id="txtnombre" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                   <label>Link</label>
                                   <input class="form-control" type="text" id="txtLink" name="url" placeholder="Link">
                               </div>

                               <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" id="cbEstado" name="estado">
                                    <option>Activo</option>
                                    <option>Inactivo</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnActualizar">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</body>

<footer>
   <div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
            <div class="card-group">
                <div class="card">
                    <img class="card-img-top" src="img/Niña.png" alt="Card image cap" style="bottom: 20px; right: 40px; width: 100px; height: 100px; background-size: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Contacto</h5>
                        <p class="card-text">
                            Telefono: (445) 455 0458
                            
                            <br />
                            Correo: lorepantoja@gmail.com
                            
                            <br />
                            Direccion: Calle 5 de mayo Moroleón
                            
                        </p>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Información del negocio</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d935.6909055557489!2d-101.18238130562702!3d20.139014512683143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cfac04372e353%3A0x7af4ce30137de7fa!2sAv.+16+de+Septiembre%2C+Guanajuato!5e0!3m2!1ses-419!2smx!4v1544855452175" width="400" height="600" frameborder="0" style="border: 0" allowfullscreen></iframe>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Nos encontramos en</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name" class="h4">Nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email" class="h4">Correo</label>
                                <input type="email" class="form-control" id="email" placeholder="Ingrese correo electrónico">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="h4 ">Mensaje</label>
                            <textarea id="message" class="form-control" rows="5" placeholder="Ingrese su mensaje"></textarea>
                        </div>
                        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right "><i class="fas fa-mail-bulk"></i>Enviar</button>
                    </div>
                    <div class="card-footer">

                        <small class="text-muted">envianos un correo</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>

<script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="JS/popper.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/datatables.min.js"></script>
<script type="text/javascript" src="JS/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="JS/jquery.scrollUp.js"></script>
<script type="text/javascript" src="JS/funciones.js"></script>
<script type="text/javascript" src="JS/alertify.js"></script>
<script>
    $(function () {
        $.scrollUp({
            scrollImg: true
        });
    });
</script>

<script>
    $(document).ready(function(){
      $("#tableVideos").dataTable({
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "aoColumnDefs": [{"bSortable": false, "aTargets": [4,3] }],
        "order": [[0,"asc"], [1,"asc"]],
        "language": {
          "url" : "JS/datatables/jquery.dataTables_i18n.spanish.json"
      }
  });


  });
</script>
</html>